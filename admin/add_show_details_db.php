<?php
	include ('info.inc.php');
	$movie_id=$_POST['mid'];
	$release_date=$_POST['dor'];
	$show_date=$_POST['shdate'];
	$show_time=$_POST['shtime'];
	$city_id=$_POST['cid'];
	$theatre_id=$_POST['tid'];
	$screen_id=$_POST['sid'];
	$show_price=$_POST['shprice'];
	

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
			if(!$show_date>$release_date){
			$query = "INSERT into show_time values(NULL,'$show_date','$show_time',			 $show_price,'$movie_id','$theatre_id','$city_id','$screen_id')";
				if(mysql_query($query)){
					echo "Show Details Added!<br><br>";
				
				}
				else
				{
					echo "Some error ".mysql_error();
				}
			}
			else{
				echo "Show date should be greater than release date";
			}
		}
	mysql_close($dbconn);
	}
?>

