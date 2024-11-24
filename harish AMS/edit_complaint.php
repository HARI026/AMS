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

    // Fetch the complaint data based on the ID
    $sql = "SELECT * FROM complaints WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $apartment_name = $row['apartment_name'];
        $apartment_location = $row['apartment_location'];
        $apartment_number = $row['apartment_number'];
        $contact_number = $row['contact_number'];
        $issues = $row['issues'];
    } else {
        echo "Complaint not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Handle form submission to update the complaint
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $apartment_name = trim($_POST['apartment_name']);
    $apartment_location = trim($_POST['apartment_location']);
    $apartment_number = trim($_POST['apartment_number']);
    $contact_number = trim($_POST['contact_number']);
    $issues = trim($_POST['issues']);

    // Update the complaint in the database
    $sql = "UPDATE complaints SET name='$name', email='$email', apartment_name='$apartment_name', apartment_location='$apartment_location', apartment_number='$apartment_number', contact_number='$contact_number', issues='$issues' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Complaint updated successfully.');
                window.location.href = 'view_complaint.php';
              </script>";
    } else {
        echo "Error updating complaint: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Complaint</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>

<h2>Edit Complaint</h2>

<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>

    <label for="apartment_name">Apartment Name:</label>
    <input type="text" id="apartment_name" name="apartment_name" value="<?php echo $apartment_name; ?>" required><br>

    <label for="apartment_location">Apartment Location:</label>
    <input type="text" id="apartment_location" name="apartment_location" value="<?php echo $apartment_location; ?>" required><br>

    <label for="apartment_number">Apartment Number:</label>
    <input type="number" id="apartment_number" name="apartment_number" value="<?php echo $apartment_number; ?>" required><br>

    <label for="contact_number">Contact Number:</label>
    <input type="number" id="contact_number" name="contact_number" value="<?php echo $contact_number; ?>" required><br>

    <label for="issues">Issues:</label>
    <textarea id="issues" name="issues" rows="4" required><?php echo $issues; ?></textarea><br>

    <button type="submit">Update Complaint</button>
</form>

</body>
</html>
