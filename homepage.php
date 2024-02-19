<?php
session_start(); 

// Check if the user is logged in
if(!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect to index.html
    header("Location: index.html");
    exit(); // Make sure to exit after redirection
}

// Database connection
$conn = new mysqli("localhost", "root", "", "genciesdb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username and user ID from the session
$user_name = $_SESSION['username'];

// Prepare and execute SQL statement to retrieve user ID and username
$stmt = $conn->prepare("SELECT u_ID, u_Name FROM credentials WHERE u_Name = ?");
$stmt->bind_param("s", $user_name);
$stmt->execute();
$stmt->bind_result($user_id, $user_name);
$stmt->fetch();

// Store the user ID and username in the session
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $user_name;

$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenCies</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="homepagestyles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <br>
        <br>
        <a href="#">
            <img src="profile_icon.png" alt="Profile Icon" class="icon"> Profile
        </a>
        <a href="#">
            <img src="message_icon.png" alt="Messages Icon" class="icon"> Messages
        </a>
        <a href="#">
            <img src="settings_icon.png" alt="Settings Icon" class="icon">Settings
        </a>
        <a href="#" class="exit-link">
            <img src="logout_icon.png" alt="Logout Icon" class="icon"> Logout
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" class="logo-navbar">
            GenCies - Your Website for Health Emergency 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <img src="home_icon.png" alt="Home Icon" class="nav-icon"> Home <span class="sr-only">(current)</span>
                    </a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="contactus_icon.png" alt="Contact Icon" class="nav-icon"> Contact Us
                    </a>
                </li>
            </ul>
            <h1 class="mr-3" style="font-size: 20px;">Welcome, <?php echo '<span style="font-weight: bold;">' . $user_name . '</span>'; ?>!
            </h1>
            <img id="profileImageNavbar" src="" alt="Profile Image" class="profile-image-navbar">
        </div>
    </nav>

    <!-- Added description section with image -->
    <div class="description-section">
        <div class="description-text">
            <p><b><i>Welcome to the Homepage! </i></b></p>
            <p>This website is a platform for handling health emergencies.</p>
            <p>You can report your medical concerns, find nearby hospitals, and access emergency contact numbers easily.</p>
            <p>We aim to provide quick and reliable assistance during critical situations.</p>
            <p>Stay connected with us and help us improve our website!</p>
        </div>
        <img src="desSectionpic.png" alt="Description Image" class="description-image">
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="button-container">
                <div class="button report-accident-button">
                    <div class="button-image" style="background-image: url('accident.png')"></div>
                    <div class="button-text">Report Health Concern</div>
                </div>
                <div class="button getLocation-button">
                    <div class="button-image" style="background-image: url('hospitals.png')"></div>
                    <div class="button-text">Nearby Hospitals</div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="button-container">
                <div class="button report-accident-button">
                    <div class="button-image" style="background-image: url('emergencynums.png')"></div>
                    <div class="button-text">Emergency Numbers</div>
                </div>
                <!-- New button for First Aid Procedures -->
                <div class="button report-accident-button">
                    <div class="button-image" style="background-image: url('firstaid.png')"></div>
                    <div class="button-text">Health Tips</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up container -->
    <div class="popup-container">
    <!-- Close icon -->
    <span class="close-icon">&times;</span>
    <!-- Pop-up content -->
    <div class="popup-content">
        <h2>Select</h2>
       <div class="popup-buttons">
            <button id="accidentButton">
                <img src="accident_icon.png" alt="Accident Icon">
                <div>Schedule a Doctor</div>
            </button> 
            <button id="medicalButton">
                <img src="medical_icon.png" alt="Medical Icon">
                <div>Medical Assistance</div>
            </button>
        </div>
    </div>
</div>

  
<div class="popup-container accident-popup-container">
    <!-- Close icon -->
    <span class="close-icon accident-popup-close">&times;</span>
    <!-- Pop-up content -->
    <div class="popup-content">
        <h2>Let us Know</h2>
        <div class="emergency-type"></div> 
        <form id="accidentForm" method="POST" action="submit_accident.php">
            <div class="form-group">
                <label for="accidentDetails">Details:</label>
                <textarea class="form-control" id="accidentDetails" name="accidentDetails" rows="3" placeholder="Please specify the details of your concern..."></textarea>
            </div>
            <div class="form-group">
                <label for="severity">Severity:</label>
                <select class="form-control" id="severity" name="severity">
                    <option value="mild">Mild</option>
                    <option value="moderate">Moderate</option>
                    <option value="severe">Severe</option>
                    <option value="critical">Critical</option>
                </select>
            </div>
            <div class="form-group">
</div>

           
            <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
            <input type="hidden" name="user_name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>">
            <input type="hidden" name="emergencyType" value="Schedule a Doctor"> <!-- Hidden input field for emergency type -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<div class="popup-container medical-popup-container">
    <!-- Close icon -->
    <span class="close-icon medical-popup-close">&times;</span>
    <!-- Pop-up content -->
    <div class="popup-content">
        <h2>Let us Know</h2>
        <div class="emergency-type"></div> 
        <form id="accidentForm" method="POST" action="submit_accident.php">
    <div class="form-group">
        <label for="accidentDetails">Details:</label>
        <textarea class="form-control" id="accidentDetails" name="accidentDetails" rows="3" placeholder="Please specify your health concern..."></textarea>
        </div>
        <div class="form-group">
                <label for="severity">Severity:</label>
                <select class="form-control" id="severity" name="severity">
                    <option value="mild">Mild</option>
                    <option value="moderate">Moderate</option>
                    <option value="severe">Severe</option>
                    <option value="critical">Critical</option>
                </select>
            </div>
        <label for="location">Current Location:</label>
    <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location info, detailed is appreciated so we can assist ASAP!">
    

    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
    <input type="hidden" name="user_name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>">
    <input type="hidden" name="emergencyType" value="Medical Assistance"> <!-- Hidden input field for emergency type -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>




<div class="popup-container profile-popup-container">
    <!-- Close icon -->
    <span class="close-icon profile-popup-close">&times;</span>
    <!-- Pop-up content -->
   <!-- Add an image wrapper with class "image-wrapper" -->
<div class="popup-content">
    <h2>Profile</h2>
    <div class="image-wrapper"> <!-- Added div for image wrapper -->
        <img class="profile-image" src="" alt="Uploaded Photo">
    </div>
    <input type="file" id="uploadProfilePic" accept="image/*">
    <button id="uploadButton">Upload</button>
</div>

</div>

      <script src="homepage.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
