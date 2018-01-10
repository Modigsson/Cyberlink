<?php
declare(strict_types=1);

session_start();

$pdo = new PDO('sqlite:./databas.sql');
if (isset($_POST['uid']) && isset($_POST['pwd'])) {
  $username = filter_var($_POST['uid'], FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('SELECT * FROM users WHERE user_email = :user_username OR user_username = :user_username');
  $statement->bindParam(':user_username', $username, PDO::PARAM_STR);
  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    echo "Error";
  } else {
    if (password_verify($_POST['pwd'], $user['user_password'])){
      setcookie('Cyberuser', 'authenticated', time()+3600*24*3, '/');
      $_SESSION['user_username'] = $user['user_username'];
      $_SESSION['user_id'] = $user['user_id'];
      echo "You are now logged in";
    }
  }
  header('Location: ../home.php');
}

 ?>
