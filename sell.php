<html>
<body>
<form method="post" action="bill.php">
<input type="text" value="sell" name="type" style="display: none;">
<table>
  <tr>
      <td>Item name:</td>
      <td>Quantity Item:</td>
      <td>Price</td>
  </tr>
  <tr>
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

$sql = "SELECT item, quantity, price FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td><input type='checkbox' name='item' value=$row[item]>$row[item]</td>
    <td><input type=number name=quantity min=1 max=$row[quantity]></td>
    <td>$row[price]</td></tr>";
  }
} else {
  echo "0 results";
}
?>

  </tr>
  <tr>  
  	<td>total: </td>
  	<td><p id="total"></p>
  </tr> 
  <tr>
  <td colspan="2"><input type="submit" name="submit"></td>
  </tr>
</table>
</form>
</body>
</html>
