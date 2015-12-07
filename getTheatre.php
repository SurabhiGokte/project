<?php
	session_start();
	$cid = $_GET['q'];
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
			echo "<tr><td>Select Theatre</td>
				<td><select name='theatre'>";
				$query = mysqli_query($dbconn,"SELECT theatre_name FROM theatre where city_id='$cid'");
				while($row = mysqli_fetch_array($query)){
					$tname = $row['theatre_name'];
					echo "<option>$tname</option>";
				}
				echo "</select></td></tr>";
			}
			
	mysqli_close($dbconn);
	}		
?>	

			
