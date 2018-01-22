<?php
declare(strict_types=1);
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes//connection.php";
include '../includes/header.php';
// $loggedIn = $_SESSION['user_id'];

if (isset($_POST['link'], $_POST['description'])) {
  $content = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
  $URL = filter_var($_POST['link'], FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('UPDATE posts SET link = :link, description = :description WHERE id = :id');
try {
  $updateResult = $statement->execute(array(
    ':link' => $URL,
    ':description', $content,
  ));
  // header('Location: ../feed.php');

} catch (PDOException $e) {
  die($e->getMessage());
  }
}

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post):
  $postID = $post['id'];
 ?>
  <div id=<?php echo $post['id']; ?> class="post">

    <form class="deleteLink" action="posts/delete.php" method="POST">
      <input type="hidden" name="deletePost" value=<?php echo $post['id']; ?>>
      <button class="deleteButton" type="submit" name="delete">Delete</button>
    </form>
    <form action="editpost.php" method="POST">
      <input class="hidden" type="text" name="link" value=<?php echo $post['link']; ?>>
      <input class="hidden" type="text" name="description" value=<?php echo $post['description']; ?>>
      <button type="submit" name="save">Save Change</button>
    </form>
  </div>

  <?php endforeach; ?>
