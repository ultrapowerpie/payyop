<?php

      // Connecting database
      include ("connectDb.php");

      // Here is another way of making an SQL query.
      $sqlt = "SELECT * FROM users WHERE username = '$username'";

      // Again, Send the request
      $result = mysql_query($sqlt);

      // See if we get an OK result
      if (!$result) {
          die('SQL Error Getting User Information: ' . mysql_error());
      }
      else {
	     $foundUser = number_format(mysql_num_rows($result));
	     $rowUser = mysql_fetch_array($result);
	     $passdB = $rowUser["pass"];    //find password
      }

?>
