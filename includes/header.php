<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
  </head>
  <body>

<header>
  <nav>
    <div class="headWrapper">
      <ul>
        <li><a href="index.php">Home</a></li>
      </ul>
        <div class="navLogin">

          <form action="/includes/login.php" method="POST">
            <input type="text" name="uid" placeholder="Username/email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login">Login</button>
          </form>

            <a href="signup.php">Sign Up</a>
        </div>
    </div>
  </nav>
</header>
