<?php
// encryption
include "includes/lib/authentication.php";
$encrypt = new Encyption();
    if(isset($_GET["response"])){
        $response = $_GET["response"];
        $decrypt = $encrypt ->decrypt($response, $encrypt ->key);
        
        echo"<script> alert( ' ". $decrypt . "'); </script>";
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login in your account!</title>
    <!-- css link -->
    <link rel="stylesheet" href="assets/css/login.css" />

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>

<body>
    <!-- login form container -->
    <div class="login-container">
        <!-- logo -->
        <div class="login-form-logo">
            <img src="assets/imgs/immunization.png" alt="lost in universe" />
            <p>IRIS</p>
        </div>

        <div class="login-form">
            <!-- login form title -->
            <div class="login-form-title">
                <h2>Login to Your Account</h2>
                <p>Enter your email & password to login</p>
            </div>

            <!-- perform action[on submit] -->
            <form action="includes/login.inc.php" onsubmit="return validateForm()" method="post">
                <!-- email text field -->
                <div class="login-form-item">
                    <label for="email">Email</label>
                    <div class="email-input">
                        <i class="bi bi-at"></i>
                        <input type="email" name="email" id="email" placeholder="Enter your email" />
                    </div>

                    <div id="email-error" class="error-message"></div>
                </div>

                <!-- password text field -->
                <div class="login-form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" />
                    <div id="password-error" class="error-message"></div>
                </div>

                <!-- submit button -->
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- validation js file -->
    <script src="assets/js/login_validation.js"></script>
</body>

</html>