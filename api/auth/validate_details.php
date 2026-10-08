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

function input_test($input) {
    return strip_tags(trim($input));
}


$full_name = input_test($data["full_name"] ?? '');
$username = input_test($data["username"] ?? '');
$email = input_test($data["email"] ?? '');

$errors = [];

if (!$full_name ){
    $errors['full_name'] = 'Full name is required.';
} elseif (!preg_match('/^[a-zA-Z ]{3,50}$/', $full_name)) {
    $errors['full_name'] = 'Full name: 3–50 characters, letters and spaces only.';
}

if (!$username) {
    $errors['username'] = 'Username is required.';
} elseif (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
    $errors['username'] = 'Username: 3–20 characters, letters, numbers, and underscores only.';
}

if (!$email) {
    $errors['email'] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format.';
} elseif (($_SESSION['verify_email'] ?? false) !== true) {
    $errors['email'] = 'Email must be verified before proceeding.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

unset($_SESSION['verify_email']); // Clear the verification flag after checking

$_SESSION['full_name'] = $full_name;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;


// JSON fields are available as properties, for example: $data->email.
http_response_code(200);
echo json_encode(['success' => true, 'message' => 'Details validated successfully.']);
