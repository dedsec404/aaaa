<?php
/**
 * index.php - The Entry File
**/

// Start the session
session_start();
// It is really important to regenerate id on every click...
session_regenerate_id();

// We will tell the next file that we have a token set using session
$_SSEION['setToken'] = true;

// The filename... You can get that from a $_GET variable and store it here
$token = "video.mp4";

// We will be encrypting the video name using session id as key ans AES128 as the algorithm
$token_encrypted = openssl_encrypt($token, "aes128", session_id());

?>

<video width="320" height="240" controls="">
  <source src="video.php?vid=<?php echo $token_encrypted; ?>">
</source></video>