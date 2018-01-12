<?php
include 'includes/header.php';
?>

<?php if(isset($_SESSION['Cyberuser'])); ?>

<section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Welcome <?php echo $_SESSION['user_username']['user_username']; ?></h2>
    <h3>Visit the feed section to share your own links and see others</h3>
  </div>

  <div class="myProfile">

    <ul>
      <li><?php echo "hej"; ?></li>
      <li><?php echo "hej"; ?></li>
      <li><?php echo "hej"; ?></li>
      <li><a href="editprofile.php">Edit your profile</a></li>
    </ul>

  </div>
</section>

<?php
include_once 'includes/footer.php';
 ?>
