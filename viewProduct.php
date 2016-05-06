<?php
	include ("connectDb.php");
	$name = $_GET["eventname"];
	$query = "SELECT * FROM products WHERE name = '$name' ";
	$res = mysql_query($query);


	include ("header.php"); ?>

<div id="navigation">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="concerts.php">Concerts</a></li>
		<li><a href="health.php">Health and Fitness</a></li>
		<li><a href="sports.php">Sports</a></li>
		<li><a href="outdoor.php">Outdoor Adventure</a></li>
		<li><a href="media.php">Media</a></li>
		</ul>
		</div>
		</div>
		<div class="body">
		<div class="content">
		<div class="featured">

		<?php
		if (!$res) {
			die ('No matches found'. mysql_error());
		}
		else {
			$row = mysql_fetch_array($res);
			echo '
							<div class="content">
							<img src="images/'.$row["pic"].'" alt=""/> 
							<h3>'.$row["name"].'</h3>
							<p>'.$row["desc"].'</p>
							<p> '.$row["price1"].'</p>

							<!--Quantity: <form method="POST"> <select name = "quantityselect">
  							<option value="one">1</option>
  							<option value="two">2</option>
  							<option value="three">3</option>
  							<option value="four">4</option>
  							<option value="five">5</option>
  							<option value="six">6</option>
  							<option value="seven">7</option>
  							<option value="eight">8</option>
  							<option value="nine">9</option>
  							<option value="ten">10</option>
							</select> 
							</form> -->
							';



			$purchases = "SELECT * FROM purchases WHERE productname = '$name'";
			$res2 = mysql_query($purchases);

			$cumulative = 0;
			if ($res2){
				if(mysql_num_rows($res2)!=0) {
   					while($rowData = mysql_fetch_array($res)) {
   						$cumulative = $cumulative + $rowData["quantity"];
   					}
   				}
   			}

   			if($cumulative < $row["quant1"]) {
   				echo '<a href="addPurchase.php?eventname='.$row["name"].'&price='.$row["price1"].'" class="myButton">Commit to $'.$row["price1"].'</a>';
   			}
   			if ($cumulative < $row["quant2"]) {
   				echo '<a href="addPurchase.php?eventname='.$row["name"].'&price='.$row["price2"].'" class="myButton">Commit to $'.$row["price2"].'</a>';
   			}
		}?>



		</div>
		</div>
		</div>

	<?php include ("footer.php"); ?>