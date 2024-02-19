<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "genciesdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email and password from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to verify the email and password
$sql = "SELECT u_Name FROM credentials WHERE u_Email = '$email' AND u_Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If the email and password are verified successfully, retrieve the user's name
    while($row = $result->fetch_assoc()) {
        $user_name = $row["u_Name"];
    }

    // Store the user's name in a session variable
    $_SESSION['username'] = $user_name;

    // Redirect the user to the index page
    header("Location: homepage.php");
} else {
    // If authentication fails, redirect back to the login page with an error message
    header("Location: index_Error.html");
}

$conn->close();
?>
