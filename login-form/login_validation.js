function validateForm() {
	const emailTextField = document.getElementById("email");
	const passwordTextField = document.getElementById("password");
	const emailTextFieldError = document.getElementById("email-error");
	const passwordTextFieldError = document.getElementById("password-error");

	// Simple email validation (you might want to enhance this)
	const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	const isEmailValid = emailRegex.test(emailTextField.value);

	// Simple password validation (you might want to enhance this)
	const isPasswordValid = passwordTextField.value.trim() !== "";
	const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	const isPasswordCorrectFormat = passwordRegex.test(passwordTextField.value);
	// Update input styles and error messages based on validation
	validateInput(
		emailTextField,
		isEmailValid,
		emailTextFieldError,
		"Invalid email address"
	);
	validateInput(
		passwordTextField,
		isPasswordValid,
		passwordTextFieldError,
		"Password cannot be empty"
	);
	validateInput(
		passwordTextField,
		isPasswordCorrectFormat,
		passwordTextFieldError,
		"Password must be at least 8 characters long, contain atleast 1 character and 1 digit"
	);

	return isEmailValid && isPasswordValid && isPasswordCorrectFormat;
}

// validate user input
function validateInput(inputField, isValid, errorField, errorMessage) {
	if (isValid) {
		inputField.classList.remove("invalid");
		inputField.classList.add("valid");
		errorField.textContent = "";
	} else {
		inputField.classList.remove("valid");
		inputField.classList.add("invalid");
		errorField.textContent = errorMessage;
	}
}
