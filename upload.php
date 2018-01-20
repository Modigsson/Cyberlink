<?php


include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";

if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    $fileName = 'images\\'.$file['name'];
    $destination = sprintf('%s\%s', __DIR__.'\images', $file['name']);
    move_uploaded_file($file['tmp_name'], $destination);


    $statement = $pdo->prepare('UPDATE users SET user_picture = :user_picture WHERE user_id = :user_id');
    $statement->bindParam(':user_picture', $file, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $loggedIn, PDO::PARAM_INT);
    $statement->execute();

    header('Location: home.php');
}

$getImage = $pdo->prepare('SELECT * FROM users WHERE user_id = :user_id');
$getImage->bindParam(':user_id', $loggedIn, PDO::PARAM_STR);
$getImage->execute();
$imageResult = $getImage->fetchAll(PDO::FETCH_ASSOC);
