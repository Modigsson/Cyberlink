<?php
declare(strict_types=1);
include_once 'includes/header.php';
?>
<section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Signup</h2>
    <form class="signupForm" action="/php/create_account.php" method="POST">
      <input type="text" name="first" placeholder="Firstname" autocomplete="on">
      <input type="text" name="last" placeholder="Lastname" autocomplete="on">
      <input type="text" name="email" placeholder="E-mail" autocomplete="on">
      <input type="text" name="username" placeholder="Username" autocomplete="on">
      <input type="password" name="pwd" placeholder="Password" autocomplete="off">
      <button type="submit" name="submit">Sign Up</button>
    </form>
  </div>
</section>


<?php
include_once 'includes/footer.php';
?>
