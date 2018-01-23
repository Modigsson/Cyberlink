<?php
declare(strict_types=1);
session_start();
include 'includes/header.php';
include 'posts/delete.php';

?>

<!DOCTYPE HTML>

<body>
  <?php
  if (isset($_POST['editPost'])) {
      ?>
      <div class="container">
        <form action="php/updatePost.php" method="POST">
          <div class="linkField">
            <input type="hidden" name="postIDValue" value="<?php echo $_POST['postIDValue'] ?>">
          <input class="urlField" type="url" name="URL" placeholder="URL" value="<?php echo $_POST['linkValue'] ?>"></br>
          <textarea class="descriptionField" class="link" rows="5" cols="40" name="content" placeholder="Description"><?php echo $_POST['descriptionValue']?></textarea></br>
          <input class="linkSubmit" type="submit" name="Submit" value="Save">
        </div>
      </div>
      </form>
      <?php
  } else {
      ?>
    <div class="container">
      <form action="posts/store.php" method="POST">
        <div class="linkField">
        <input class="urlField" type="url" name="URL" placeholder="URL"></br>
        <textarea class="descriptionField" class="link" rows="5" cols="40" name="content" placeholder="Description"></textarea></br>
        <input class="linkSubmit" type="submit" name="Submit" value="Post">
      </div>
    </div>
</form>
<?php
  }
?>

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
  $userID = $_SESSION['user_id'];
  $postID = $post['id'];
  $statement = $pdo->prepare('SELECT sum(value) AS value from votes  WHERE link_id=:link_id');
$statement->bindParam(':link_id', $postID);
$statement->execute();
$vote = $statement->fetch(PDO::FETCH_ASSOC);

$CheckVote = $pdo->prepare("SELECT * FROM votes WHERE user_id=:user_id AND link_id=:postID");
$CheckVote->bindParam(':user_id', $userID);
$CheckVote->bindParam(':postID', $postID);
$CheckVote->execute();
$CheckVote = $CheckVote->fetchAll(PDO::FETCH_ASSOC);
 ?>
  <div id=<?php echo $post['id']; ?> class="post">
    <p class="<?php
    if (!empty($CheckVote[0]['value'])) {
        if ($CheckVote[0]['value'] == 1) {
            echo "positive";
        } elseif ($CheckVote[0]['value'] == -1) {
            echo "negative";
        } else {
            echo "default";
        }
    } ?>"><?php if (!empty($vote['value'])):?>
      <?php echo $vote['value'];?>
    <?php else: echo "0";?>
    <?php endif; ?></p>
    <form class="voteUp" action="posts/vote.php" method="post">
      <label class="upVote">
      <input type="hidden" name="postID" value=<?php echo $postID ?>>
      <input type="submit" name="voteUp" style="display:none;">
      <?php
      if (!empty($CheckVote[0]['value'])) {
          if ($CheckVote[0]['value'] == 1) {
              ?>
              <img src="/images/green-arrow-up.png" alt="">
              <?php
          } else {
              ?>
            <img src="/images/default-arrow-up.png" alt="">
            <?php
          }
      } else {
          ?>
          <img src="/images/default-arrow-up.png" alt="">
          <?php
      }
       ?>
       </label>

    </form>
    <form class="voteDown" action="posts/vote.php" method="post">
      <label class="downVote">
      <input type="hidden" name="postID" value=<?php echo $postID ?>>
      <input type="submit" name="voteDown" style="display:none;">
      <?php
      if (!empty($CheckVote[0]['value'])) {
          if ($CheckVote[0]['value'] == -1) {
              ?>
              <img src="/images/red-arrow-down.png" alt="">
              <?php
          } else {
              ?>
            <img src="/images/default-arrow-down.png" alt="">
            <?php
          }
      } else {
          ?>
          <img src="/images/default-arrow-down.png" alt="">
          <?php
      }
       ?>
       </label>
    </form>
      <form class="editLink" action="" method="post">
        <input type="hidden" name="linkValue" value="<?php echo $post['link'] ?>">
        <input type="hidden" name="descriptionValue" value="<?php echo $post['description'] ?>">
        <input type="hidden" name="postIDValue" value="<?php echo $postID ?>">
        <input type="hidden" name="editPost">
        <button class="editButton" type="submit" name="editPost">Edit</button>
      </form>
      <form class="deleteLink" action="posts/delete.php" method="POST">
        <input type="hidden" name="deletePost" value="<?php echo $postID ?>">
        <button class="deleteButton" type="submit" name="delete">Delete</button>
      </form>
    <form action="feed.php" method="POST">
      <a href="<?php echo $post['link']; ?>"> <?php echo $post['description']; ?> </a>
    </form>
  </div>

  <?php endforeach; ?>
