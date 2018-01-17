<?php
session_start();
include 'includes/header.php';
$userInfo = $_COOKIE['Cyberuser'];
$pdo = new PDO('sqlite:includes/databas.sql');
$statement = $pdo->prepare('SELECT * from users WHERE user_id = :user_id');
$statement->bindParam(':user_id', $userInfo, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

?>

<?php if(isset($_COOKIE['Cyberuser'])); ?>

  <section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Welcome <?php echo $result['user_username']; ?></h2>
      <div class="pictureContent">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="file">
          <button type="submit" name="submit">Upload</button>
        </form>
      </div>
    <h3>Visit the feed section to share your own links and see others</h3>
  </div>

  <div class="myProfile">

    <ul>
      <li><?php echo $result['user_username']; ?></li>
      <li><?php echo $result['user_email']; ?></li>
      <li><?php echo $result['user_description']; ?></li>
      <li><a href="editprofile.php">Edit your profile</a></li>
    </ul>

  </div>
</section>

<?php
include_once 'includes/footer.php';
 ?>
