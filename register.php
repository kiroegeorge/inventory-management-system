<?php
include 'db_connection.php'; // Make sure your database connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Check if data is being sent
    print_r($_POST); 
    die(); // Stop execution to inspect the output

    // Ensure that username and password are set
    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        die("Error: Missing form data. Make sure all fields are filled.");
    }

    $user = trim($_POST["username"]);
    $pass = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);

    // Insert into the database using prepared statements
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

