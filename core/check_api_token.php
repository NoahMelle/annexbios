<?php
    // Extract the API key from the Authorization header
    $headers = getallheaders();
    $apiKey = isset($headers['Authorization']) ? trim(str_replace('Bearer', '', $headers['Authorization'])) : '';

    $stmt = $con->prepare("SELECT location_id, token_role, token FROM location_tokens WHERE token = ?");
    $stmt->bind_param("s", $apiKey);
    $stmt->execute();
    $stmt->bind_result($location_id, $token_role, $token);
    $stmt->fetch();
    $stmt->close();
    
    if (empty($apiKey)) {
        // Handle the absence of the API key
        http_response_code(401); // Unauthorized
        echo json_encode(["message" => "API key not provided"]);
        exit;
    }
    
    // Validate the API key against the stored API key
    if (!isset($token) || $apiKey !== $token) {
        // Handle invalid API key
        http_response_code(401); // Unauthorized
        echo json_encode(["message" => "Invalid API key"]);
        exit;
    } else {
        $validToken = true;
        $currect_location_id = $location_id;

        if($token_role === 1) {
            $tokenIsAdmin = true;
        }
    }
?>