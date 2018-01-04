<?php

declare(strict_types=1);

include_once 'includes/header.php';

$pdo = new PDO('sqlite:databas.sql');

  if (isset($_POST['first'], $_POST['last'], $_POST['email'], $_POST['uid'], $_POST['pwd'])) {
    $first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
    $last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    $statement = $pdo->prepare('insert into user (user_firstname, user_lastname, user_email, user_password) values (:user_firstname, :user_lastname, :user_email, :user_password)');

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':user_firstname, :user_lastname, :user_email', $first, $last, $email, PDO::PARAM_STR);
  $statement->bondParam(':user_password', $pwd, PDO::PARAM_STR);
  $statement->execute();

?>

<section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Signup</h2>
    <form class="signupForm" action="includes/signupinc.php" method="POST">
      <input type="text" name="first" placeholder="Firstname" autocomplete="off">
      <input type="text" name="last" placeholder="Lastname" autocomplete="off">
      <input type="text" name="email" placeholder="E-mail" autocomplete="off">
      <input type="text" name="uid" placeholder="Username" autocomplete="off">
      <input type="password" name="pwd" placeholder="Password" autocomplete="off">
      <button type="submit" name="submit">Sign Up</button>
    </form>
  </div>
</section>


<?php
include_once 'footer.php';
?>
