<?php
require_once __DIR__ . '/../controllers/AuthControllers.php';
require_once __DIR__ . '/../database/connection.php';

try {
        $db = getDatabaseConnection();
        if (!$db) {
                throw new Exception("Database Connection Failed");
        }
        $authController = new AuthControllers($db);

        $currentUser = $authController->require_login();

        // $currentUser = false;
        //curretn user --> true --> user need to login
        //curretnuser --->false ---> user not need to login
        if (!$currentUser && in_array($currentPage, ['login','landing_page','register'])) {
                header("Location: dashboard.php");
                exit();
        }elseif ($currentUser && in_array($currentPage, ['settings','dashboard'])){
                header("Location: index.php");
                exit();
        }
}catch(Exception $e){
        echo "Error: ". $e->getMessage();
}
?>






