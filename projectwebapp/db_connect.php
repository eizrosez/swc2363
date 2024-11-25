<?php
$host = "localhost"; // Your database host
$user = "root"; // Your database username
$password = ""; // Your database password
$database = "mindful_pathway"; // Your database name

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
