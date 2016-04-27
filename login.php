<?php
   $username = $_POST["username"];
   $pass = $_POST["pass"] ;

   if(!$username or !$pass){
      echo "<html>";
      echo '<head>';
      echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
      echo "<title> Empty fields </title>";
      echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
      echo '</head>';
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
            </div>
    <center>';
      echo "Empty Field. Please try again. Redirecting you back. ";
      echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
      echo '</body>';
      echo '</html>';
   } 
   else {
       include ("readUsers.php");
       include ("readPurchases.php");

       if($foundUser == 0){

          echo "<html>";
                echo "<html>";
          echo '<head>';
          echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
          echo' <title> User does not exist </title>';
          echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
          echo '</head>';
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
          echo ' User not found. Please try again. Redirecting you back. ';
          echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
          echo '</body>';
          echo ' </html>';

        } else {
              if($pass != $passdB){
                echo "<html>";
                echo '<head>';
          echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
          echo' <title> Incorrect Password </title>';
          echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
          echo '</head>';
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
                echo $passdB."Wrong password. Please try again. Redirecting you back. ". $pass;
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
                echo '</body>';
                echo ' </html>';

             } else {
              echo "<html>";
              echo " <title> Payyop Account - " .$rowUser[fName]. "'s profile. </title>";
echo '
      <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title> Your Account </title>
      <link rel="stylesheet" href="css/style.css" type="text/css" />
      <style>
      h1 {
        color: orange;
        text-align: center;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-size: 48px;
        }
      H3 {
        color: black;
        text-align: center;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-size: 24px;
        }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 80%;
        width: 80%;
      }
    </style>
    </head>
    
    <body>
    <div class="header">
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
     </div>
            <h1> Welcome Back! Here Are Your Events! </h1>
    <center>
    <div id="map"></div>
    <script>

      // If youre adding a number of markers, you may want to drop them on the map
      // consecutively rather than all at once. This example shows how to use
      // window.setTimeout() to space your markers animation.
';
echo "var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';";
echo 'var labelIndex = 0;

      var neighborhoods = [
        {lat: 40.3573, lng: -74.6672},
        {lat: 40.5073, lng: -74.4672},
        {lat: 40.4573, lng: -74.6372},
        {lat: 40.4773, lng: -74.5572},
        {lat: 40.3073, lng: -74.7472}
      ];

      var markers = [];
      var map;

      function initMap() {';
    echo "map = new google.maps.Map(document.getElementById('map'), {";
    echo 'zoom: 10,
          center: neighborhoods[0]
        });
        drop();
      }

      function drop() {
        clearMarkers();
        for (var i = 0; i < neighborhoods.length; i++) {
          addMarkerWithTimeout(neighborhoods[i], i * 500);
        }
      }

      function addMarkerWithTimeout(position, timeout) {
        window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
            label: labels[labelIndex++ % labels.length],
            animation: google.maps.Animation.DROP
          }));
        }, timeout);
      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTDzI0BjKvplKNjK1yBh-Cn-ViaeiyGUs&callback=initMap">
    </script>
    </center>
    ';
    
    if($foundPurchase !=0 ) {
              echo "<br>";

              echo "<CENTER> <TABLE BGCOLOR=white BORDER=1 CELLSPACING=2 CELLPADDING=4 WIDTH=60%>";
              echo "<TR BGCOLOR=white>";
              echo "<TH>Event Name</TH>";
              echo "<TH>Origin</TH>";
              echo "<TH>Destination</TH>";
              echo "<TH>Departure Date</TH>";
              echo "<TH>Departure Time</TH>";
              echo "<TH>Has Car</TH>";
              echo "<TH>Available Seats</TH>";
              echo "</TR>";
                      
                      
                      
                      // output data of each row
                      while($row = mysql_fetch_assoc($results)) {
                              echo "<TR>";
                              echo "<TD ALIGN=CENTER> ".$row["eName"]." </TD>";
                              //echo "<TD ALIGN=CENTER> ".$row["fName"]." </TD>";
                              //echo "<TD ALIGN=CENTER> ".$row["lName"]." </TD>";
                              echo "<TD ALIGN=CENTER> ".$row["Origin"]." </TD>";
                              echo "<TD ALIGN=CENTER> ".$row["Destination"]." </TD>";
                              echo "<TD ALIGN=CENTER> ".$row["dDate"]." </TD>";
                              echo "<TD ALIGN=CENTER> ".$row["dTime"]." </TD>";
                              if ($row["HasCar"] == 0){ echo "<TD ALIGN=CENTER> "."Yes". "</TD>"; }
                              else { echo "<TD ALIGN=CENTER> "."No"." </TD>"; }
                              echo "<TD ALIGN=CENTER> ".$row["Seats"]." </TD>";
                              echo "</TR>";
                      }
              echo "</TABLE></CENTER>";
              
             }
             else {
                 echo "<br><br>";
                 echo "<center> <H3>You Don't Have Any Tickets Yet!</H3>";
             }
              
              echo "<br><br>";
              echo "<center> <H3>Delete Events</H3>";
              
              echo "<form id='autologin' action='deletePurchase.php' method='post'>";
              echo "<input type='hidden' name='username' value=$username />";
              echo "<input type='hidden' name='pass' value=$pass />";
              
              echo "<br>Please enter the event you want to delete: <br>";
              echo "<table width = 300>";
              echo "<tr><td>Event Name:</td> <td> <input type='text' name='eName' /> </td></tr>";
              echo "</table>";
              
              echo "<br><input type='submit' value='Update'><br>";
              echo "</form>";
              echo "<br><br>";
              
              echo '<form id="unsubscribe" action="deleteUser.php" method="post">';
              echo "<input type='hidden' name='username' value=$username />";
              echo "<input type='submit' onclick='return confirm(\'Are you sure you want to delete your account?\')' value='Unsubscribe'><br>";
              echo '</form>';
              
              
              echo '<br> <a href="index.html"> Return to Homepage </a> <br>';

              echo "<br>";
              echo '<hr>';
              echo ' &copy Jackey Liu, Jennifer Yin, & Jenny Peng';
              echo "<br>";

              echo ' <font size = 1> This is just a demo</font>';
              echo '</center>';
              echo "<br>";
              echo "</body>";
              echo ' </html>';
           }
        }
   }

 ?>



