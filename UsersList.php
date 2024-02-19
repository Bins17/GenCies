<?php
session_start();

// Check if the user is logged in
if(!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect to index.html
    header("Location: admins.html");
    exit(); // Make sure to exit after redirection
}

// Retrieve the username from the session
$user_name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Table with Gradient Background</title>
<style>
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .title-container {
        background: linear-gradient(to bottom, #000000, #808080);
        text-align: center;
        padding: 20px 0;
    }

    .table-label {
        font-size: 24px;
        color: white;
    }

    table {
        margin: 0 auto;
        border-collapse: collapse;
        width: 80%;
        background: linear-gradient(to bottom, #000000, #808080);
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        color: white;
    }

    th {
        background-color: #333333;
    }

    tr:nth-child(even) {
        background-color: #444444;
    }

    tr:hover {
        background-color: #666666;
    }
</style>
</head>
<body>
<div class="title-container">
    <h2 class="table-label">List of Registered Accounts</h2>
</div>
<?php
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

// SQL query to retrieve specified columns from the table
$sql = "SELECT u_ID, u_Name, u_Email, u_Address, u_PhoneNum FROM credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Phone Number</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["u_ID"]."</td><td>".$row["u_Name"]."</td><td>".$row["u_Email"]."</td><td>".$row["u_Address"]."</td><td>".$row["u_PhoneNum"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
