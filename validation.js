function validateLogin() {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    if (username === "") {
        alert("Please enter your username.");
        return false;
    }
    
    if (password === "") {
        alert("Please enter your password.");
        return false;
    }
    if (username.length < 6) {
        alert("Username must be at least 6 characters long.");
        return false; // Prevent form submission
    }
    
    // Check if the password has at least 6 characters
    if (password.length < 4) {
        alert("Password must be at least 4 characters long.");
        return false; // Prevent form submission
    }
    
    return true;
}
