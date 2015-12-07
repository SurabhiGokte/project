<?php
	include("info.inc.php");
	session_start();
	
	$email = $_POST['email'];
	$password1 = $_POST['password'];

	$dbconn = mysqli_connect($hostname,$username,$password);
	if(!$dbconn){
		die("Could not connect to the database : ".mysql_error());
	}
	else{
		$dbselect = mysqli_select_db($dbconn,$dbname);
			if(!$dbselect){
				die("Could not select the database : ".mysql_error());
			}
			else{
				$query = "SELECT * FROM user WHERE user_email='$email' and user_password='$password1'";
				if($query_run = mysqli_query($dbconn,$query)){
					while($row = mysqli_fetch_array($query_run)){
						$name = $row['user_fname'];
						$user_id = $row['user_id'];
						$_SESSION['user_id'] = $user_id;
						echo("<center><p>Welcome $name</p>");
					}
				}
			}
			mysqli_close($dbconn);
	}
?>
<html>
	<head>
		<title>User Page</title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<center>
		<a href="home_page.php">Home<a> | <a href="cities.php">Cities<a> | <a href="movies.php">Movies<a>
		<br><br>
		
		<form action="user_logout.php" method="post">
			<input type="submit" value="Logout">
		</form>
	</body>
</html>

