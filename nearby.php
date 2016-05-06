<?php include("header.php"); ?>		

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
<div class="body">
	<div class="content">
		<div class="figure">
			<div id="map"></div>
			<script>

      // If youre addng a number of markers, you may want to drop them on the map
      // consecutively rather than all at once. This example shows how to use
      // window.setTimeout()i to space your markers animation.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;

      var neighborhoods = [
      {lat: 40.3573, lng: -74.6672},
      {lat: 40.2473, lng: -74.4672},
      {lat: 40.4173, lng: -74.6372},
      {lat: 40.2773, lng: -74.5572},
      {lat: 40.4073, lng: -74.5072},
      {lat: 40.3673, lng: -74.7372},
      {lat: 40.3973, lng: -74.4372},
      {lat: 40.3073, lng: -74.7472}
      ];

      var markers = [];
      var map;

      function initMap() {	
      	map = new google.maps.Map(document.getElementById('map'), {
      		zoom: 10,
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
</div>
<div class="products">
	<ul>
		<li class="first">
			<a href="sports.html"><img src="images/Event1.png" alt=""/></a>
			<h4>Event A</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="outdoor.html"><img src="images/Event2.png" alt=""/></a>
			<h4>Event B</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="media.html"><img src="images/Event3.png" alt=""/></a>
			<h4>Event C</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="concerts.html"><img src="images/Event4.png" alt=""/></a>
			<h4>Event D</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
	</ul>
	<ul>
		<li class="first">
			<a href="sports.html"><img src="images/Event1.png" alt=""/></a>
			<h4>Event E</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="outdoor.html"><img src="images/Event2.png" alt=""/></a>
			<h4>Event B</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="media.html"><img src="images/Event3.png" alt=""/></a>
			<h4>Event C</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
		<li>
			<a href="concerts.html"><img src="images/Event4.png" alt=""/></a>
			<h4>Event D</h4>
			<p>dolor sit amet</p>
			<span>US$28.00</span>
		</li>
	</ul>
</div>
</div>

<?php include("footer.php") ?>