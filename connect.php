<?php
$servername = "127.0.0.1";  // Change to your server's hostname or IP
$username = "phpmyadmin";  // MySQL username
$password = "saw";  // MySQL password
$dbname = "shopping_app";  // MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
