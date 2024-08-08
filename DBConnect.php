<!-- making DB connection -->
<?php
// config.php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "blist";

// Create a connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
