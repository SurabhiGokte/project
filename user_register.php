<!DOCTYPE html>
<html>
	<head>
		<title>User Registration</title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<form action="db_conn.php" method="post">
			<center><header>USER REGISTRATION FORM</header>
			<br><br><br>
			<font color=red>All fields are required</font><br><br>
			<table border="0">
				<tr><th>FIRST NAME</th><td><input type="text" name="fname" pattern="[a-zA-Z]+" required></td></tr>
				<tr><th>LAST NAME</th><td><input type="text" name="lname" pattern="[a-zA-Z]+" required></td></tr>
				<tr><th>DATE OF BIRTH</th><td><input type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" name="dob" required placeholder="Please follow format yyyy-mm-dd"></td></tr>
				<tr><th>GENDER</th><td><input type="text" name="gender" pattern="[a-zA-Z]+" required></td></tr>
				<tr><th>E-MAIL</th><td><input type="email" name="email" required placeholder="Enter a valid email address"></td></tr>
				<tr><th>PASSWORD</th><td><input type="password" name="password1" required></td></tr>
				<!--<tr><th>CONFIRM NEW PASSWORD</th><td><input type="password" name="password2" required></td></tr>-->
				<tr><th>ADDRESS</th><td><input type="text" name="address" required></td></tr>
				</table><br><br>
				<input value="Register" type="submit">&nbsp;&nbsp;<input value="Cancel" type="reset"><br><br>
				<a href="user_login.php">Login as a user</a>
		</form>
	<body>
</html>
<?php
	
/*	if($_POST['password1'] != $_POST['password2']){
		echo "alert(Passwords does not match!)";
	}*/
?>
