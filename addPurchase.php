<html>
<head>
<title>Event Registration</title>
</head>
<body>

<?php
      //get variables
      $username = $_POST["username"];
      $pass = $_POST["pass"];
      $vendor = $_POST["vendor"];
      $name = $_POST["name"];
      $time = $_POST["time"];
      $lat = $_POST["lat"];
      $lng = $_POST["lng"];
      $category = $_POST["category"];
      $price = $_POST["price"];
      $quant = $_POST["quant"];

      include ("readPurchases.php");

      //get variables from readRideDB.php
      include ("readPurchases.php");

      function success($result2, $email, $pass) {
            if ($result2 == 1) {
      		     echo ' <br> <font color="#00FF00"> New Event Added! </font> '; 
                       sleep(3);
                       echo '<form id="autologin" action="login.php" method="post">';
                       echo "<input type='hidden' name='username' value=$username />";
                       echo "<input type='hidden' name='pass' value=$pass />";
                       echo '</form>';
                       echo '<script language="javascript">';
                       echo 'document.getElementById("autologin").submit();';
                       echo '</script>';
            }  
            else  {
                  echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
                  mysql_close($conn);
            }
      }

      //add event now
      if ($foundUser == 0) {
            echo "<center>User not found, please register or login. Redirecting you to Registration. <br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=newMember.html">';
      }
      else if ($foundEvent == 0) {
            echo "Adding Purchase " . $name;
            include ("connectDb.php");
            $sql = "INSERT INTO purchases (id, productname, username, quantity, price) VALUES ('$username . $name', $name','$username', '$quant', '$price')";
            success(mysql_query($sql), $username, $pass);
      }
      else {
            echo "Updating Event " . $event . " from " . $origin . " to " . $destination . " on " . $ddate;
            include ("connectDb.php");
            $sql = "DELETE FROM purchases WHERE id = '$username . $name'";
      	mysql_query($sql);
            $sql = "INSERT INTO purchases (id, productname, username, quantity, price) VALUES ('$username . $name', $name','$username', '$quant', '$price')";
            success(mysql_query($sql), $username, $pass);

 ?>

