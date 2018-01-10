<?php

declare(strict_types=1);
include 'includes/header.php';

?>

<!DOCTYPE HTML>

<body>
<div class="container">
  <form action="posts/store.php" method="POST">
    <input type="url" name="URL" placeholder="URL"></br>
    <textarea class="link" rows="5" cols="40" name="content" placeholder="Description"></textarea></br>
    <input type="submit" name="Submit" value="Post">
</div>

</form>
</html>

<?php

$pdo = new PDO('sqlite:includes/databas.sql');

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach ($posts as $post): ?>
  <div class="post">
    <a href="<?php echo $post['link']; ?>"> <?php echo $post['description']; ?> </a>
  </div>
  <?php endforeach; ?>
