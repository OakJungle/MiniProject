<?php
error_reporting(1);
ini_set('display_errors', 'On');
?>
<html>
<body>
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

$c=count($_GET['item']);
$item=$_GET['item'];
$quantity=array_filter($_GET['quantity']);
$total=0;
echo $quantity[2]."<br>";
for ($x = 0; $x < $c; $x++) {
  $price_raw=$conn->query("select price from menu where item='$item[$x]'");

  $price=$price_raw->fetch_assoc();
  echo "$item[$x] - $quantity[$x] - $price[price]<br>";
  $total+=$price[price]*$quantity[$x];
}
echo $total;
?> 
</body>
</html>
