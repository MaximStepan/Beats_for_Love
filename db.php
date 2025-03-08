<?php
$host = "localhost";
$username = "root";
$password = "xX060305";
$dbname = "beats";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>