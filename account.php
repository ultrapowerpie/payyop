<?php
session_start();

$username = $_SESSION["username"];
$pass = $_SESSION["pass"];

include ("header.php");
include ("readPurchases.php");
?>

<div id="navigation">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="concerts.php">Concerts</a></li>
    <li><a href="health.php">Health and Fitness</a></li>
    <li><a href="sports.php">Sports</a></li>
    <li><a href="media.php">Media</a></li>
  </ul>
</div>
</div> 
<h1> Welcome Back! Here Are Your Events! </h1>

<center>
  <div class="body">
    <div id="map"></div>
    <script>
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;

      <?php
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
      ?>

      var centermap = [{lat: 40.3573, lng: -74.6672}];
      if (!neighborhoods[0]) centermap[0] = neighborhoods[0];

      var markers = [];
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: centermap[0]
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

</div>
</center>

<?php
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
 echo "<center> h3>You Don't Have Any Tickets Yet!</h3>";
}

?>
<br><br><center>

<form id="unsubscribe" action="deleteUser.php" method="post">
  <input type='hidden' name='username' value=$username />
  <input type='submit' onclick='return confirm(\'Are you sure you want to delete your account?\')' value='Unsubscribe'><br>
</form>

</center>

</div>

<?php include ("footer.php"); ?>