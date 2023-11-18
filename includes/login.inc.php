<?php
echo "login in file";
// log the user in
if(isset($_POST['submit'])){
    echo "is it working?";
    // grabbing the data
    $password = $_POST['password'];
    $emailAddress = $_POST['email'];
    
    // echo"<script> alert( ' ". $uid . "'); </script>";
    // instantiate sign up controller class
    include "../classes/database.class.php";
    include "../classes/login.class.php";
    include "../classes/login.contr.php";
    include "lib/authentication.php";
    
    $login = new LoginContr($emailAddress, $password);
    
    // running error handlers
    $login -> loginUser();
     
    // return to home page if no error exist
    // $crypt = new Encyption();
    // $response = $crypt -> encrypt("logged in successfully", $crypt -> key);
    // header("location: ..?response=$response");
}