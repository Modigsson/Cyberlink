<?php
// include '../includes/connection.php';
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
      $last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
      $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
      $username = $_POST['username'];
      $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);


      $checkExisting = $pdo->prepare("SELECT user_username FROM users WHERE user_username=:user_username");
      $checkExisting->bindParam(':user_username', $username);
      $checkExisting->execute();

      if ($checkExisting->fetch()) {
          echo "That username already exist!!!";
      } else {
          $statement = $pdo->prepare('INSERT INTO users (user_firstname, user_lastname, user_email, user_username, user_password)
    VALUES (:user_firstname, :user_lastname, :user_email, :user_username, :user_password)');

          $result = $statement->execute(array(
      ':user_firstname' => $first,
      ':user_lastname' => $last,
      ':user_email' => $email,
      ':user_username' => $username,
      ':user_password' => $pwd
    ));
          if ($result) {
              header('Location: ../index.php');
              exit;
          } else {
              echo "Database failure";
              exit;
          }
      }
