<?php
      // Connecting database
      include ("connectDb.php");

      // Here is another way of making an SQL query.
      $sqlt = "SELECT * FROM purchases WHERE username = '$username'";

      // Again, Send the request
      $purchases = mysql_query($sqlt);

      // See if we get an OK result
      if (!$purchases) {
            die('SQL Error Getting Event Information: ' . mysql_error());
      }
      else {
            $foundPurchase = number_format(mysql_num_rows($purchases));
            $rowPurchase = mysql_fetch_array($purchases);
      }
      mysql_close($conn);
?>
