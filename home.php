<?php
include 'includes/header.php';
$userInfo = $_COOKIE['Cyberuser'];
$pdo = new PDO('sqlite:includes/databas.sql');
$statement = $pdo->prepare('SELECT * from users WHERE user_id = :user_id');
$statement->bindParam(':user_id', $userInfo, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

?>

<?php if(isset($_SESSION['Cyberuser'])); ?>

<section class="bodyContainer">
  <div class="bodyWrapper">
    <h2>Welcome</h2>
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
