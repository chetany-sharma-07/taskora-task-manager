<?php 
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser(string $user_id, string $full_name, string $username, string $email, string $password) {
        $stmt = $this->db->prepare("INSERT INTO users (user_id, full_name, username, email, password,created_at,updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$user_id, $full_name, $username, $email, $password]);
    }
}