<html>
<head>
<title>Purchase Deletion</title>
</head>
<body>

<?php
      //get variables
      $name = $_POST["name"];
      $pass = $_POST["pass"];
      $username = $_POST["username"];

      include ("readUsers.php");

      //get variables from readRideDB.php
      include ("readPurchases.php");

      function success($purchases, $username, $pass) {
            if ($purchases == 1) {
      		     echo ' <br> <font color="#00FF00"> Event Deleted! </font> '; 
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
      //remove event now
      if ($foundUser == 0) {
            echo "<center>User not found, please register or login. Redirecting you to Registration. <br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=newMember.html">';
      }
      else if ($foundPurchase == 0) {
            echo "<center>Event not found, redirecting you to login page. <br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=login.php">';
      }
      else {
            echo "Deleting Event " . $event;
            include ("connectDb.php");
            $sql = "DELETE FROM purchases WHERE id = '$username . $name'";
      	
            success(mysql_query($sql), $email, $pass);
      }
 ?>

