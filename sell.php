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
if ($result->num_rows <= 0) {
  die("<p>Stock is Empty</p>");
}
?>

<html>
<head>
  <style>
    body{
      background-image: url("https://images.slurrp.com/prodarticles/bmgl61rn2ge.webp?impolicy=slurrp-20210601&width=1200&height=900");
      background-repeat: no-repeat;
      background-size: cover;
    }
    </style>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<center >
<form method="get" action="bill.php">
<input type="text" value="sell" name="type" style="display: none;">
<table id="item-menu" class="input">
  <tr>
      <td style="">Item Name:</td>
      <td >Item Quantity:</td> 
      <td >Price</td>
  </tr>
<?php

while($row = $result->fetch_assoc()) {
  echo "<tr>
  <td>$row[item]</td>
  <td><input type=number id='quantity' name='quantity[$row[item]]' min=0 max=$row[quantity]></td>
  <td>$row[price]</td></tr>";
}
?>
  <tr>
  <td colspan="2"><input type="reset" value="clear">
  <input type="button" value="Back" onclick="window.location.href = 'index.html';"></td>
  <td><input type="submit" value="buy" name="submit"></td>
  </tr>
</table>
</form></center>
</body>
</html>
