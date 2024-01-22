<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "canten";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<hr>
<?php
$sql = "SELECT item, quantity, price FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "$row[item]-$row[price]-$row[quantity]<br>";
  }
} else {
  echo "0 results";
}
?>
</body>
</html>
