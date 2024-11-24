<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ams";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the complaint from the database
    $sql = "DELETE FROM complaints WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Complaint deleted successfully.');
                window.location.href = 'view_complaint.php';
              </script>";
    } else {
        echo "Error deleting complaint: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
