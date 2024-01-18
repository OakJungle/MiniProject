<html>
<body>
<table border="1">
<tr>
<td>Item</td>
<td>Quantity</td>
<td>Price</td>
</tr>
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
$result = $conn->query("select * from menu");
$row = mysqli_fetch_all ($result);
?>

</body>
</html>