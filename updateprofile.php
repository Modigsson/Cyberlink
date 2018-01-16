<?php
declare(strict_types=1);

// session_start();
include 'includes/header.php';

$pdo = new PDO('sqlite:includes/databas.sql');
$statement = $pdo->prepare('SELECT user_password from users WHERE user_id = :user_id');
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if (!password_verify($_POST['currentPassword'], $result['user_password'])) {
  echo '<script language="javascript">';
  echo 'alert("Wrong password")';
  echo '</script>';
} else {
  $newEmail = trim(filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL));
  $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
  $newBiography = filter_var($_POST['user_description'], FILTER_SANITIZE_STRING);
  $updatedEmail = $pdo->prepare('UPDATE * SET user_email = :user_email, user_password = :user_password, user_description = :user_description WHERE user_id = :user_id');

  $result = $statement->execute(array(
    ':user_email' => $newEmail,
    ':user:password' => $newPassword,
    ':user_description' => $newBiography
  ));

  header('Location: home.php');
  echo "Accounts successfully updated";
}
