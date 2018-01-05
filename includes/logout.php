<?php

declare(strict_types=1);

include_once '../index.php';

$_SESSION = array();
session_destroy();

setcookie('Cyberuser', 'authenticated', time()-1);

header(Location: ../index.php);

 ?>
