<?php
include 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Check if the user exists
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;

            // Add this line to set a success message in the session
            $_SESSION['success_message'] = "Login successful! Redirecting...";


            header("Location: comp.php"); // Redirect to the dashboard or a secure page
            exit();
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "No account found with that email.";
    }

    

    $stmt->close();
}

// Check for success message to display
if (isset($_SESSION['success_message'])) {
    echo "<script>showPopup('" . $_SESSION['success_message'] . "', 'success');</script>";
    unset($_SESSION['success_message']); // Clear the message after showing it
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta HTTP-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>AMS - LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>


    


<div class="head">
        <div>
            <h1>AMS Organization</h1>

        </div>
    </div>
    <div class="login-wrapper">
        <form method="POST" action="">

            <h2>Login</h2>

            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            

            <div class="input-box">
                <input type="email" name="Email" required>
                <label for="">Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="Password" required>
                <label for="">Password</label>
                <img src="passhide.png" onclick="togglePassword()" class="pass-icon" id="pass-icon">
            </div>
            <div class="remember-forget">
        
        <a href="#">Forget password?</a>
    </div>
    <button type="submit" class="btn">Login</button>
    <div class="register-link">
        <p>Don't have an account? <a href="registration.php">Register</a></p>
    </div>

    
        </form>
    </div>

     <script type="text/javascript" src="login.js"></script> 
</body>
</html>
