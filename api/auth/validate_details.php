<?php
require_once __DIR__ . '/../../controllers/AuthControllers.php';
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

$authController = new AuthControllers();
$response = $authController->validateDetails($data);

if (!$response['success']) {
    http_response_code(400);
    echo json_encode($response);
    exit;
}

echo json_encode($response);

