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
<?php
$items=array_filter($_GET['quantity']);
if (!$items){
  die("No Items Selected");
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<table class="bill-table">
<tr>
<td>Item</td><td>Quantity</td><td>Unit Price</td><td>Total Price</td>
</tr>
<?php
$total=0;
foreach ($items as $item => $quantity) {
  $price_raw=$conn->query("select price from menu where item='$item'");

  $price=$price_raw->fetch_assoc();
  echo "<tr><td>$item</td><td>$quantity</td><td>$price[price]</td><td>".($price['price'])*(int)$quantity."</td></tr>";
  $total+=$price['price']*(int)$quantity;
  $conn->query("update menu set quantity=quantity-$quantity where item='$item'");
}
echo" <tr><td colspan=3>Total</td><td>$total</td></tr>";
?> 
</table>
</body>
</html>
