<?php

declare(strict_types=1);

include '../home.php';

$pdo = new PDO('sqlite:../includes/databas.sql');


if (isset($_POST['content'], $_POST['URL'])) {
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
  $URL = filter_var($_POST['URL'], FILTER_SANITIZE_STRING);


$statement = pdo->prepare('INSERT INTO posts (id, link, description, user_id, "time") VALUES (:id, :link, :description, :user_id, ":time")');
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $result = $statement->execute(array(
    ':user_firstname' => $first,
    ':user_lastname' => $last,
    ':user_email' => $email,
    ':user_username' => $username,
    ':user_password' => $pwd
  ));

}

header('Location: ../home.php');
