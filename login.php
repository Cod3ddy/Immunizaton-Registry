<?php
// your_php_page.php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "immunization-registry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email and password from the POST request
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

// Perform authentication
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Check if a user with the provided credentials exists
if ($result->num_rows > 0) {
    // Authentication successful
    $response = array('status' => 'success', 'message' => 'Login successful!');
} else {
    // Authentication failed
    $response = array('status' => 'error', 'message' => 'Invalid email or password. Please try again.');
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$conn->close();
?>