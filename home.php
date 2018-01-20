<?php
declare(strict_types=1);
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";
include 'includes/header.php';
$loggedIn = $_SESSION['user_id'];


try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare('SELECT * FROM users WHERE user_id=:user_id');
    $statement->bindParam(':user_id', $loggedIn);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
    echo "Database error" . "<br>" . $e->getMessage();
}
?>

<?php if (isset($loggedIn)); ?>
  <section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Welcome <?php echo $result[0]['user_username']; ?></h2>
      <div class="pictureContent">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="profilePicture">
            <img src= <?php echo $result[0]['user_picture']; ?>>
          </div>
          <label for="avatar">Choose a pic</label>
          <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required><br>
          <button type="submit" name="submit">Upload</button>
        </form>
      </div>
    <h3>Visit the feed section to share your own links and see others</h3>
  </div>

  <div class="myProfile">

    <ul>
      <li><?php echo $result[0]['user_username']; ?></li>
      <li><?php echo $result[0]['user_email']; ?></li>
      <li><?php echo $result[0]['user_description']; ?></li>
      <li><a href="editprofile.php">Edit your profile</a></li>
    </ul>

  </div>
</section>

<?php
include_once 'includes/footer.php';
 ?>
