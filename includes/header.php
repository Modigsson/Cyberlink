<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if (isset($_COOKIE['Cyberuser'])): ?>
      <title>Cyberlinked</title>
    <?php else: ?>
      <title>Cyberlink</title>
    <?php endif; ?>


    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

<header>
  <nav>
    <div class="headWrapper">
    <?php if (isset($_COOKIE['Cyberuser'])): ?>

      <ul>
        <li><a href="../home.php">Home</a></li>
        <li><a href="../feed.php">Feed</a></li>
      </ul>

    <?php endif; ?>

        <div class="navLogin">

          <form action="/includes/login.php" method="POST">

            <?php
            if (isset($_COOKIE['Cyberuser'])):
            ?>
              <a href="/includes/logout.php">Logout</a>

            <?php else: ?>
              <input type="text" name="uid" placeholder="Username/email">
              <input type="password" name="pwd" placeholder="Password">
              <button type="submit" name="login">Login</button>
              <a href="signup.php">Sign Up</a>
            <?php endif; ?>
            </form>

        </div>
    </div>
  </nav>
</header>
