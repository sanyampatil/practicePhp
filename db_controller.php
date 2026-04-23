<?php
$host = "localhost";
$username = "practice_user";
$password = "password123";

// NO database here (important for init_db.php)
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>