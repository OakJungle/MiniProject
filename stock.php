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

$sql = "SELECT * from menu";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
  die("<p>No Items in Stock</p>");
}
?>

<html>
<head>
  <link rel="stylesheet" href="style.css">
<style>
body{
  background-image: url("10099.jpg");
              background-repeat: no-repeat;
            background-size: cover;
}
</style>

</head>
<body>
<center>
<table border="1"class="bill-table">
<tr>
<td>Item</td><td>Quantity</td><td>Unti Price</td>
</tr>
<?php
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>$row[item]</td><td>$row[quantity]</td><td>$row[price]</td>";
  echo "</tr>";
}
?>
<table>
<br><input type="button" value="Back" onclick="window.location.href = 'index.html';">
</center>
</body>
</html>
