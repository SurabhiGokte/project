<?php

	include("info.inc.php");

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$address = $_POST['address'];

	$dbconn = mysql_connect($hostname,$username,$password);
	if(!$dbconn){
		die("Could not connect to the database : ".mysql_error());
	}
	else{
		$dbselect = mysql_select_db($dbname,$dbconn);
		if(!$dbselect){
			die("Could not select the database : ".mysql_error());
		}
		else{
			$query = "INSERT into user values(NULL,'$fname','$lname','$email','$dob','$gender','$address','$password1')";
			if(mysql_query($query)){
				echo "You have been successfully registered!<br><br>";
				echo "<a href='user_login.php'>Proceed to Login</a>";
			}
		}
	mysql_close($dbconn);
	}
?>
