<?php

declare(strict_types=1);

if (isset($_POST['submit'])) {
  $picture = $_FILES['files'];

  $pictureName = $_FILES['file']['name']
  $pictureTmpName = $_FILES['file']['tmp_name']
  $pictureSize = $_FILES['file']['size']
  $pictureError = $_FILES['file']['error']
  $pictureType = $_FILES['file']['type']

  $pictureExtension = explode('.', $pictureName);
  $pictureActualExt = strtolower(end($pictureExtension));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($pictureActualExt, $allowed)) {
    if ($pictureError === 0) {
      if ($pictureSize < 30000) {
        $newPictureName = uniqid('', true).".".$pictureActualExt;
        $pictureDestination = 'upload/'.$newPictureName;
        move_uploaded_file($pictureTmpName, $pictureDestination);
        header('Location: home.php?Uploadsuccess');
      } else {
        echo "File too big";
      }
    } else {
      echo "Error uploading this file";
    }
  } else {
    echo "Cannot upload this filetype";
  }
}
