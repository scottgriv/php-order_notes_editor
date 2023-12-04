<?php

// Define your database credentials
$hostname = "localhost"; // or your server's IP address
$username = "root";      // your database username
$password = "";          // your database password
$dbname = "NotesApp"; // your database name

// Create a connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the connection when done
// $conn->close();

?>
