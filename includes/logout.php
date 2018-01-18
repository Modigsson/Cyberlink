<?php
declare(strict_types=1);
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_username']);
session_destroy();
header('Location: ../index.php');
exit;
