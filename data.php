<?php
$host = 'localhost';
$dbname = 'registration_db';
$username = 'root';
$password = ''; // leave empty for XAMPP

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
