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

        

        if (!isset($_SESSION['verified_email']) || $_SESSION['verified_email'] !== $signup_data['email']) {
            return ['success' => false, 'error' => 'Email not verified. Please verify your email first.', 'verified_email' => $_SESSION['verified_email'] ?? null];
        }

        $user_id = 'user_' . bin2hex(random_bytes(16)); // Generate a unique user ID
        $full_name = $signup_data['full_name'];
        $first_name = explode(' ', $full_name)[0];
        $last_name = count(explode(' ', $full_name)) > 1 ? explode(' ', $full_name)[1] : '';
        $username = $signup_data['username'];
        $email = $signup_data['email'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        require_once __DIR__ . '/../models/User.php';
        $userModel = new User($this->db);
        $createUserResult = $userModel->createUser($user_id, $first_name, $last_name, $username, $email, $password_hash);

        if (!$createUserResult) {
            return ['success' => false, 'error' => 'Failed to create user. Please try again.'];
        }

        unset($_SESSION['signup_data']);
        unset($_SESSION['verified_email']);

        return ['success' => true, 'message' => 'User created successfully.', 'user' => [
            'full_name' => $full_name,
            'username' => $username,
            'email' => $email
        ]];
        
    }

    function loginUser(array $data): array {
        $login_user = isset($data['login_user']) ? $this->input_test($data['login_user']) : '';
        $password = isset($data['password']) && is_string($data['password']) ? $data['password'] : '';
        $remember_me = isset($data['remember']) ? (bool)$data['remember'] : false;

        if (!$login_user || !$password) {
            return ['success' => false, 'error' => 'Both login credentials are required.'];
        }

        $isEmail = filter_var($login_user, FILTER_VALIDATE_EMAIL);

        require_once __DIR__ . '/../models/User.php';
        $userModel = new User($this->db);

        $result = $userModel->loginUser($login_user, $isEmail);

        if (!$result || !password_verify($password, $result['password'])) {
            return ['success' => false, 'error' => 'Invalid login credentials.'];
        }

        // session_regenerate_id(true);
        // $_SESSION['user_id'] = (string)$result['user_id'];
        // unset($_SESSION['user_id']);

        if ($remember_me) {
            $token = bin2hex(random_bytes(16));
            $tokenHash = hash('sha256', $token);
            $expires = time() + (30 * 24 * 60 * 60); // 30 days in seconds
            $updateTokenResult = $userModel->updateToken($result['user_id'], $tokenHash, $expires);
            if (!$updateTokenResult) {
                return ['success' => false, 'error' => 'Failed to update user token. Please try again.'];
            }
            
            // setcookie('auth_token', $token, ['expires' => $expires, 'path' => '/', 'secure' => false, 'httponly' => true]); // 30 days expiration  
        }
        

        return ['success' => true, 'message' => 'Login successful.', 'user' => [
            'user_id' => (string)$result['user_id'],
            'full_name' => trim($result['first_name'] . ' ' . $result['last_name']),
        ]];
    }

    /**
     * Decide whether the caller should send the visitor to the login page.
     *
     * Returns true when authentication is required (no valid session/token), and
     * false when the visitor is authenticated and should go to the dashboard.
     * This function never performs a redirect itself.
     */

    function require_login(): bool
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            return false; // User is logged in, no need to redirect
        }

        if (isset($_COOKIE['auth_token']) && !empty($_COOKIE['auth_token'])) {
            $userModel = new User($this->db);
            $tokenHash = hash('sha256', $_COOKIE['auth_token']);
            $user = $userModel->getUserByToken($tokenHash);

            if ($user && isset($user['expires']) && time() < (int)$user['expires']) {
                // Token is valid, log the user in
                session_regenerate_id(true);
                $_SESSION['user_id'] = (string)$user['user_id'];

                // Update the token and expiration time for "remember me" functionality
                $token = bin2hex(random_bytes(16));
                $tokenHash = hash('sha256', $token);
                $expires = time() + (30 * 24 * 60 * 60); // 30 days in seconds
                $updateTokenResult = $userModel->updateToken($user['user_id'], $tokenHash, $expires);
                if (!$updateTokenResult) {
                    throw new Exception("Failed to update user token");
                }
                setcookie('auth_token', $token, ['expires' => $expires, 'path' => '/', 'secure' => false, 'httponly' => true]); // 30 days expiration
                return false; // User is logged in, no need to redirect
            } else {
                // Token is invalid or expired, clear the cookie
                setcookie('auth_token', '', time() - 3600, '/'); // Expire the cookie
                return true; // User is not logged in, redirect to login
            }
        }

        return true; // User is not logged in, redirect to login
    }

}
