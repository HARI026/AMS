<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $age = $_POST['Age'];

    // Validate form fields
    if (empty($username) || empty($email) || empty($password) || empty($age)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (!is_numeric($age) || $age <= 0) {
        $error_message = "Please enter a valid age.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, age) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $email, $hashed_password, $age);

        if ($stmt->execute()) {
        
          echo "<script>
                alert('Registered successfully!');
                window.location.href = 'login.php';
              </script>";
        exit();
         


    } else {
        echo "<script>alert('Please fill the all fields are correct. Please try again.');</script>";
    }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta HTTP-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>AMS - SIGNUP</title>
    <link rel="stylesheet" href="registration.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="img-box">
        <img src="people.png" class="back-img">
    </div>

    <div class="head2">
        <div>
            <h1>AMS Organization</h1>
            <h3>Home Sweet Home</h3>
        </div>
    <!-- The rest of the HTML content from your signup form goes here -->
    <div class="signup-wrapper" id="Login">
        <form action="" method="POST">
            <h2>Sign Up</h2>

           

            <!-- Input fields for username, email, password, and age -->
            <div class="input-box">
                <input type="text" name="Username" required>
                <label for="">Username</label>
            </div>
            <div class="input-box">
                <input type="email" name="Email" required>
                <label for="">Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="Password" id="password" required>
                <label for="">Password</label>
                <img src="passhide.png" onclick="togglePassword()" class="pass-icon" id="pass-icon">
            </div>
            <div class="input-box">
                <input type="text" name="Age" required>
                <label for="">Age</label>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox" required> <a href="T&C.php">I agree to terms & conditions</a></label>
            </div>
            <button type="Submit" class="btn">Submit</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

   <script type="text/javascript" src="registration.js"></script>
</body>
</html>
