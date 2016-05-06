<?php
session_start();
$username = $_POST["username"];
$pass = $_POST["pass"] ;
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title> Your Account </title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />

  <?php
  include ("readUsers.php");

  if($foundUser == 0){
    echo '</head><body>';
    echo '<div class="header">
    <center>';
      echo ' User not found. Please try again. Redirecting you back. ';
      echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">';
      echo '</body>';
      echo ' </html>';
    } 
    else if($pass != $passdB){
      echo '</head><body>';
      echo '<div class="header">
      <center>';
        echo "Wrong password. Please try again. Redirecting you back. ";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">';
        echo '</body>';
        echo ' </html>';
      } 
      else {
        $_SESSION["username"] = $username;
        $_SESSION["pass"] = $pass;
        echo "
        <script>
          window.location = 'account.php';
        </script>
        ";
        exit;
      }

      ?>