<?php
	include ('info.inc.php');
	$movie_id=$_POST['movie_id'];
	$city_name=$_POST['city_name'];
	$city_state=$_POST['city_state'];
	

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
		$query = "INSERT into city values(NULL,'$city_name','$city_state','$movie_id')";
			if(mysql_query($query)){
				echo "City and State Added!<br><br>";
				
			}
		}
	mysql_close($dbconn);
	}
?>
