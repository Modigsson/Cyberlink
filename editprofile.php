<?php include 'includes/header.php' ?>

<html>
<body>

<div class="editContainer">
  <form class="container" action="editprofile.html" method="post">
    <input class="editEmail" type="text" name="Email" placeholder="Email"></br>
    <input class="editPassword" type="password" name=" New Password" placeholder="Password"></br>
    <input type="verifyPassword" name="verifyPassword" placeholder="Verify Password"></br>
    <input type="password" name="Current Password" placeholder="Current Password"></br>
    <textarea class="editBiography" rows="8" cols="80" placeholder="Edit Biography"></textarea></br>
    <input type="submit" name="Edit" value="Save changes">
  </form>
</div>



<?php include 'includes/footer'; ?>
