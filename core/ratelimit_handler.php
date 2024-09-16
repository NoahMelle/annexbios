<?php

$ipAddress = getIpAddress();
$hashedIpAddress = hash_hmac('sha256', $ipAddress, $env['ENCRYPTION_SECRET']);
$macAddress = strtok(exec('getmac'), ' ');
$hashedMacAddress = hash_hmac('sha256', $macAddress, $env['ENCRYPTION_SECRET']);

$stmt = $con->prepare("SELECT level, expires_at FROM api_timeouts WHERE mac_address = ? ORDER BY id DESC LIMIT 1");
$stmt->bind_param('s', $hashedMacAddress);
$stmt->execute();
$stmt->bind_result($block_level, $block_expires_at);
$stmt->fetch();
$stmt->close();

$amsterdamTimeZone = new DateTimeZone('Europe/Amsterdam');
$blockIsActive = $block_level !== null && DateTime::createFromFormat('Y-m-d H:i:s', $block_expires_at, $amsterdamTimeZone) > new DateTime('now', $amsterdamTimeZone);

if ($blockIsActive) {
  http_response_code(403);
  echo json_encode(['success' => false, 'message' => 'You are blocked from the API until ' . $block_expires_at . '.', 'status_code' => 403]);
  exit();
}

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestContext = $requestMethod . ' ' . $requestUri;

// SELECTEER AANTAL VERZOEKEN VAN AFGELOPEN x TIJD
$stmt = $con->prepare('SELECT COUNT(*) FROM api_requests WHERE mac_address = ? AND timestamp > DATE_SUB(NOW(), INTERVAL 1 MINUTE)');
$stmt->bind_param('s', $hashedMacAddress);
$stmt->execute();
$stmt->bind_result($requestsCount);
$stmt->fetch();
$stmt->close();

$remainingRequests = intval($env['MAX_REQUESTS_PER_MINUTE']) - $requestsCount;

header('X-Rate-Limit-Limit: ' . $env['MAX_REQUESTS_PER_MINUTE']);
header('X-Rate-Limit-Remaining: ' . $remainingRequests < 0 ? '0' : $remainingRequests);
header('X-Rate-Limit-Reset: ' . strtotime('+1 minute'));

// IF HOGER DAN LIMIET > THROW 429?
if ($requestsCount > intval($env['MAX_REQUESTS_PER_MINUTE'])) {
  http_response_code(429);
  echo json_encode(['success' => false, 'message' => 'You are making too many requests.', 'status_code' => 429]);
  exit();
}

$stmt = $con->prepare('SELECT SUM(diff) AS total_duration FROM (SELECT UNIX_TIMESTAMP(timestamp) * 1000 - UNIX_TIMESTAMP(LAG(timestamp) OVER (ORDER BY timestamp)) * 1000 AS diff FROM api_requests WHERE mac_address = ? ORDER BY timestamp DESC LIMIT 3) AS subquery WHERE diff IS NOT NULL');
$stmt->bind_param('s', $hashedMacAddress);
$stmt->execute();
$stmt->bind_result($totalMsBetweenRequests);
$stmt->fetch();
$stmt->close();

// -- Timeout Policy --
// Lvl 1: 1 HOUR
// Lvl 2: 1 DAY
// Lvl 3: Permanent

if ($totalMsBetweenRequests !== null && ($totalMsBetweenRequests / 3) <= 3000) {
  $nextBlockLevel = $block_level !== null ? intval($block_level) + 1 : 1;

  $now = new DateTime('now', $amsterdamTimeZone);
  $blockedUntil = $now->modify('+1 hour')->format('Y-m-d H:i:s');

  if ($nextBlockLevel >= 3) {
    $blockedUntil = DateTime::createFromFormat('Y-m-d H:i:s', '2300-01-01 00:00:00', $amsterdamTimeZone)->format('Y-m-d H:i:s');
  } elseif ($nextBlockLevel === 2) {
    $blockedUntil = $now->modify('+1 day')->format('Y-m-d H:i:s');
  }

  $stmt = $con->prepare('INSERT INTO api_timeouts (ip_address, mac_address, level, expires_at) VALUES (?, ?, ?, ?)');
  $stmt->bind_param('ssss', $hashedIpAddress, $hashedMacAddress, $nextBlockLevel, $blockedUntil);
  $stmt->execute();
  $stmt->close();

  http_response_code(403);
  echo json_encode(['success' => false, 'message' => 'You are blocked from the API until ' . $blockedUntil . '.', 'status_code' => 403]);
  exit();
}

// Log/Generate a API request
$stmt = $con->prepare('INSERT INTO api_requests (token, ip_address, mac_address, request_context) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $apiKey, $hashedIpAddress, $hashedMacAddress, $requestContext);
$stmt->execute();
$stmt->close();
