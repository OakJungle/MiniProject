<?php
// phpinfo();
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "canten";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT item FROM menu WHERE item='apple'");
$row = $result->fetch_assoc();
echo (bool)$row;
echo "<br>".json_encode($row);
?>