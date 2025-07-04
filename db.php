<?php
session_start();

// Database connection settings
$servername = "localhost"; // Change if needed
$username = "root";        // Your database username
$password = "";            // Your database password (leave empty for default XAMPP setup)
$database = "jewellery-store";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set charset to UTF-8 (good practice)
$conn->set_charset("utf8");

?>
