<?php

declare(strict_types=1);

if (isset($_POST['delete'])) {
  $pdo = new PDO('sqlite:../includes/databas.sql');
  $linkId = filter_var($_POST['linkID'], FILTER_SANITIZE_STRING);
  $statement = $pdo->prepare('DELETE FROM posts WHERE link = :link');
  $statement->bindParam(':link', $linkId, PDO::PARAM_INT);
  $statement->execute();

  // if (!$statement) {
  //     die(var_dump($pdo->errorInfo()));
  //   }

  // header('Location: ../feed.php');
}
