<?php
require_once __DIR__ . '/../../controllers/TopicControllers.php';
require_once __DIR__ . '/../../database/connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//API to get all topics for current user Id
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    http_response_code(401);
    echo json_encode(['error' => 'Login required']);
    exit;
}

$db = getDatabaseConnection();
if (!$db) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

$topicController = new TopicControllers($db);

$response = $topicController->getTopics();

if (!$response['success']) {
    http_response_code(400);
    echo json_encode($response);
    exit;
}

http_response_code(200);
echo json_encode($response);
