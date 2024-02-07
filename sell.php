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
    body {
      background-image: url("https://images.slurrp.com/prodarticles/bmgl61rn2ge.webp?impolicy=slurrp-20210601&width=1200&height=900");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <link rel="stylesheet" href="style.css">
  <script>
    function update_total() {
    var table = document.getElementById("item-menu")
    var tprice = document.getElementById("total-price")
    var total = 0
    var tl = table.rows.length - 2
      for (var x = 1; x < tl; x = x + 1) {
        // console.log(table.rows[x].cells[2].getAttribute("price"));
        var price = table.rows[x].cells[2].getAttribute("price")
        var qty = table.rows[x].cells[1].firstChild.value
        if (qty) {
          total += price * qty;
        }
      }
      tprice.innerHTML = total
    }
  function clear_form(){
    document.getElementById("sell-form").reset()
    document.getElementById("total-price").innerHTML=0
  }
  </script>
</head>

<body>
  <center>
    <form id="sell-form" method="get" action="bill.php">
      <input type="text" value="sell" name="type" style="display: none;">
      <table id="item-menu" class="input">
        <tr>
          <td style="">Item Name:</td>
          <td>Item Quantity:</td>
          <td>Price</td>
        </tr>
        <?php

while($row = $result->fetch_assoc()) {
  echo "<tr>
  <td>$row[item]</td>
  <td><input onchange='update_total()' onkeyup='update_total()' type=number id='quantity' name='quantity[$row[item]]' min=0 max=$row[quantity]></td>
  <td price=$row[price]>$row[price]</td></tr>";
}
?>
        <tr>
          <td>Total:</td>
          <td colspan="2">
            <p style="text-align: left;" id="total-price">0</p>
          </td>
        </tr>
        <td colspan="2"><input type="reset" onclick="clear_form();" value="clear">
          <input type="button" value="Back" onclick="window.location.href = 'index.html';">
        </td>
        <td><input type="submit" value="buy" name="submit"></td>
        </tr>
      </table>
    </form>
  </center>
</body>

</html>