function togglePassword() {
    // Get the password input and the icon element
    const passwordInput = document.getElementById("password");
    const passIcon = document.getElementById("pass-icon");
    
    // Check the current type of the password input
    if (passwordInput.type === "password") {
        // If the input is of type "password", change it to "text" to show the password
        passwordInput.type = "text";
        // Change the icon image to indicate the password is visible (optional)
        passIcon.src = "passshow.png"; // Make sure this image exists
    } else {
        // If the input is of type "text", change it back to "password" to hide the password
        passwordInput.type = "password";
        // Change the icon image back to the original
        passIcon.src = "passhide.png";
    }
}
