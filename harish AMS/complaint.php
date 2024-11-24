<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "ams";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form and sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $apartment_name = trim($_POST['apartment_name']);
    $apartment_location = trim($_POST['apartment_location']);
    $apartment_number = trim($_POST['apartment-number']);
    $contact_number = trim($_POST['contact-number']);
    $issues = trim($_POST['issues']);

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($apartment_name) && !empty($apartment_location) && !empty($apartment_number) && !empty($contact_number) && !empty($issues)) {
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.');</script>";
        } elseif (!ctype_digit($apartment_number) || !ctype_digit($contact_number)) {
            echo "<script>alert('Apartment and Contact numbers must be digits.');</script>";
        } else {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO complaints (name, email, apartment_name, apartment_location, apartment_number, contact_number, issues) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssiss", $name, $email, $apartment_name, $apartment_location, $apartment_number, $contact_number, $issues);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<script>
                        alert('Complaint submitted successfully!');
                        window.location.href = 'dashboard.php';
                      </script>";
                exit();
            } else {
                echo "<script>alert('Error submitting complaint. Please try again.');</script>";
            }

            // Close the statement
            $stmt->close();
        }
    } else {
        // Handle validation error
        echo "<script>alert('Please fill in all the required fields.');</script>";
    }
}

// Close the connection
$conn->close();
?>
