<?php
// phpinfo();
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "canten";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM menu WHERE item='apb'");
if ($result->num_rows <= 0) {
echo "empty - $result->num_rows";
}
else{
    echo "exist - $result->num_rows";
}
?>