<?php
declare(strict_types=1);
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";

try {
    if (isset($_POST['login'])) {
        $username = filter_var($_POST['uid'], FILTER_SANITIZE_STRING);

        $statement = $pdo->prepare('SELECT * FROM users WHERE user_email = :user_username OR user_username = :user_username COLLATE NOCASE');
        $statement->bindParam(':user_username', $username, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            header('Location: ../index.php');
            exit;
        } else {
            if (password_verify($_POST['pwd'], $user['user_password'])) {
                // setcookie('Cyberuser', $user['user_id'], time()+3600*24*3, '/');
                $_SESSION['user_username'] = $user['user_username'];
                $_SESSION['user_id'] = $user['user_id'];
                header('Location: ../home.php');
            } else {
                echo "Wrong Password";
            }
        }
    }
} catch (\Exception $e) {
    echo "Database error" . "<br>" . $e->getMessage();
}
