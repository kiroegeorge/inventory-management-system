<?php
session_start();
include 'db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Both fields are required.";
        exit();
    }

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $db_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
