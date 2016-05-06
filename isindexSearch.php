<?php  // Use the <?php command so the server realizes this is PHP code and not HTML

     // Set the variable $q equal to whatever follows the "?query=" in the URL
     $q = $_GET["query"];

     if (!$q){  // If the "query" line is blank, display the search page

         // The following echo commands generate standard HTML output for the browser to view.
         echo "<!DOCTYPE html>";
         echo "<html>";
         echo "<head>";
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
      echo "<title> Empty fields </title>";
      echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
         echo '<style';
         echo "h1 {
                text-align: center;
                font-family: 'Trebuchet MS', Helvetica, sans-serif;
                font-size: 96px;
         }";
         echo "h2 {
                text-align: center;
                font-family: 'Trebuchet MS', Helvetica, sans-serif;
                font-size: 48px;
         }";
         echo '</style>';
         echo "</head>";
         echo "<TITLE>Payyop!</TITLE>";
         echo '<body>';
      echo '<div class="header">
			<div>
				<a href="index.html" id="logo"><img src="images/logo.gif" alt="logo"/></a>
				<div class="navigation">
					<ul class="first">
						<li class="first"><a href="nearby.html">Nearby Events</a></li>
						<li><a href="about.html">About us</a></li>
					</ul>
					<ul>
						<li><a href="newUser.html">Register</a></li>
						<li><a href="isindexSearch.php">Login</a></li>
					</ul>
				</div>
				<form action="" class="search">
					<input type="text" value="search" onblur="this.value=!this.value?\'search\':this.value;" onfocus="this.select()" onclick="this.value=\'\';"/>
					<input type="submit" id="submit" value=""/>
				</form>
			</div>
    <center>';
         echo '<table border="0" width="700" >';
         echo '<tr>';

         echo ' <td>Join <I>Payyop</I> and Start Paying the Fair Price Today! <br> <a href="newUser.html"><B> Register </B></a></td>';
         echo ' <td ALIGN=RIGHT>Already a Member? Sign In: </td>';
         echo '</tr> <tr>';

         echo '<td>  </td>';

         echo '<td ALIGN=RIGHT> <FORM action="login.php" method="post">';
         echo '<P>';
         echo '<LABEL for="email">Username:&nbsp &nbsp </LABEL>
              <INPUT type="text" name="username"><BR>';
         echo '<LABEL for="pass">Password: </LABEL>
              <INPUT type="password" name="pass"><BR>';

         echo '<INPUT type="submit" value="Sign In"> ';
         echo ' </P>';
         echo '</FORM>';
         echo ' </td> </tr> </table>';
         
         echo "<br>";
         
         echo "<h1>Welcome to Pay Your Own Price!</h1><br>";
         echo "<img src=\"newlogo.jpg\"> <br><br>";   // adding a picture
         echo "<h2>Search nearby events (demo): </h2><br>";
         echo '<BODY BGCOLOR="white" TEXT = "black">';   // setting background color

         // Notice the creation of a form in HTML.

         // <form action= ""> tells says which page to send the results of the form to.
         // <input type="text"> denotes a text input, the name="query" part
         echo '<form action="isindexSearch.php" method="get">';
         echo '<input type="text" name="query" />';
         echo '<input type="submit" />';
         echo '</form>';      // End the Form

         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";

         echo '<hr>';
         echo ' &copy Jackey Liu, Jennifer Yin, & Jenny Peng';
         echo "<br>";

         echo ' <font size = 1> This is a demo </font>';

        echo '</center>';
         // Closing HTML
         echo "</BODY>";
         echo "</HTML>";

     }  else { // In this case, else means that there was some kind of data passed to the PHP script in the URL

        // Code to deal with an instance of the URL where a ?query= is passed

        // Output the HTML header
        echo "<HTML>";

        echo "<TITLE> ORF 401: Lab #2 - PHP - Search Results for " . $q . " </TITLE>";
        echo '<BODY BGCOLOR="white" TEXT = "black">';

        echo '<center>';
        echo "<br>";
        echo '<IMG src ="newlogo.jpg", ALIGN = middle>';
        echo "<br>";


        // Connecting database
        include ("connectDb.php");

        $q1 = '%, '. $q;
        $sqlt = "SELECT * FROM products";
        $result = mysql_query($sqlt);

        // See if we get an OK result
        if (!$result) {
            die('SQL Error Getting User Information: ' . mysql_error());
        }  else
	    $found = number_format(mysql_num_rows($result));

        echo "Searching for " . $q . "! <br>";

        if ($found>0) {
            echo "<H3>How about?</H3>";
            echo "<CENTER> <TABLE BGCOLOR=white BORDER=1 CELLSPACING=2 CELLPADDING=4 WIDTH=60%>";
            echo "<TR BGCOLOR=white>";
            echo "<TH>Event</TH>";
            echo "<TH>Category</TH>";
            echo "<TH>Event Vendor</TH>";
            echo "<TH>Current Price/TH>";
            echo "<TH>Lowest Price/TH>";
            echo "<TH>Tickets Sold</TH>";
            echo "<TH>Tickets Left</TH>";
            echo "</TR>";

            while($row=mysql_fetch_array($result)) {
                 echo "<TR>";
                 echo "<TD ALIGN=CENTER> ".$row["name"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["vendor"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["category"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["price1"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["price2"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["quant1"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["quant2"]." </TD>";
                 echo "</TR>";
            }
            echo "</TABLE></CENTER>";
            echo "<H3>Thanks for using <EM>Payyop</EM>!</H3></P>";
        } else
            echo "<H3>No nearby events found. Search again?</H3>";
            
         echo "Didn't find what you were looking for? Try again:<br>";

         echo '<form action="isindexSearch.php" method="get">';
         echo '<input type="text" name="query" />';
         echo '<input type="submit"  value="Search" />';
         echo '<br><br> <a href="isindexSearch.php"> Return to Homepage </a> <br>';
         echo '</form>';      // End the Form
         echo "<br>";
         echo '<hr>';
         echo ' &copy Jackey Liu, Jennifer Yin, & Jenny Peng';
         echo "<br>";

         echo ' <font size = 1> Sharing rides, less congestion </font>';
         echo '</center>';
         echo "<br>";
     	 echo "</BODY>";
         echo "</HTML>";
     }
     




