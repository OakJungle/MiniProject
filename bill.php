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
<style>
  body{
    text-align: center;
    background: radial-gradient(white, skyblue);
    /* background-repeat: no-repeat; */
    background-size: 100;
  
  }
.main{
    border-color: blue;
    border-style: solid;
    width: fit-content;
    padding-left: 5px;
    padding-right: 5px;

}
center{
  padding-bottom: 5px;
}
@media print {
  body {
    visibility: hidden;
  }
  .main {
    visibility: visible;
    position: absolute;
    left: 0;
    top: 0;
  }
</style>
</head>
<body><center>
  <div class="main">
<table border="1" class="bill-table">
<h3>CANTEEN</h3>
<h4>NEAR PERIYA BUS STOP<h4>
<tr>
<td>Item</td><td>Quantity</td><td>Unit Price</td><td>Total Price</td>
</tr>
<?php
$total=0;
foreach ($items as $item => $quantity) {
  $result_raw=$conn->query("select price, quantity from menu where item='$item'");

  $result=$result_raw->fetch_assoc();
  echo "<tr><td>$item</td><td>$quantity</td><td>$result[price]</td><td>".($result['price'])*(int)$quantity."</td></tr>";
  $total+=$result['price']*(int)$quantity;
  if (($result['quantity']-(int)$quantity)<=0){
    $conn->query("delete from menu where item='$item'");
  }
  else{
    $conn->query("update menu set quantity=quantity-$quantity where item='$item'");
  }
}
echo" <tr><td colspan=3>Total</td><td>$total</td></tr>";
?> 

</table>
<p>Thank you<br> Hope you Come Back Soon</p>
</center>
<div>
<button onclick="window.print()">Print this page</button>
<br><input type="button" value="Back" onclick="window.location.href = 'index.html';">
</body>
</html>
