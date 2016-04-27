<html>
<head>
<title>Delete Payyop Account</title>
</head>

<?php

      //get variables
      $username = $_POST["username"];
      $pass = $_POST["pass"];

      if(!$pass){
          echo "<center> Are you sure you wish to leave The HandyRides Community?";
          echo "<center> Please confirm your password below:";
          echo '<FORM action="deleteUser.php" method="post">';
          echo '<P>';
          echo '<LABEL for="pass">Password: </LABEL><INPUT type="password" name="pass"><BR>';
          echo "<INPUT type='hidden' name='username' value=$username />";

          echo '<INPUT type="submit" value="Unsubscribe"> ';
          echo ' </P>';
          echo '</FORM>';
          echo '<br> <a href="isindexSearch.php"> Return to Homepage </a> <br>';
          echo '</body> </html>';
      }

      else{

           //get variables from readDB.php
           include ("readUsers.php");

	   if ($pass == $passdB) {
               include ("connectDb.php");

               $sql = "DELETE FROM users WHERE username = '$username'";
               mysql_query($sql);

               $result = mysql_query($sql);
               if (!result)
	           echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
               else
	           echo '<font color="#00FF00"> Your Payyop Account Has Been Deleted. We hope you will reconsider us in the future. </font>';
	       echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
	       echo '</html>';

               mysql_close($conn);
         }

	 else {
	      echo 'Password incorrect. Please try again. You will be redirected momentarily';
              sleep(3);
              echo '<form id="autologin" action="login.php" method="post">';
              echo "<input type='hidden' name='username' value=$username />";
              echo "<input type='hidden' name='pass' value=$passdB />";
              echo '</form>';
              echo '<script language="javascript">';
              echo 'document.getElementById("autologin").submit();';
              echo '</script>';
	      echo '</html>';
         }
      }

?>
