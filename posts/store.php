<?php

declare(strict_types=1);

include '../home.php';

$pdo = new PDO('sqlite:../includes/databas.sql');


if (isset($_POST['content'], $_POST['URL'])) {
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
  $URL = filter_var($_POST['URL'], FILTER_SANITIZE_STRING);


$statement = pdo->prepare('INSERT INTO posts (post_id, post_link, user_id) VALUES (:post_id, :post_link, :user_id)');
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':post_link', $content, PDO::PARAM_STR);
  $statement->bindParam(':post_title', $URL, PDO::PARAM_STR);
  $statement->execute();

}

header('Location: ../home.php');
