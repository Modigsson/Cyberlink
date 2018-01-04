<?php

declare(strict_types=1);

session_start();

$pdo = new PDO('sqlite:includes/databas.sql');

if (isset($_POST['uid']) && isset($_POST['email']) && isset($_POST['pwd'])) {
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $username = filter_var($_POST['uid'], FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('SELECT * FROM users WHERE user_email = :user_email AND user_username = :user_username');
  $statement->bindParam(':user_email', $email, PDO::PARAM_STR);
  $statement->bindParam(':user_username', $username, PDO::PARAM_STR);
  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    echo "Error";
  } else {
    if (password_verify($_POST['pwd'], $user['pwd'])){
      $_SESSION['user_username'] = $user['user_username'];
      echo "You are now logged in";
    }
  }
  header('Location: ../index.php');
}

 ?>
