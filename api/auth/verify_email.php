<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Use POST to send JSON.']);
    exit;
}

$rawBody = file_get_contents('php://input');
$data = json_decode($rawBody,true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Request body must be a valid JSON object.']);
    exit;
}
function input_test($input){
    return strip_tags(trim((string)$input));
}

$email = input_test($data["email"] ?? '');

if (!$email) {
    $error = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email format.';
}

if (isset($error)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $error]);
    exit;
}

$_SESSION['verify_email'] = true;

http_response_code(200);
echo json_encode(['success' => true, 'message' => 'Email verification request received.']);

