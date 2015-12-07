<?php
	session_start();
	$mid = $_GET['q'];
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
			echo "<td>Select Price</td>
				<td><select name='price'>";
				echo "<option>Select Price</option>";
				$query = mysqli_query($dbconn,"SELECT show_price FROM show_time where movie_id='$mid'");
				while($row = mysqli_fetch_array($query)){
					$sprice = $row['show_price'];
					echo "<option>$sprice</option>";
				}
				echo "</select></td>";
			}
			
	mysqli_close($dbconn);
	}		
?>	

			
