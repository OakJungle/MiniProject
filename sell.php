<html>
<body>
<form method="get" action="bill.php">
<input type="text" value="sell" name="type" style="display: none;">
<table id="item-menu">
  <tr>
      <td>Item name:</td>
      <td>Item Quantity:</td>
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

$sql = "SELECT item, quantity, price FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td><input type='checkbox' id='item' name='item[]' value=$row[item]>$row[item]</td>
    <td><input type=number id='quantity' name='quantity[]' min=1 max=$row[quantity]></td>
    <td><p value=$row[price]>$row[price]</td></tr>";
  }
} else {
  echo "No items";
}
?>
<!--  <tr>  
  	<td>total: </td>
  	<td><p id="total"></p>
  </tr> -->
  <tr>
  <td colspan="3"><input type="submit" value="buy"name="submit"></td>
  </tr>
</table>
</form>
</body>
</html>
