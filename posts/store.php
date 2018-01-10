<?php
declare(strict_types=1);

$pdo = new PDO('sqlite:../includes/databas.sql');

if (isset($_POST['content'], $_POST['URL'])) {
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
  $URL = filter_var($_POST['URL'], FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('INSERT INTO posts (link, description, user_id, "time") VALUES (:link, :description, :user_id, ":time")');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $result = $statement->execute(array(
    ':link' => $URL,
    ':description' => $content,
    ':user_id' => $_SESSION['user_id'],
    ':user_username' => $username,
    '":time"' => time()
  ));

  if (!$result) {
    echo 'fail';
    die(var_dump($statement->errorInfo()));
  }

  echo 'wooorks';
}
//header('Location: ../home.php');
