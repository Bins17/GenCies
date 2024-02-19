<?php
session_start(); 

// Retrieve the username from the session
//$user_name = $_SESSION['username'];

if (isset($_SESSION['username'])) {
    // If the user is logged in, redirect to verifyadmin.php
    header("Location: verifyadmin.php");
    exit(); // Make sure to exit after redirection
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenCies</title>
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

        .title-label {
            font-size: 24px;
            color: white;
        }

        .welcome-message {
            font-size: 20px;
            font-weight: bold;
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

        .emergency-type {
            color: lightblue;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this report?");
        }
    </script>
</head>
<body>
<div class="title-container">
    <h1 class="title-label">Welcome Admin, Here are the list of the Reports made of our registered users<span class="welcome-message"></span>!</h1>
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

// Handle report deletion
if (isset($_POST['delete_report'])) {
    $report_id = $_POST['delete_report'];
    $sql_delete = "DELETE FROM report WHERE ReportID = $report_id";
    if ($conn->query($sql_delete) === TRUE) {
    } else {
        echo "Error deleting report: " . $conn->error;
    }
}

// SQL query to retrieve specified columns from the table
$sql = "SELECT u_ID, u_Name, u_Email, u_Address, u_PhoneNum FROM credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Phone Number</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["u_ID"] . "</td><td>" . $row["u_Name"] . "</td><td>" . $row["u_Email"] . "</td><td>" . $row["u_Address"] . "</td><td>" . $row["u_PhoneNum"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// SQL query to retrieve reports
$sql_reports = "SELECT ReportID, u_ID, u_Name, Report, Severity, E_Type, rTime FROM report";
$result_reports = $conn->query($sql_reports);

if ($result_reports->num_rows > 0) {
    echo "<h2 class='table-label'>List of Reports</h2>";
    echo "<table><tr><th>ID</th><th>Name</th><th>Symptoms/Report</th><th>Severity</th><th style='color:lightblue;'>Emergency Type</th><th>Report Time</th><th>Action</th></tr>";
   while ($row = $result_reports->fetch_assoc()) {
    echo "<tr><td>" . $row["u_ID"] . "</td><td>" . $row["u_Name"] . "</td><td>" . $row["Report"] . "</td><td>" . $row["Severity"] . "</td><td class='emergency-type'>" . $row["E_Type"] . "</td><td>" . $row["rTime"] . "</td><td><form method='post' onsubmit='return confirmDelete()'><button type='submit' name='delete_report' value='" . $row["ReportID"] . "'>Delete</button><button>Notify</button></form></td></tr>";

}
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<div class="logout-btn">
    <button onclick="window.location.href = 'admins.html';">Logout</button>
</div>
</body>
</html>
