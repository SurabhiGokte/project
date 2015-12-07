<?php
	include ('info.inc.php');
	$city_id=$_POST['city_id'];
	$theatre_name=$_POST['theatre_name'];
	$theatre_location=$_POST['theatre_location'];
	

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
		$query = "INSERT into theatre values(NULL,'$theatre_name','$theatre_location','$city_id')";
			if(mysql_query($query)){
				echo "Theatre Added!<br><br>";
				
			}
		}
	mysql_close($dbconn);
	}
?>
