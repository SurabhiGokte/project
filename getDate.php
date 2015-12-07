<?php
	session_start();
	$mid = $_GET['q'];
	include("info.inc.php");
	$today = date("Y-m-d");
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
			echo "<td>Select Date</td>
				<td><select name='date' onchange='showTime(this.value)'>";
				$query = mysqli_query($dbconn,"SELECT show_date FROM show_time where movie_id='$mid' and show_date>='$today'");
				echo "<option>Select Date</option>";
				while($row = mysqli_fetch_array($query)){
					$sdate = $row['show_date'];
					echo "<option>$sdate</option>";
					//$_SESSION['sdate'] = $sdate;
				}
				echo "</select></td>";
			}
			
	mysqli_close($dbconn);
	}		
?>	

			
