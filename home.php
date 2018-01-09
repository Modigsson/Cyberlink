<?php

declare(strict_types=1);
include 'includes/header.php';

?>

<!DOCTYPE HTML>

<body>
<div class="container">

  <form action="home.php" method="POST">
    <input type="url" name="URL" placeholder="URL"></br>
    <textarea class="link" rows="5" cols="40" name="content" placeholder="Description"></textarea></br>
    <input type="submit" name="Submit" value="Post">
</div>

</form>
</html>
