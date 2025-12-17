<?php
session_start();
include 'db_connection.php'; // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the user
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password (assuming it's hashed)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Invalid email or password!";
    }
}
?>
