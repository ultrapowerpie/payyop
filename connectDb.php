<?php
       // Connect to the database for the entry of the CSV stuff into the database.
      $dbhost = 'localhost';
      $dbuser = 'jqpeng';     // CHANGE IT TO YOUR DATABASE USER NAME
      $dbpass = 'letsroll9596';            // CHANGE IT TO YOUR DATABASE PASSWORD
      $dbname = 'jqpeng_payyop';     // CHANGE IT TO YOUR DATABASE NAME
      
      $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

      mysql_select_db($dbname);
?>