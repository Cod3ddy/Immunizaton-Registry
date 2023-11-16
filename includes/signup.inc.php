<?php

if(isset($_POST['submit'])){
    // grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];

    // echo"<script> alert( ' ". $uid . "'); </script>";
    // instantiate sign up controller class
    include "../classes/dbh.classes.php";
    include "../classes/sign.classes.php";
    include "../classes/sign_contr.classes.php";
    include "../lib/authentication.php";
    
    $signup = new SignUpContr($uid, $pwd, $pwdRepeat, $email);
    
    // running error handlers
    $signup -> signUpUser();
    
    // return to home page if no error exist
    $crypt = new Encyption();
    $errorMessage = $crypt -> encrypt("none", $crypt -> key);
    header("location: ../test.php?response=$errorMessage");
}