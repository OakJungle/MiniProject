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

$item=$_POST['item'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
if(!$item){
die("Enter Item Name");
}
if(!$price){
die("Enter Item Price");
}
if(!$quantity){
die("Enter Item Quantity");
}

$result = $conn->query("SELECT item FROM menu WHERE item='$item'");
$row = $result->fetch_assoc();
$is_item=(bool)$row;
if($is_item){
  $update_query = "UPDATE menu set quantity=quantity+$quantity, price=$price where item='$item'";

  if ($conn->query($update_query) === TRUE) {
    echo "Updated Item in Stock";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
$add_query = "INSERT INTO menu values('$item', $quantity, $price)";

if ($conn->query($add_query) === TRUE) {
  echo "Added Item to Stock";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<br><input type="button" value="Back" onclick="window.location.href = 'index.html';">

