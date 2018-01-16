<?php
declare(strict_types=1);
session_start();
include 'includes/header.php';

$userID = $_COOKIE['Cyberuser'];
$pdo = new PDO('sqlite:includes/databas.sql');
$statement = $pdo->prepare('SELECT * FROM users WHERE user_id = :user_id');
$statement->bindParam(':user_id', $userID, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if (!password_verify($_POST['currentPassword'], $result['user_password'])) {
  $_SESSION['failed'] = true;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {

  if ($_POST['Email'] != "") {
    $newEmail = trim(filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL));
    $statement = $pdo->prepare('UPDATE users SET user_email = :user_email WHERE user_id = :user_id');
    try {
      $result = $statement->execute(array(
        ':user_email' => $newEmail,
        ':user_id' => $userID,
        // ':user_password' => $newPassword,
        // ':user_description' => $newBiography
      ));
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  if ($_POST['newPassword'] != "") {
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $statement = $pdo->prepare('UPDATE users SET user_password = :user_password WHERE user_id = :user_id');
    try {
      $result = $statement->execute(array(
        // ':user_email' => $newEmail,
        ':user_id' => $userID,
        ':user_password' => $newPassword,
        // ':user_description' => $newBiography
      ));
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  if ($_POST['user_description'] != "") {
    $newBiography = trim(filter_var($_POST['user_description'], FILTER_SANITIZE_EMAIL));
    $statement = $pdo->prepare('UPDATE users SET user_description = :user_description WHERE user_id = :user_id');
    try {
      $result = $statement->execute(array(
        // ':user_email' => $newEmail,
        ':user_id' => $userID,
        // ':user_password' => $newPassword,
        ':user_description' => $newBiography
      ));
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  sleep(1);

  header('Location: home.php');
}
