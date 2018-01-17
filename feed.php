<?php

declare(strict_types=1);
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

?>

<?php foreach ($posts as $post):
 ?>
  <div class="post">
    <form class="deleteLink" action="posts/delete.php" method="POST">
      <input type="hidden" name="linkID">
      <button class="delete" type="submit" name="delete">delete</button>
    </form>
    <form action="feed.php" method="POST">
      <a href="<?php echo $post['link']; ?>"> <?php echo $post['description']; ?> </a>
    </form>
  </div>

  <?php endforeach; ?>
