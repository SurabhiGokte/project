<!DOCTYPE html>
<html>
	<head>
		<title>Add ShoW Details</title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
	<a href="add_city.php">Cities<a> | <a href="admin_movie_add.php">Movies<a>
		<form action="add_show_details_db.php" method="post">
			<center><p>Add Show Details Form</p><br>
			<br><br><br>
			<table border="0">
				
				<tr><th>MOVIE ID</th><td><input type="text" name="mid" required></td></tr>
				<tr><th>RELEASE DATE</th><td><input type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" name="dor" required placeholder="Please follow format yyyy-mm-dd"></td></tr>
				<tr><th>SHOW DATE</th><td><input type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" name="shdate" required placeholder="Please follow format yyyy-mm-dd"></td></tr>
				<tr><th>SHOW TIME</th><td><input type="text" name="shtime" placeholder="format(hh:mm:ss)" required></td></tr>
				<tr><th>CITY ID</th><td><input type="text" name="cid" required></td></tr>
				<tr><th>THEATRE ID</th><td><input type="text" name="tid" required></td></tr>
				<tr><th>SCREEN  ID</th><td><input type="text" name="sid" placeholder="Between Screen 1 and 5"required></td></tr>
				<tr><th>SHOW PRICE</th><td><input type="text" name="shprice" required></td></tr>
				
	
				

				</table><br><br>
				<input type='submit' value='Add Show Details'><br><br>
		</form><br><br>
	</body>
<?php 
	session_start();
	
	
	$today = date("Y-m-d");
	include("info.inc.php");
	$dbconn = mysqli_connect($hostname,$username,$password);
	if(!$dbconn){
		die("Could not connect to the database : ".mysql_error());
	}
	else
		{
				$dbselect = mysqli_select_db($dbconn,$dbname);
				if(!$dbselect){
				die("Could not select the database : ".mysql_error());
		}
		else
		{
			$query1 = "SELECT * FROM movie  where movie_release_date<='$today'"; 

			if($query1_run = mysqli_query($dbconn,$query1))
			{
				echo "<table border=2><tr><th>Movie Id</th><th>Movie Name</th></tr>";
				while($row1 = mysqli_fetch_array($query1_run))
				{
					$mid=$row1['movie_id'];
					$mname = $row1['movie_name'];
					
					echo "<tr><td>$mid</td><td>$mname</td></tr>";
				}
				//echo "</table>";
			}
					
			$query2 = "SELECT * FROM movie  where movie_release_date>='$today'"; 
			if($query2_run = mysqli_query($dbconn,$query2))
			{
				//echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th></tr>";
				while($row2 = mysqli_fetch_array($query2_run))
				{;
					$mid2=$row2['movie_id'];
					$mname2 = $row2['movie_name'];
					echo "<tr><td>$mid2</td><td>$mname2</td></tr>";
				}
				echo "</table><br>";
			}
			$query3="select  c.city_id,city_name,theatre_id,theatre_name from theatre t JOIN city c ON t.city_id=c.city_id";
			if($query_run = mysqli_query($dbconn,$query3))
				{
					echo "<table border=2><tr><th>City ID</th><th>City Name</th><th> Theatre ID</th><th>Theatre Name</th></tr>";
					while($row = mysqli_fetch_array($query_run))
					{
							$cid=$row['city_id'];
							$cname = $row['city_name'];
							$tid=$row['theatre_id'];
							$tname=$row['theatre_name'];
							echo "<tr><td>$cid</td><td>$cname</td><td>$tid</td><td>$tname</td></tr>";
					}
				echo "</table><br>";
				}
		}
	mysqli_close($dbconn);
	}
?>
</html>
