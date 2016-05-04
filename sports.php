<?php
	include ("connectDb.php");
	$query = "SELECT * FROM `products` WHERE `category` = 'sports' ";
	$res = mysql_query($query);

	echo "<!DOCTYPE html>";
	echo "<!-- Website template by freewebsitetemplates.com -->";
	echo "<html>";
		echo "<head>";
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
			echo "<title>paYYop- Sports</title>";
			echo '<link rel="stylesheet" href="css/style.css" type="text/css" />';
			echo "<!--[if IE 6]>";
				echo '<link rel="stylesheet" href="css/ie6.css" type="text/css" />';
			echo "<![endif]-->";
			echo "<!--[if IE 7]>";
				echo '<link rel="stylesheet" href="css/ie7.css" type="text/css" />';
			echo "<![endif]-->";
		echo "</head>";
		echo '<body>';
			echo '<div class="header">';
				echo "<div>";
					echo '<a href="index.html" id="logo"><img src="images/logo.gif" alt="logo"/></a>';
					echo '<div class="navigation">';
						echo '<ul class="first">';
							echo  '<li class="first"><a href="jewelry.html">ON SALE</a></li>';
							echo '<li><a href="accessories.html">BEST SELLERS</a></li>';
						echo '</ul>';
						echo '<ul>';
							echo '<li><a href="about.html">About us</a></li>';
							echo '<li><a href="#">Login</a></li>';
						echo "</ul>";
					echo "</div>";
						echo '<form action="" class="search">';
							echo '<input type="text" value="search" onblur="this.value=!this.value?\'search\':this.value;" onfocus="this.select()" onclick="this.value=\'\';"/>';
							echo '<input type="submit" id="submit" value=""/>';
						echo '</form>';
					echo '</div>';
					echo '<div id="navigation">';
						echo '<ul>';
							echo '<li><a href="index.html">Home</a></li>';
							echo '<!-- <li><a href="new_arrival.html">New Arrivals</a></li> -->;';
							echo '<li><a href="concerts.php">Concerts</a></li>';
							echo '<li><a href="health.php">Health and Fitness</a></li>';
							echo '<li class="selected"><a href="sports.php">Sports</a></li>';
							echo '<li><a href="outdoor.php">Outdoor Adventure</a></li>';
							echo '<li><a href="media.php">Media</a></li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			echo '<div class="body">';
					echo '<div class="sidebar">
						<div class="first">
							<h2><a href="#">Categories</a></h2>
							<ul>
								<li><a href="#">Baseball</a></li>
								<li><a href="#">Basketball</a></li>
								<li><a href="#">Football</a></li>
								<li><a href="#">Hockey</a></li>
								<li><a href="#">Skating</a></li>
								<li><a href="#">Soccer</a></li>
							</ul>
						</div>
						<div>
							<h2><a href="#">Recommended</a></h2>
						</div>
						<div>
							<h2><a href="#">Popular</a></h2>
						</div>
					</div>';
				echo '<div class="content">' ;
					echo '<div class="figure">';
						echo '<img src="images/sportsbig.png" alt=""/>';
					echo "</div>";
					echo '<div class="products">';
						echo '<div class="paging">';
							echo '<div class="first">';
								echo '<!-- <h2>New Arrival</h2> -->';
								echo '<span>Show</span>';
								echo '<ul>';
									echo '<li class="selected"><a href="#">8</a></li>';
									echo '<li><a href="#">10</a></li>';
									echo '<li><a href="#">25</a></li>';
									echo '<li><a href="#">50</a></li>';
								echo "</ul>";
							echo "</div>";
							echo "<div>";
								echo "<ul>";
									echo '<li class="selected"><a href="#">1</a></li>';
									echo '<li><a href="#">2</a></li>';
									echo '<li><a href="#">3</a></li>';
									echo '<li><a href="#">4</a></li>';
									echo '<li><a href="#">5</a></li>';
									echo '<li><a href="#">6</a></li>';
									echo '<li><a href="#">7</a></li>';
									echo '<li><a href="#">8</a></li>';
									echo '<li>...</li>';
									echo '<li><a href="#">34</a></li>';							
								echo "</ul>";
								echo '<a href="#">next</a>';
							echo "</div>";
						echo "</div>";

						if(mysql_num_rows($res)!=0) {
							$rows = 0;
							echo "<u1>";
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
        							echo "</u1>";
        							echo "<u1>";
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

    						echo "</u1>";
						}
					
					echo "</div>";
				echo "</div>";
				echo '<div class="article">';
					echo '<div class="first">';
						echo "<h3>Welcome to paYYop!</h3>";
						echo "<p>This is a site where you can paYYop - pay your own price!</p>";
					echo "</div>";
					echo '<div class="connect">';
						echo "<h2>Follow us</h2>";
						echo '<a href="http://facebook.com/freewebsitetemplates" id="facebook">Facebook</a>';
						echo '<a href="http://twitter.com/fwtemplates" id="twitter">Twitter</a>';
						echo '<a href="#" id="comments">Comments</a>';
						echo '<a href="http://www.flickr.com/freewebsitetemplates/" id="flickr">Flickr</a>';
					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo '<div class="footer">';
				echo "<p>&#169; 2016 paYYop. All Rights Reserved.</p>";
			echo '</div>';
		echo "</body>";
	echo "</html>";