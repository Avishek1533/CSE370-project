<?php
$servername = "localhost"; // Or your database server host
$username = "root"; // Or your database username
$password = ""; // Or your database password
$dbname = "Moviedekhi"; // Your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// This line is optional, it's just to set the connection charset
$conn->set_charset("utf8");

// You can use $conn to interact with the database throughout the rest of the script
