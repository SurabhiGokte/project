<html>
	<head>
		<title>User Login</title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<form action="welcome_user.php" method="post">
			<center><header>USER LOGIN</header><br><br>
			Not a user yet? <a href="user_register.php">Register here</a>
			<br><br><br>
			<table border="0">
				<tr><th>E-MAIL</th><td><input type="email" name="email"></td></tr>
				<tr><th>PASSWORD</th><td><input type="password" name="password"></td></tr>
				</table><br><br>
				<input value="Login" type="submit">&nbsp;&nbsp;<input value="Cancel" type="reset"><br><br>
		</form>
	<body>
</html>
