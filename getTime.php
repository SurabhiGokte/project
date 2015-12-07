<!--<?php
	session_start();
	$mid = $_GET['q'];
	//$sdate = $_SESSION['sdate'];
	include("info.inc.php");

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
			/*echo "<td>Select Time</td>
				<td><select name='time'>";
				echo "<option>Select Time</option>";
				$query = mysqli_query($dbconn,"SELECT show_time FROM show_time where movie_id='$mid'");
				while($row = mysqli_fetch_array($query)){
					$stime = $row['show_time'];
					echo "<option>$stime</option>";
				}
				echo "</select></td>";*/
			}
			
	mysqli_close($dbconn);
	}		
?>-->	
<html>
	<form>
		<table border=0>
		<tr><td>Select Date</td>
		<td><input type=radio name=time value='9:00'>9:00
		<input type=radio name=time value='12:00'>12:00
		<input type=radio name=time value='15:00'>15:00</td></tr>
	</form>
</html>
