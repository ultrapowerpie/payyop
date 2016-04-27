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
      $price1 = $_POST["price1"];
      $price2 = $_POST["price2"];
      $quant1 = $_POST["quant1"];
      $quant2 = $_POST["quant2"];

      //get variables from readDB.php
      include ("readProducts.php");

      //add users now
      if ($found != 0) {
            echo "<center>Event already exists. Please log-in. Redirecting you home<br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
      }	      
      if ($username && $pass && $email){
            echo "Adding Event " . $username;
            include       ("connectDb.php");
     		$sql = "INSERT INTO products (vendor, name, time, lat, lng, category, price1, price2, quant1, quant2) 
                 VALUES ('$vendor' ,'$name', '$time','$lat' ,'$lng', '$category','$price1','$price2','$quant1','$quant2')";

      	$result = mysql_query($sql);

            if ($result == 1){
                  echo ' <br> <font color="#00FF00"> New User Added! </font> '; 
                  sleep(3);
                  echo '<form id="autologin" action="login.php" method="post">';
                  echo "<input type='hidden' name='username' value=$username />";
                  echo "<input type='hidden' name='pass' value=$pass />";
                  echo '</form>';
                  echo '<script language="javascript">';
                  echo 'document.getElementById("autologin").submit();';
                  echo '</script>';
            } 
            else echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
            mysql_close($conn);      	
            } 
            else {
                  echo "<center>You didn't include all the required information. Please Try Again. Redirecting you to Registration. <br>";
                  echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=newMember.html">';
     	      }
 ?>

