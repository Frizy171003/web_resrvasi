<?php
$host = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$db_name = "web_uas"; // Your database name

// Create a connection
$conn = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
