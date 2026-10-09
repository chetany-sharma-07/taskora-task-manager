<?php

class AuthControllers {
    function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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
        } elseif (($_SESSION['verify_email'] ?? false) !== true) {
            $errors['email'] = 'Email must be verified before proceeding.';
        } elseif (($_SESSION['verified_email'] ?? '') !== $email) {
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
}
