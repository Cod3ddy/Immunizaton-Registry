<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    /* Your CSS styles here */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    #login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    #logo {
        max-width: 100px;
        margin-bottom: 20px;
    }

    #login-form {
        text-align: left;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .valid {
        border: 1px solid #4CAF50;
    }

    .invalid {
        border: 1px solid #f44336;
    }

    .error-message {
        color: #f44336;
        margin-top: 5px;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <div id="login-container">
        <img src="your-logo.png" alt="Logo" id="logo">
        <h2>Login to Your Account</h2>
        <p>Enter your email & password to login</p>
        <form action="login.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <div id="email-error" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <div id="password-error" class="error-message"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
    function validateForm() {
        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');
        var emailError = document.getElementById('email-error');
        var passwordError = document.getElementById('password-error');

        // Simple email validation (you might want to enhance this)
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var isEmailValid = emailRegex.test(emailInput.value);

        // Simple password validation (you might want to enhance this)
        var isPasswordValid = passwordInput.value.trim() !== '';

        // Update input styles and error messages based on validation
        updateInputAndError(emailInput, isEmailValid, emailError, 'Invalid email address');
        updateInputAndError(passwordInput, isPasswordValid, passwordError, 'Password cannot be empty');

        // Check if both email and password are valid before allowing form submission
        return isEmailValid && isPasswordValid;
    }

    function updateInputAndError(inputElement, isValid, errorElement, errorMessage) {
        if (isValid) {
            inputElement.classList.remove('invalid');
            inputElement.classList.add('valid');
            errorElement.textContent = '';
        } else {
            inputElement.classList.remove('valid');
            inputElement.classList.add('invalid');
            errorElement.textContent = errorMessage;
        }
    }
    </script>
</body>

</html>