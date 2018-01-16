<?php
declare(strict_types=1);

setcookie('Cyberuser', "", time()-999, '/');

$_SESSION = array();
session_destroy();

header('Location: ../index.php');

 ?>
