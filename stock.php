<html>
<body>
</php
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "canten";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT * from menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "item: " . $row["item"]. "- Quantity: " . $row["quantity"]. "price: " . $row["price"]. "<br>";
  }
} else {
  echo "0 results";
}
?>
</body>
</html>
