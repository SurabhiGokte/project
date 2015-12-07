<html>
	<head>
		<title> All Movies</title>
	</head>
	<body>
		<center>Admin Theatre Adding Page
		<br><br>
		<a href="add cities.php">Add Cities<a> | <a href="admin_movie_add.php">Add Movies<a> | <a href="add_theatre.php">Add Theatre<a> 
		<br><br>  
		<form method="post" action="add_theatre_db.php">
			CITY ID : <input type='text' name='city_id'><br><br>
			THEATRE NAME : <input type='text' name='theatre_name'><br><br>
			THEATRE LOCATION : <input type='text' name='theatre_location'><br><br>
			<input type="submit" value="Add Theatre for this City"><br><br>
		<b>See the City Id from the list of Cities below : </b>
		</form>
		<br>
	</body>
<?php
	include("info.inc.php");
	$dbconn = mysql_connect($hostname,$username,$password);
	if(!$dbconn)
	{
		die("Could not connect to the database : ".mysql_error());
	}
	else
	{
			$dbselect = mysql_select_db($dbname,$dbconn);
			if(!$dbselect)
		{
				die("Could not select the database : ".mysql_error());
		}
		else
		{
			$query="Select * from city";
			if($query_run = mysql_query($query))
				{
					echo "<table border=2><tr><th>City ID</th><th>City Name</th><th>City_State</th></tr>";
					while($row = mysql_fetch_array($query_run))
					{
							$cid=$row['city_id'];
							$cname = $row['city_name'];
							$cstate = $row['city_state'];
							echo "<tr><td>$cid</td><td>$cname</td><td>$cstate</td></tr>";
					}
				}
		}
		mysql_close($dbconn);
	}
?>
