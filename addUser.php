<html>
<head>
      <title>Registering...</title>
</head>
<body>

      <?php
      //get variables
      $username = $_POST["username"];
      $pass = $_POST["pass"];
      $email = $_POST["email"];

      //get variables from readDB.php
      include ("readUsers.php");

      //add users now
      if ($foundUser != 0) {
            echo "<center>User already exists. Please log-in. Redirecting you home<br>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">';
      }	      
      else {
            echo "Adding User " . $username;
            include ("connectDb.php");
            $sql = "INSERT INTO users (username, pass, email) VALUES ('$username' ,'$pass', '$email')";

            $result = mysql_query($sql);

            if ($result == 1){
                  session_start();
                  $_SESSION["username"] = $username;
                  $_SESSION["pass"] = $pass;
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
      ?>

