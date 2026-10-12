<?php 
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser(string $user_id, string $first_name, string $last_name, string $username, string $email, string $password) {
        $stmt = $this->db->prepare("INSERT INTO users (user_id, first_name,last_name, username, email, password,created_at,updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$user_id, $first_name, $last_name, $username, $email, $password]);
    }

    public function loginUser(string $login_user, bool $isEmail) {
        if ($isEmail) {
            $stmt = $this->db->prepare("SELECT user_id, first_name, last_name, username, email, password FROM users WHERE email = ? ");
        } else {
            $stmt = $this->db->prepare("SELECT user_id, first_name, last_name, username, email, password FROM users WHERE username = ? ");
        }
        $stmt->execute([$login_user]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ? $user : false;
    }

    public function updateToken(string $user_id, string $tokenHash, string $expiry) {
        $stmt = $this->db->prepare("UPDATE users SET token = ?, token_expires_at = ?, updated_at = NOW() WHERE user_id = ?");
        return $stmt->execute([$tokenHash, $expiry, $user_id]);
    }
}