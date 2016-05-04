<?php
      // Connecting database
      include ("connectDb.php");

      // Here is another way of making an SQL query.
      $sqlt = "SELECT * FROM products WHERE name = '$productName'";

      // Again, Send the request
      $product = mysql_query($sqlt);

      // See if we get an OK result
      if (!$product) {
          die('SQL Error Getting Event Information: ' . mysql_error());
      }
      else {
	     $foundProduct = number_format(mysql_num_rows($product));
	     $rowProduct = mysql_fetch_array($product);
      }

?>
