<html>
<head>
<title>Your Trips</title>
</head>
<body>

<?php
      //get variables
      $origin = $_POST["Origin"];
      $destination = $_POST["Destination"];
      $ddate = $_POST["dDate"];
      $dtime = $_POST["dTime"];
      $hascar = $_POST["Hascar"];
      $seats = $_POST["Seats"];
      $email = $_POST["Email"];
      $ename = $_POST["eName"];
      $email = $_POST["Email"];
      $pass = $_POST["Pass"] ;
      
      include ("readRideDb.php");

      //update information now
      echo "Updating trip information now... ";

      include ("connectDb.php");

      if ($found1 == 1) { 
            $sql = "UPDATE events SET Origin= '$origin', Destination= '$destination', dDate= '$ddate', dTime= '$dtime', HasCar= '$hascar', Seats= '$seats' WHERE eName= '$eName' ";

            $result = mysql_query($sql);

            if ($result == 0){
      	    echo ' <br> <font color="#00FF00"> Trip updated! </font> ';
            sleep(3);
            echo '<form id="autologin" action="login.php" method="post">';
            echo "<input type='hidden' name='Email' value=$email />";
            echo "<input type='hidden' name='Pass' value=$passdB />";
            echo '</form>';
            echo '<script language="javascript">';
            echo 'document.getElementById("autologin").submit();';
            echo '</script>';
      }
      else {
            echo '<br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
      } 
      }else if ($ename && $origin && $destination && $ddate && $dtime) {

      	    	 echo "Adding Event " . $ename . " from " . $origin . " to " . $destination . " on " . $ddate . " at " . $dtime;

          		  include ("connectDb.php");
                       $sql = "INSERT INTO events (eName, Origin, Destination, dDate, dTime, HasCar, Seats, Email) VALUES ('$ename', '$origin', '$destination', '$ddate', '$dtime', '$hascar', '$seats', '$email')";

      		 $result = mysql_query($sql);

                 if ($result==1){
      		       echo ' <br> <font color="#00FF00"> New Event Added! </font> '; 
                       sleep(3);
                       echo '<form id="autologin" action="login.php" method="post">';
                       echo "<input type='hidden' name='Email' value=$email />";
                       echo "<input type='hidden' name='Pass' value=$pass />";
                       echo '</form>';
                       echo '<script language="javascript">';
                       echo 'document.getElementById("autologin").submit();';
                       echo '</script>';
                 } else {
       			echo '<br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
                 }
              } else {
      		echo '<br> <font color="#FF0000"> <b><i> Error. Please Complete All the Fields. </b></i></font>';
      }  

      mysql_close($conn);
 ?>

