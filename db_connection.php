<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Default for XAMPP
$password = ""; // Default is empty for XAMPP
$dbname = "inventory_system"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
