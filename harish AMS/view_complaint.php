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

// Fetch all complaints from the database
$sql = "SELECT id, name, email, apartment_name, apartment_location, apartment_number, contact_number, issues FROM complaints";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="view.css">
    <title>View Complaints</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Users Complaint List</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Apartment Name</th>
        <th>Apartment Location</th>
        <th>Apartment Number</th>
        <th>Contact Number</th>
        <th>Issues</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['apartment_name'] . "</td>
                    <td>" . $row['apartment_location'] . "</td>
                    <td>" . $row['apartment_number'] . "</td>
                    <td>" . $row['contact_number'] . "</td>
                    <td>" . $row['issues'] . "</td>
                    <td>
                        <a href='edit_complaint.php?id=" . $row['id'] . "'>Edit</a> |
                        <a href='delete_complaint.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this complaint?');\">Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No complaints found.</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>
