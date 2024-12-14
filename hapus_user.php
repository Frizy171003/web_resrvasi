<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: flogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "web_uas";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to delete the user from the database
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);  // "i" is for integer data type
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redirect to the admin page or user list
        header("Location: admins.php");
        exit();
    } else {
        echo "Failed to delete user.";
    }

    $stmt->close();
} else {
    echo "No user ID provided.";
}

// Close the connection
$koneksi->close();
?>
