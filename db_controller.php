<?php
// DB connection info
$host = "localhost";
$username = "practice_user";
$password = "password123";
$database = "practice_db";

// Connect to database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>