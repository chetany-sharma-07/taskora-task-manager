<?php
require_once __DIR__ . '/../models/Topic.php';

class TopicControllers{
    private $db;

    function __construct($db = ""){
        if (session_status()=== PHP_SESSION_NONE){
            session_start();
        }

        $this->db = $db;
    }

    function getTopics(){
        $userId = $_SESSION['user_id']??null;
        $topicModal = new Topic($this->db);
        $getTopicResult = $topicModal->getTopics($userId);

        if (!$getTopicResult){
            return ['success' => false,'error' => 'Failed to get Topic details'];
        }

        return ['success' => true, 'topics' => $getTopicResult];
    }

    function createTopic(array $data): array
    {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return ['success' => false, 'error' => 'Login required.'];
        }

        $topicName = isset($data['topic_name']) && is_string($data['topic_name'])
            ? trim(strip_tags($data['topic_name']))
            : '';

        if ($topicName === '') {
            return ['success' => false, 'error' => 'Topic name is required.'];
        }
        if (mb_strlen($topicName) > 100) {
            return ['success' => false, 'error' => 'Topic name must be 100 characters or fewer.'];
        }

        $topicModel = new Topic($this->db);
        $topicId = $topicModel->createTopic((string)$userId, $topicName);
        if ($topicId === false) {
            return ['success' => false, 'error' => 'Failed to create topic.'];
        }

        return ['success' => true, 'message' => 'Topic created successfully.', 'topic' => [
            'topic_id' => $topicId,
            'topic_name' => $topicName,
        ]];
    }

    function updateTopic(array $data): array
    {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return ['success' => false, 'error' => 'Login required.'];
        }

        $topicId = filter_var($data['topic_id'] ?? null, FILTER_VALIDATE_INT);
        $topicName = isset($data['topic_name']) && is_string($data['topic_name'])
            ? trim(strip_tags($data['topic_name']))
            : '';

        if (($data['mode'] ?? null) !== 'rename') {
            return ['success' => false, 'error' => 'Invalid topic operation.'];
        }
        if ($topicId === false || $topicId === null || $topicId < 1) {
            return ['success' => false, 'error' => 'A valid topic_id is required.'];
        }
        if ($topicName === '') {
            return ['success' => false, 'error' => 'Topic name is required.'];
        }
        if (mb_strlen($topicName) > 100) {
            return ['success' => false, 'error' => 'Topic name must be 100 characters or fewer.'];
        }

        $topicModel = new Topic($this->db);
        if (!$topicModel->updateTopic((string)$userId, (int)$topicId, $topicName)) {
            return ['success' => false, 'error' => 'Topic was not found or could not be renamed.'];
        }

        return ['success' => true, 'message' => 'Topic renamed successfully.', 'topic' => [
            'topic_id' => (int)$topicId,
            'topic_name' => $topicName,
        ]];
    }

    function deleteTopic(array $data): array
    {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return ['success' => false, 'error' => 'Login required.'];
        }

        $topicId = filter_var($data['topic_id'] ?? null, FILTER_VALIDATE_INT);
        if ($topicId === false || $topicId === null || $topicId < 1) {
            return ['success' => false, 'error' => 'A valid topic_id is required.'];
        }

        $topicModel = new Topic($this->db);
        if (!$topicModel->deleteTopic((string)$userId, (int)$topicId)) {
            return ['success' => false, 'error' => 'Topic was not found or could not be deleted.'];
        }

        return ['success' => true, 'message' => 'Topic deleted successfully.'];
    }
}
