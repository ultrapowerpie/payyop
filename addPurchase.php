<?php
include ("header.php");
include ("readProducts.php");
include ("readPurchases.php");

$name = $_GET["eventname"];
$price = $_GET["price"];

if (empty($username)) {
  echo "<center>User not found, please register or login. Redirecting you to the Home Page. <br>";
  echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">';
}
else {
  echo "Adding Purchase " . $name;
  $sqlt = "SELECT * FROM products WHERE name = '$name'";
  $row = mysql_fetch_array(mysql_query($sqlt));
  $lat = $row["lat"];
  $lng = $row["lng"];

  $sql = "INSERT INTO purchases (productname, username, price, lat, lng) VALUES ('$name','$username', '$price', '$lat', '$lng')";

  if (mysql_query($sql)) {
   echo ' <br> <font color="#00FF00"> Congratulations, You Purchased a Ticket to ' .$name. ' for $' .$price. '! </font> '; 
   sleep(3);
   echo '<form id="autologin" action="account.php">';
   echo '</form>';
 }  
 else  {
  echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
}
}

include ("footer.php");
?>