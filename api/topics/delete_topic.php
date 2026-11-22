<?php
require_once __DIR__ . '/../../controllers/TopicControllers.php';
require_once __DIR__ . '/../../database/connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    header('Allow: DELETE');
    echo json_encode(['success' => false, 'error' => 'Use DELETE to remove a topic.']);
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

$topicId = filter_var($data['topic_id'] ?? null, FILTER_VALIDATE_INT);
if ($topicId === false || $topicId === null || $topicId < 1) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'A valid topic_id is required.']);
    exit;
}

$db = getDatabaseConnection();
if (!$db) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit;
}

try {
    $topicController = new TopicControllers($db);
    $response = $topicController->deleteTopic($data);

    if (!$response['success']) {
        http_response_code(404);
        echo json_encode($response);
        exit;
    }

    http_response_code(200);
    echo json_encode($response);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to delete the topic. Please try again.']);
}
