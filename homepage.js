document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.exit-link').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'index.html'; // Logout without confirmation
    });

    document.querySelectorAll('.report-accident-button').forEach(button => {
        button.addEventListener('click', function() {
            var popupContainer = document.querySelector('.popup-container');
            if (popupContainer) {
                popupContainer.style.display = 'block';
            }
        });
    });

    document.querySelectorAll('.popup-container .close-icon').forEach(closeIcon => {
        closeIcon.addEventListener('click', function() {
            this.closest('.popup-container').style.display = 'none';
        });
    });

  document.querySelectorAll('.popup-buttons button').forEach(button => {
    button.addEventListener('click', function() {
        var emergencyType = button.textContent.trim();
        if (emergencyType === 'Schedule a Doctor') {
            var accidentPopupContainer = document.querySelector('.accident-popup-container');
            if (accidentPopupContainer) {
                accidentPopupContainer.style.display = 'block';
                var accidentPopupContent = accidentPopupContainer.querySelector('.popup-content');
                if (accidentPopupContent) {
                    accidentPopupContent.querySelector('.emergency-type').textContent = 'Emergency Type: ' + emergencyType;
                }
            }
        } else if (emergencyType === 'Medical Assistance') {
            var medicalPopupContainer = document.querySelector('.medical-popup-container');
            if (medicalPopupContainer) {
                medicalPopupContainer.style.display = 'block';
                var medicalPopupContent = medicalPopupContainer.querySelector('.popup-content');
                if (medicalPopupContent) {
                    medicalPopupContent.querySelector('.emergency-type').textContent = 'Emergency Type: ' + emergencyType;
                }
            }
        }
    });
});



    document.querySelectorAll('.popup-container form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this); // Create FormData object to handle form data

            $.ajax({
                type: 'POST',
                url: 'submit_accident.php', // PHP script to handle form submission
                data: formData, // Use FormData object for form data
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting contentType
                success: function(response) {
                    console.log(response); // Log the response from the server
                    // Optionally, show a success message to the user
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors to the console
                    // Optionally, show an error message to the user
                }
            });
        });
    });

    $(".sidebar a[href='#']").click(function (e) {
        e.preventDefault();
        if ($(this).text().trim() === "Profile") {
            $(".profile-popup-container").show();
        }
    });

    $(".profile-popup-close").click(function () {
        $(".profile-popup-container").hide();
    });

    $("#uploadProfilePic").change(function () {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profile-image').attr('src', e.target.result);
                $('#profileImageNavbar').attr('src', e.target.result); // Update navbar image source
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $("#uploadButton").click(function () {
        // Handle the upload process here
    });
});


$(document).ready(function() {
    $('.button.getLocation-button').click(function() {
        // Check if geolocation is supported
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // Retrieve latitude and longitude
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // Now you can use lat and lng to fetch nearby hospitals
                fetchNearbyHospitals(lat, lng);
            }, function(error) {
                console.error('Error getting user location:', error);
                alert('Error getting user location. Please try again later.');
            });
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    });
});

function fetchNearbyHospitals(latitude, longitude) {
   var nearbyHospitals = ['Hospital 1', 'Hospital 2', 'Hospital 3']; // Example list of hospitals

    // Clear previous content of the pop-up container
    $('.popup-content').empty();

    // Populate the pop-up container with the list of nearby hospitals
    var hospitalsList = $('<ul>');
    nearbyHospitals.forEach(function(hospital) {
        hospitalsList.append($('<li>').text(hospital));
    });

    $('.popup-content').append('<h2>Nearby Hospitals</h2>');
    $('.popup-content').append(hospitalsList);

    // Show the pop-up container
    $('.popup-container').show();
}

