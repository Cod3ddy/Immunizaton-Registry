<?php
// log out session
session_start();
// unset of the different session varibales
session_unset();
// destroy session
session_destroy();

// going back to the front page
$crypt = new Encyption();
$response = $crypt -> encrypt("logged out", $crypt->key);
header("location: ../index.php?reponse=$repsonse");