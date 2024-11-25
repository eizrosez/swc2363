<?php
// db_connection.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mindful_pathway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
