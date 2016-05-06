<?php

echo '
<div id="popup1" class="overlay"> 
	<div class="popup">
		<h2>Please enter your login information</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">

			<script type ="text/javascript" src="checkLogin.js"></script>

			<form action="login.php" onsubmit = "return checkLogin()" method="post">
				<label for="username">Username</label>
				<input type="text" name="username">

				<label for="pass">Password</label>
				<input type="password" name="pass">

				<input type="submit" value="Sign In">
			</form>
		</div>
	</div>
</div>
<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Create your account</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">

		<script type ="text/javascript" src="checkRegister.js"></script>

			<form action="addUser.php" onsubmit = "return checkRegister()" method="post">
				<label for="username">Username</label>
				<input type="text" name="username">

				<label for="pass">Password</label>
				<input type="password" name="pass">

				<label for="email">Email</label>
				<input type="text" name="email">

				<input type="submit" value="Register">
			</form>
		</div>
	</div>
</div>
<div class="footer">
	<p>&#169 2016 paYYop. All Rights Reserved.</p>
</div>

</body>
</html>

';
?>