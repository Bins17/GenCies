<?php
// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection
    $conn = new mysqli("localhost", "root", "", "genciesdb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the form data
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $accidentDetails = $_POST['accidentDetails'];
    $emergencyType = $_POST['emergencyType'];
    $severity = $_POST['severity'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO report (u_ID, u_Name, Report, Severity, E_Type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $user_name, $accidentDetails, $severity, $emergencyType);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Report submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

