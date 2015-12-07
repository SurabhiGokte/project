<html>
	<head>
		<title> All Movies</title>
	</head>
	<body>
		<center>Admin City Adding Page
		<br><br>
		<a href="add cities.php">Add Cities<a> | <a href="admin_movie_add.php">Add Movies<a> | <a href="add_theatre.php">Add Theatre<a> 
		<br><br>  
		<form method="post" action="add_city_db.php">
			MOVIE ID : <input type='text' name='movie_id'><br><br>
			CITY NAME : <input type='text' name='city_name'><br><br>
			CITY STATE : <input type='text' name='city_state'><br><br>
			<input type="submit" value="Add City for this movie"><br><br>
		<b>See the Movie Id from the list of movies below : </b>
		</form>
		<br>
	</body>

<?php 
	session_start();
	
	
	$today = date("Y-m-d");
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
			$query1 = "SELECT * FROM movie  where movie_release_date<='$today'"; 

			if($query1_run = mysqli_query($dbconn,$query1)){
				echo "<table border=2><tr><th>Movie ID</th><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th><th></th></tr>";
				while($row1 = mysqli_fetch_array($query1_run)){
					$mid=$row1['movie_id'];
					$mname = $row1['movie_name'];
					$mgenre = $row1['movie_genre'];
					$mlang = $row1["movie_language"];
					$mrdate = $row1['movie_release_date'];
					echo "<tr><td>$mid</td><td>$mname</td><td>$mgenre</td><td>$mlang</td><td>$mrdate</td><td>Now Showing</td><td>Bollywood</td></tr>";
				}
				//echo "</table>";
			}
					
			$query2 = "SELECT * FROM movie  where movie_release_date>='$today'"; 
			if($query2_run = mysqli_query($dbconn,$query2)){
				//echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th></tr>";
				while($row2 = mysqli_fetch_array($query2_run)){
					$mid2=$row2['movie_id'];
					$mname2 = $row2['movie_name'];
					$mgenre2 = $row2['movie_genre'];
					$mlang2 = $row2["movie_language"];
					$mrdate2 = $row2['movie_release_date'];
					echo "<tr><td>$mid2</td><td>$mname2</td><td>$mgenre2</td><td>$mlang2</td><td>$mrdate2</td><td>Coming Soon</td><td>Bollywood</td></tr>";
				}
				echo "</table>";
			}
		}
				mysqli_close($dbconn);
	}
		?>

</html>
