<?php
// Extract the API key from the Authorization header
$headers = getallheaders();
$apiKey = isset($headers['Authorization']) ? trim(str_replace('Bearer', '', $headers['Authorization'])) : '';

if (empty($apiKey)) {
  // Handle the absence of the API key
  http_response_code(401); // Unauthorized
  echo json_encode(["success" => false, "message" => "API key not provided", "status_code" => 401]);
  exit;
}

$stmt = $con->prepare("SELECT location_id, token_role, token, is_blocked FROM location_tokens WHERE token = ?");
$stmt->bind_param("s", $apiKey);
$stmt->execute();
$stmt->bind_result($location_id, $token_role, $token, $is_blocked);
$stmt->fetch();
$stmt->close();

if ($is_blocked === '1') {
  http_response_code(403);
  echo json_encode(['success' => false, "message" => "API key is blocked", "status_code" => 403]);
}

// Validate the API key against the stored API key
if (!isset($token) || $apiKey !== $token) {
  // Handle invalid API key
  http_response_code(403); // Unauthorized
  echo json_encode(["success" => false, "message" => "Invalid API key", "status_code" => 403]);
  exit;
} else {
  $validToken = true;
  $current_location_id = $location_id;

  if ($token_role === 1) {
    $tokenIsAdmin = true;
  }
}

//require_once 'ratelimit_handler.php';
?>
