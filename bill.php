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
<td>Item</td><td>Quantity</td><td>Price</td>
</tr>
<?php
$item=array_values($_GET['item']);
$c=count($item);
$quantity=array_values(array_filter($_GET['quantity']));
$total=0;
for ($x = 0; $x < $c; $x++) {
  $price_raw=$conn->query("select price from menu where item='$item[$x]'");

  $price=$price_raw->fetch_assoc();
  echo "<tr><td>$item[$x]</td><td>$quantity[$x]</td><td>$price[price]</td></tr>";
  $total+=$price['price']*(int)$quantity[$x];
  $conn->query("update menu set quantity=quantity-$quantity[$x] where item='$item[$x]'");
}
echo" <tr><td colspan=2>Total</td><td>$total</td></tr>";
?> 
</table>
</body>
</html>
