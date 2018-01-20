<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";
$userID = $_SESSION['user_id'];


if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    // die(var_dump($file));
    $fileName = 'images/'.$file['name'];
    $destination = sprintf('%s\%s', __DIR__.'\images', $file['name']);
    move_uploaded_file($file['tmp_name'], $destination);


    $statement = $pdo->prepare('UPDATE users SET user_picture = :user_picture WHERE user_id = :user_id');
    $statement->bindParam(':user_picture', $fileName, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $userID, PDO::PARAM_INT);
    $statement->execute();

    header('Location: home.php');
}
