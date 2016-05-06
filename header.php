<?php

session_start();

echo '
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>paYYop</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
			var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
			];
			$( "#tags" ).autocomplete({
				source: availableTags
			});
		});
	</script>
</head>

<body>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/logo.gif" alt="logo" /></a>
			<div class="navigation">
				<ul class="first">
					<li class="first"><a href="nearby.php">Nearby Events</a></li>
					<li><a href="about.php">About us</a></li>
				</ul>
				<ul>';

					if (!empty($_SESSION["username"])) {
						$username = $_SESSION["username"];
						$pass = $_SESSION["pass"];

						echo '
						<li><a href="account.php">My Account</a></li>
						<li><a href="logout.php">Logout</a></li>';

					}
					else {
						echo '
						<li><a href="#popup2">Register</a></li>
						<li><a href="#popup1">Login</a></li>';
					}

					echo '</ul>
				</div>
				<form action="" class="search">
					<label for="tags">Search: </label>
					<input id="tags" viewProduct.php>
				</form>
			</div>';
			?>