<?php
include ("header.php");
      //get variables
      $username = $_SESSION["username"];
      $pass = $_SESSION["pass"];
      $name = $_GET["eventname"];
      $price = $_GET["price"];
      include ("readProducts.php");
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
                  //mysql_close($conn);
            }
      }
      //add event now
      if (empty($username)) {
            echo "<center>User not found, please register or login. Redirecting you to Registration. <br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=login.php">';
      }
      else {
            echo "Adding Purchase " . $name;
            $sql = "INSERT INTO purchases (productname, username, price) VALUES ('$name','$username', '$price')";
            success(mysql_query($sql), $username, $pass);
      }
include ("footer.php");
 ?>