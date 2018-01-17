<?php

include 'includes/header.php';


if (isset($_FILES['avatar'])) {
  $file = $_FILES['avatar'];
  $destination = sprintf('%s\%s', __DIR__.'\images', $file['name']);
  move_uploaded_file($file['tmp_name'], $destination);
  header('Location: home.php');
}
