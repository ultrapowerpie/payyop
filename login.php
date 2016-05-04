<?php
$username = $_POST["username"];
$pass = $_POST["pass"] ;


echo "<html>";
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
echo "<title> Your Account </title>";
echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';

if(!$username or !$pass){
  echo '</head><body>';
  echo '<div class="header">
  <center>';
    echo "Empty Field. Please try again. Redirecting you back. ";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.html">';
    echo '</body>';
    echo '</html>';
  } 
  else {
   include ("readUsers.php");

   if($foundUser == 0){

    echo '</head><body>';
    echo '<div class="header">
    <center>';
      echo ' User not found. Please try again. Redirecting you back. ';
      echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.html">';
      echo '</body>';
      echo ' </html>';

    } else {
      if($pass != $passdB){
        echo '</head><body>';
        echo '<div class="header">
        <center>';
          echo "Wrong password. Please try again. Redirecting you back. ";
          echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.html">';
          echo '</body>';
          echo ' </html>';

        } else {
         include ("readPurchases.php");
         echo '
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
          height: 70%;
          width: 70%;
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
    ';
    echo "var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';";
    echo 'var labelIndex = 0;';


    echo "var neighborhoods = [";

    $i = 1;
    if ($foundPurchase != 0) {
      while($row = mysql_fetch_assoc($purchases)) {
        if ($i < $foundPurchase) {
          echo "{lat: ".$row["lat"].", lng: ".$row["lng"]."},";
        }
        else {
          echo "{lat: ".$row["lat"].", lng: ".$row["lng"]."}";
        }
        $i++;
      }
    }
    mysql_close($conn);    

    echo "];";

    echo '

    var centermap = [];

    if (neighborhoods[0] == null) centermap = [{lat: 40.3573, lng: -74.6672}];
    else centermap = neigborhoods[0];

    var markers = [];
    var map;

    function initMap() {';
    echo "map = new google.maps.Map(document.getElementById('map'), {";
    echo 'zoom: 10,
    center: centermap[0];
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

include ("readPurchases.php");
if($foundPurchase !=0 ) {
  echo "<br>";

  echo "<CENTER> <TABLE BGCOLOR=white BORDER=1 CELLSPACING=2 CELLPADDING=4 WIDTH=60%>";
  echo "<TR BGCOLOR=white>";
  echo "<TH>Event Name</TH>";
  echo "<TH>Event id</TH>";
  echo "<TH>Price</TH>";
  echo "</TR>";
                      // output data of each row
  while($row = mysql_fetch_assoc($purchases)) {
    echo "<TR>";
    echo "<TD ALIGN=CENTER> ".$row["productname"]." </TD>";
    echo "<TD ALIGN=CENTER> ".$row["id"]." </TD>";
    echo "<TD ALIGN=CENTER> ".$row["price"]." </TD>";
    echo "</TR>";
  }
  mysql_close($conn);
  echo "</TABLE></CENTER>";
}
else {
 echo "<br><br>";
 echo "<center> <H3>You Don't Have Any Tickets Yet!</H3>";
}
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