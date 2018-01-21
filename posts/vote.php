<?php
declare(strict_types=1);
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes//connection.php";
include '../includes/header.php';
$userID = $_SESSION['user_id'];
$postID = $_POST['postID'];
$vote = 0;
$statement = $pdo->prepare('INSERT INTO votes (user_id, link_id, value) VALUES (:user_id, :link_id, :value)');
$statement->bindParam(':link_id', $postID, PDO::PARAM_INT);
$statement->bindParam(':user_id', $userID, PDO::PARAM_INT);
$statement->bindParam(':value', $vote, PDO::PARAM_INT);
$statement->execute();
$vote = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['voteUp'])) {
  $vote = 1;
}

header('Location: ../feed.php');
