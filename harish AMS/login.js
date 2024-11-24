// Function to toggle password visibility
function togglePassword() {
    const passwordInput = document.querySelector('input[name="Password"]'); // Select the password input
    const passIcon = document.getElementById('pass-icon'); // Select the password icon

    // Check the current type of the password input
    if (passwordInput.type === "password") {
        passwordInput.type = "text"; // Change type to text to show password
        passIcon.src = "passshow.png"; // Change icon to indicate password is visible (replace with your show icon)
    } else {
        passwordInput.type = "password"; // Change type back to password
        passIcon.src = "passhide.png"; // Change icon back to indicate password is hidden
    }
}

