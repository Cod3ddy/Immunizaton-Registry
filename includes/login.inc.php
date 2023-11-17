<?php

if(isset($_POST['submit'])){
    // grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    
    // echo"<script> alert( ' ". $uid . "'); </script>";
    // instantiate sign up controller class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login_contr.classes.php";
    include "../lib/authentication.php";
    
    $login = new LoginContr($email, $pwd);
    
    // running error handlers
    $login -> loginUser();
     
    // return to home page if no error exist
    $crypt = new Encyption();
    $response = $crypt -> encrypt("logged in successfully", $crypt -> key);
    header("location: ../pages/home.php?response=$response");
}