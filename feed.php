<?php
declare(strict_types=1);
session_start();
include 'includes/header.php';
include 'posts/delete.php';

?>

<!DOCTYPE HTML>

<body>
<div class="container">
  <form action="posts/store.php" method="POST">
    <div class="linkField">
    <input class="urlField" type="url" name="URL" placeholder="URL"></br>
    <textarea class="descriptionField" class="link" rows="5" cols="40" name="content" placeholder="Description"></textarea></br>
    <input class="linkSubmit" type="submit" name="Submit" value="Post">
  </div>
</div>

</form>
</html>

<?php
$pdo = new PDO('sqlite:includes/databas.sql');

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

$statementGet = $pdo->prepare('SELECT * FROM votes');
$statementGet->execute();
$voteResult = $statementGet->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// die(var_dump($voteResult));

?>

<?php foreach ($posts as $post):
  $postID = $post['id'];
 ?>
  <div id=<?php echo $post['id']; ?> class="post">
    <p><?php echo $voteResult[0]['value']; ?></p>
    <form class="" action="posts/vote.php" method="post">
      <input type="hidden" name="postID" value=<?php echo $postID ?>>
      <button class="voteButton" type="submit" name="voteUp">Like</button>
    </form>
    <form class="" action="posts/vote.php" method="post">
      <input type="hidden" name="postID" value=<?php echo $postID ?>>
      <button class="voteButton" type="submit" name="voteDown">Dislike</button>
    </form>
    <form class="editLink" action="posts/editpost.php" method="post">
      <input type="hidden" name="editPost">
      <button class="editButton" type="submit" name="edit">Edit</button>
    </form>
    <form class="deleteLink" action="posts/delete.php" method="POST">
      <input type="hidden" name="deletePost" value=<?php echo $post['id']; ?>>
      <button class="deleteButton" type="submit" name="delete">Delete</button>
    </form>
    <form action="feed.php" method="POST">
      <a href="<?php echo $post['link']; ?>"> <?php echo $post['description']; ?> </a>
    </form>
  </div>

  <?php endforeach; ?>
