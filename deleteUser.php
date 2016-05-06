<html>
<head>
  <title>Delete Payyop Account</title>
</head>

<?php
$username = $_POST["username"];
$pass = $_POST["pass"];

if(!$pass){
  echo "<center> Are you sure you wish to delete your Payyop account? You can reactivate your account by re-registering anytime.";
  echo "<center> Please confirm your password below:";
  echo '<FORM action="deleteUser.php" method="post">';
  echo '<P>';
  echo '<LABEL for="pass">Password: </LABEL><INPUT type="password" name="pass"><BR>';
  echo "<INPUT type='hidden' name='username' value=$username />";

  echo '<INPUT type="submit" value="Unsubscribe"> ';
  echo ' </P>';
  echo '</FORM>';
  echo '<br> <a href="account.php"> Return to your account</a> <br>';
  echo '<br> <a href="index.php"> Return to homepage</a> <br>';
  echo '</body> </html>';
}

else{
 include ("readUsers.php");

 if ($pass == $passdB) {
   include ("connectDb.php");

   $sql = "DELETE FROM users WHERE username = '$username'";
   mysql_query($sql);

   $result = mysql_query($sql);
   if (!result)
    echo ' <br> <font color="#FF0000"> <b><i> Something Went Wrong! Please try again. </b></i></font>';
  else
    echo '<font color="#00FF00"> Your Payyop Account Has Been Deleted. We hope you\'ll be back soon!. </font>';
  echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=logout.php">';
  echo '</html>';

  mysql_close($conn);
}

else {
 echo 'Password incorrect. Please try again. You will be redirected back to your account';
 sleep(3);
 echo '<form id="autologin" action="account.php" method="post">';
 echo '</form>';
 echo '</html>';
}
}

?>
