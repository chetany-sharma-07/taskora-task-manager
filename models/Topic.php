<?php

class Topic {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTopics(string $userId){
        $stmt = $this->db->prepare("SELECT id as topic_id, topic_name FROM topics WHERE user_id = ?");
        $stmt->execute([$userId]);
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $topics ? $topics : false;
    }

    public function createTopic(string $userId, string $topicName): int|false
    {
        $stmt = $this->db->prepare("INSERT INTO topics (user_id, topic_name) VALUES (?, ?)");
        if (!$stmt->execute([$userId, $topicName])) {
            return false;
        }

        return (int)$this->db->lastInsertId();
    }

    public function updateTopic(string $userId, int $topicId, string $topicName): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE topics SET topic_name = ? WHERE id = ? AND user_id = ?"
        );
        $stmt->execute([$topicName, $topicId, $userId]);

        // A no-op rename can report zero affected rows, so check ownership/existence separately.
        if ($stmt->rowCount() > 0) {
            return true;
        }

        $check = $this->db->prepare("SELECT 1 FROM topics WHERE id = ? AND user_id = ?");
        $check->execute([$topicId, $userId]);
        return (bool)$check->fetchColumn();
    }

    public function deleteTopic(string $userId, int $topicId): bool
    {
        $stmt = $this->db->prepare("DELETE FROM topics WHERE id = ? AND user_id = ?");
        $stmt->execute([$topicId, $userId]);
        return $stmt->rowCount() > 0;
    }
}
