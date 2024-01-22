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
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<table class="bill-table">
<tr>
<td>Item</td><td>Quantity</td><td>Unti Price</td>
</tr>
<?php
$sql = "SELECT * from menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>$row[item]</td><td>$row[quantity]</td><td>$row[price]</td>";
    echo "</tr>";
  }
} else {
  echo "0 Items";
}
?>
<table>
</body>
</html>
