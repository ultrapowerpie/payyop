<?php include ("header.php"); ?>

<div id="navigation">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li class="selected"><a href="concerts.php">Concerts</a></li>
		<li><a href="health.php">Health and Fitness</a></li>
		<li><a href="sports.php">Sports</a></li>
		<li><a href="media.php">Media</a></li>
	</ul>
</div>
</div> 
<div class="body">
	<div class="sidebar">
		<div class="first">
			<h2><a href="#">Categories</a></h2>
			<ul>
				<li><a href="#">Blues</a></li>
				<li><a href="#">Classical</a></li>
				<li><a href="#">Country</a></li>
				<li><a href="#">Electronic</a></li>
				<li><a href="#">Hip Hop</a></li>
				<li><a href="#">Jazz</a></li>
				<li><a href="#">Pop</a></li>
				<li><a href="#">R&B</a></li>
				<li><a href="#">Rock</a></li>
			</ul>
		</div>
	</div>
	<div class="content">
		<div class="figure">
			<img src="images/concertsbig.png" alt=""/>
		</div>
		<div class="products">

			<?php
			include ("connectDb.php");
			$query = "SELECT * FROM `products` WHERE `category` = 'concerts' ";
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
						echo '<p>'.$vendor.'</p>';
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