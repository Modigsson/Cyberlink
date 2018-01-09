<?php

declare(strict_types=1);

include '../home.php';

if (isset($_POST['content'], $_POST['submit'])) {
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

$statement = pdo->prepare('INSERT INTO posts (post_id, post_link, user_id) VALUES (:post_id, :post_link, :user_id)');
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam()

}
