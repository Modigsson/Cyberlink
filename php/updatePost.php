<?php
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Variables
    $postID = $_POST['postIDValue'];
    $postLink = $_POST['URL'];
    $postDesc = $_POST['content'];
    
    $editPost = $pdo->prepare('UPDATE posts SET link = :postLink, description = :postDesc WHERE id = :postID') ;
    $updatePost = $editPost->execute(array(
        ':postLink' => $postLink,
        ':postDesc' => $postDesc,
        ':postID' => $postID
    ));
    if ($updatePost) {
        header('Location: ../feed.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Database error" . "<br>" . $e->getMessage();
}
