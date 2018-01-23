<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";
$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_username'];

if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar']['name'];
    $tmp_dir = $_FILES['avatar']['tmp_name'];
    $imgExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    // die(var_dump($file));
    // $fileName = 'images/'.$file['name'];
    // $destination = sprintf('%s\%s', __DIR__.'\images', $file['name']);
    $fileName = $userID.".".$userName.".".$imgExt;
    $uploadDir = 'images/';
    move_uploaded_file($tmp_dir, $uploadDir.$fileName);


    $statement = $pdo->prepare('UPDATE users SET user_picture = :user_picture WHERE user_id = :user_id');
    $statement->bindParam(':user_picture', $fileName, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);
    $statement->execute();

    header('Location: home.php');
}
