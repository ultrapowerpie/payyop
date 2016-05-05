<?php include ("header.php"); ?>


<div id="navigation">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="concerts.html">Concerts</a></li>
				<li><a href="health.html">Health and Fitness</a></li>
				<li><a href="sports.html">Sports</a></li>
				<li><a href="outdoor.html">Outdoor Adventure</a></li>
				<li class="selected"><a href="media.html">Media</a></li>
			</ul>
		</div>
	</div> 
	<div class="body">
		<div class="sidebar">
			<div class="first">
				<h2><a href="#">Categories</a></h2>
				<ul>
					<li><a href="#">Film Screenings</a></li>
					<li><a href="#">Online Classes</a></li>
					<li><a href="#">Comedy</a></li>
					<li><a href="#">Ballet</a></li>
					<li><a href="#">Circus</a></li>
				</ul>
			</div>
			<div>
				<h2><a href="#">Recommended</a></h2>
			</div>
			<div>
				<h2><a href="#">Popular</a></h2>
			</div>
		</div>
		<div class="content">
			<div class="figure">
				<img src="images/mediabig.png" alt=""/>
			</div>
			<div class="products">
				<div class="paging">
					<div class="first">
						<!-- <h2>Jewelry</h2> -->
						<span>Show</span>
						<ul>
							<li class="selected"><a href="#">8</a></li>
							<li><a href="#">10</a></li>
							<li><a href="#">25</a></li>
							<li><a href="#">50</a></li>
						</ul>
					</div>
					<div>
						<ul>
							<li class="selected"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li>...</li>
							<li><a href="#">34</a></li>							
						</ul>
						<a href="#">next</a>
					</div>
				</div>

						<?php
						include ("connectDb.php");
						$query = "SELECT * FROM `products` WHERE `category` = 'media' ";
						$res = mysql_query($query);

						if(mysql_num_rows($res)!=0) {
							$rows = 0;
							echo "<ul>";
   							while($rowData = mysql_fetch_array($res)) {
   								$vendor = $rowData["vendor"];
   								$name = $rowData["name"];
   								$time = $rowData["time"];
   								$pic = $rowData["pic"];
   								$price1 = $rowData["price1"];
   								$price2 = $rowData["price2"];
   								$quant1 = $rowData["quant1"];
   								$quant2 = $rowData["quant2"];

        						if($rows == 4) {
        							$rows = 1;
        							echo "</ul>";
        							echo "<ul>";
        							echo '<li class="first">';
										echo '<a href="viewProduct.php?eventname=' .$name. '"><img src=images/' .$pic. ' alt=""/></a>';
										echo '<h4>' .$name. '</h4>';
										echo '<p>'.$vendor. '</p>';
										echo '<span>'.$price1.'</span>';
									echo '</li>';
        						}
        						else {
        							$rows = $rows + 1;
        							echo '<li>';
										echo '<a href="viewProduct.php?eventname=' .$name. '"><img src=images/' .$pic. ' alt=""/></a>';
										echo '<h4>' .$name. '</h4>';
										echo '<p>'.$vendor. '</p>';
										echo '<span>'.$price1.'</span>';
									echo '</li>';
        						}


    						}

    						echo "</ul>";
						}
						?>
					
	</div>
	</div>
<?php include ("footer.php"); ?>