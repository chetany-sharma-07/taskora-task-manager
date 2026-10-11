<?php

class AuthControllers {
    private $db;

    function __construct ($db = "") {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    function input_test(string $input): string {
        return strip_tags(trim($input));
    }

    function validateDetails(array $data): array {
        $full_name = isset($data['full_name']) ? $this->input_test($data['full_name']) : '';
        $username = isset($data['username']) ? $this->input_test($data['username']) : '';
        $email = isset($data['email']) ? $this->input_test($data['email']) : '';

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
        }elseif (!isset($_SESSION['verified_email'])) {
            $errors['email'] = 'Email not verified. Please verify your email first.';
        }elseif (($_SESSION['verified_email'] ?? '') !== $email) {
            $errors['email'] = 'Email does not match the verified email.';
        }

        if (!empty($errors)) {
            http_response_code(400);
            return ['success' => false, 'errors' => $errors];
        }
        $_SESSION['signup_data'] = [
            'full_name' => $full_name,
            'username' => $username,
            'email' => $email
        ];
        
        return ['success' => true, 'message' => 'Details validated successfully.'];
    }

    function verifyEmail(array $data): array {
        $email = isset($data['email']) ? $this->input_test($data['email']) : '';

        if (!$email) {
            return ['success' => false, 'error' => 'Email is required.'];
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Invalid email format.'];
        }

        $_SESSION['verified_email'] = $email;

        return ['success' => true, 'message' => 'Email verification request received.'];
    }

    function createUser(array $data): array {
        $password = isset($data['password']) ? $this->input_test($data['password']) : '';
        $confirm_password = isset($data['confirm_password']) ? $this->input_test($data['confirm_password']) : '';

        if (!$password || !$confirm_password) {
            return ['success' => false, 'error' => 'Password and confirm password are required.'];
        } elseif ($password !== $confirm_password) {
            return ['success' => false, 'error' => 'Passwords do not match.'];
        } elseif (strlen($password) < 6) {
            return ['success' => false, 'error' => 'Password must be at least 6 characters long.'];
        }

        if (($data['terms'] ?? false) !== true) {
            return ['success' => false, 'error' => 'You must agree to the Terms & Conditions.'];
        }

        if (!isset($_SESSION['signup_data'])) {
            return ['success' => false, 'error' => 'Signup data not found. Please validate your details first.'];
        }
        $signup_data = $_SESSION['signup_data'];

        unset($_SESSION['signup_data']);

        if (!isset($_SESSION['verified_email']) || $_SESSION['verified_email'] !== $signup_data['email']) {
            return ['success' => false, 'error' => 'Email not verified. Please verify your email first.', 'verified_email' => $_SESSION['verified_email'] ?? null];
        }

        unset($_SESSION['verified_email']);

        $user_id = 'user_' . bin2hex(random_bytes(16)); // Generate a unique user ID
        $full_name = $signup_data['full_name']; 
        $username = $signup_data['username'];
        $email = $signup_data['email'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        require_once __DIR__ . '/../models/User.php';
        // $userModel = new User($this->db);
        // $createUserResult = $userModel->createUser($user_id, $full_name, $username, $email, $password_hash);

        // if (!$createUserResult) {
        //     return ['success' => false, 'error' => 'Failed to create user. Please try again.'];
        // }


        return ['success' => true, 'message' => 'User created successfully.', 'user' => [
            'full_name' => $full_name,
            'username' => $username,
            'email' => $email
        ]];
        
    }
}
