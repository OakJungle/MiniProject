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

if($_POST["type"]=="add"){
$a=$_POST['item'];
$b=$_POST['quantity'];
$c=$_POST['price'];
$sql = "INSERT INTO menu values('$a', $b, $c)";

if ($conn->query($sql) === TRUE) {
  echo "Item Added";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

if ($_POST["type"]=="sell"){
$item=$_POST['item'];
$quantity=$_POST['quantity'];

$sql = "UPDATE menu SET quantity=quantity-$quantity WHERE item='$item'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}


