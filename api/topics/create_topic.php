<?php
require_once __DIR__ . '/../../controllers/TopicControllers.php';
require_once __DIR__ . '/../../database/connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    echo json_encode(['success' => false, 'error' => 'Use POST to create a topic.']);
    exit;
}

if (empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Login required.']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Request body must be a valid JSON object.']);
    exit;
}

$db = getDatabaseConnection();
if (!$db) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit;
}

$topicController = new TopicControllers($db);
$response = $topicController->createTopic($data);

if (!$response['success']) {
    http_response_code(400);
    echo json_encode($response);
    exit;
}

http_response_code(201);
echo json_encode($response);
