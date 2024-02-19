<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submission logic
    // Retrieve form data
    $name = $_POST["fullName"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $address = $_POST["address"];
    $number = $_POST["phoneNumber"];

    $conn = new mysqli("localhost", "root", "", "genciesdb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO credentials (u_Name, u_Email, u_Password, u_Address, u_PhoneNum) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $address, $number);

   
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: signup_success.html");
        echo '<a href="index.html"><button type="button">Return to Login Page</button></a>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit(); 
} else {
    // Redirect to create_account.php if accessed directly
    header("Location: signup.html");
    exit();
}
?>
s