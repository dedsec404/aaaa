<?php
/**
 * access.php - The main serving file which will server the video
**/
session_start();

// Decrypt the Token to get back the video file name
$token = openssl_decrypt($_GET['vid'], "aes128", $_GET['id'].session_id());

// Check if file exists
if(file_exists("videos/".$token))
{
  // Another important point here is a session id regeneration
  session_regenerate_id(true);  

  $file = $token;
  $file_size = filesize($file);
  $file_pointer = fopen($file, "rb");
  $data = fread($file_pointer, $file_size);
  header("Content-type: video/mp4");

  echo $data;
}
else {
  echo "Error: File Does not exists";
}
?>