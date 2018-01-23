<?php
session_start();
include 'includes/header.php';
include $_SERVER["DOCUMENT_ROOT"] . "/includes//connection.php";

if (isset($_SESSION['failed'])) {
  echo '<script language="javascript">';
  echo 'alert("Wrong password")';
  echo '</script>';
  unset($_SESSION['failed']);
}

if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  die();
}
$userID = $_SESSION['user_id'];
$statement = $pdo->prepare('SELECT * from users WHERE user_id = :user_id');
$statement->bindParam(':user_id', $userID, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

?>

<html>
<body>

<div class="editContainer">
  <form class="container" action="updateprofile.php" method="post">
    <input class="editEmail" type="text" name="Email" placeholder="Email" value="<?php echo $result['user_email']; ?>"></br>
    <input class="editPassword" type="password" name="newPassword" placeholder="New Password"></br>
    <input class="verifyPassword" type="password" name="verifyPassword" placeholder="Verify Password"></br>
    <input type="password" name="currentPassword" placeholder="Current Password" required></br>
    <textarea class="editBiography" name="user_description" rows="8" cols="80" value=""><?php echo $result['user_description']; ?></textarea></br>
    <input type="submit" name="Edit" value="Save changes">
  </form>
</div>

<?php include 'includes/footer.php'; ?>
