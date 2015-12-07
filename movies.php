<html>
	<head>
		<title> Movies </title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<center><header>MOVIES</header>
		<br><br>
		<a href="home_page.php">Home<a> | <a href="cities.php">Cities<a> | <a href="movies.php">Movies<a>
		<br><br>  
		<form method="post" action="book_ticket.php">
			<input type="submit" value="Book a movie ticket">
		</form>
		<br>
	</body>

<?php 
	session_start();
	$user_id = $_SESSION['user_id'];
	
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
			$query1 = "SELECT * FROM movie  where movie_release_date<='$today' and movie_language='Hindi'"; 

			if($query1_run = mysqli_query($dbconn,$query1)){
				echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th><th></tr>";
				while($row1 = mysqli_fetch_array($query1_run)){
					$mname = $row1['movie_name'];
					$mgenre = $row1['movie_genre'];
					$mlang = $row1["movie_language"];
					$mrdate = $row1['movie_release_date'];
					echo "<tr><td>$mname</td><td>$mgenre</td><td>$mlang</td><td>$mrdate</td><td>Now Showing</td><td>Bollywood</td></tr>";
				}
				//echo "</table>";
			}
					
			$query2 = "SELECT * FROM movie  where movie_release_date>='$today' and movie_language='Hindi'"; 
			if($query2_run = mysqli_query($dbconn,$query2)){
				//echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th></tr>";
				while($row2 = mysqli_fetch_array($query2_run)){
					$mname2 = $row2['movie_name'];
					$mgenre2 = $row2['movie_genre'];
					$mlang2 = $row2["movie_language"];
					$mrdate2 = $row2['movie_release_date'];
					echo "<tr><td>$mname2</td><td>$mgenre2</td><td>$mlang2</td><td>$mrdate2</td><td>Coming Soon</td><td>Bollywood</td></tr>";
				}

				$query3 = "SELECT * FROM movie  where movie_release_date<='$today' and movie_language='English'"; 
				if($query3_run = mysqli_query($dbconn,$query3)){
					//echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th><th></tr>";
					while($row3 = mysqli_fetch_array($query3_run)){
						$mname3 = $row3['movie_name'];
						$mgenre3 = $row3['movie_genre'];
						$mlang3 = $row3["movie_language"];
						$mrdate3 = $row3['movie_release_date'];
						echo "<tr><td>$mname3</td><td>$mgenre3</td><td>$mlang3</td><td>$mrdate3</td><td>Now Showing</td><td>Hollywood</td></tr>";
					}
				}

				$query4 = "SELECT * FROM movie  where movie_release_date>='$today' and movie_language='English'"; 
				if($query4_run = mysqli_query($dbconn,$query4)){
					//echo "<table border=2><tr><th>Movie Name</th><th>Movie Genre</th><th>Movie Language</th><th>Movie Release Date</th><th>Status</th><th></tr>";
					while($row4 = mysqli_fetch_array($query4_run)){
						$mname4 = $row4['movie_name'];
						$mgenre4 = $row4['movie_genre'];
						$mlang4 = $row4["movie_language"];
						$mrdate4 = $row4['movie_release_date'];
						echo "<tr><td>$mname4</td><td>$mgenre4</td><td>$mlang4</td><td>$mrdate4</td><td>Coming Soon</td><td>Hollywood</td></tr>";
					}
				}

				echo "</table>";

				echo "<br><br><p>Available Shows</p></br>";
				echo "<table border=2>";
					$query1 = mysqli_query($dbconn,"select * from movie m, show_time s, city c, theatre t where m.movie_id=s.movie_id and c.city_id=s.city_id and t.theatre_id=s.theatre_id and s.show_date>'$today' order by m.movie_name,c.city_name,show_date");
					while($row1 = mysqli_fetch_array($query1)){
						$mname1 = $row1['movie_name'];
						$sdate1 = $row1['show_date'];
						$stime1 = $row1['show_time'];
						$cname1 = $row1['city_name'];
						$tname1 = $row1['theatre_name'];
						echo "<tr><td>$mname1</td><td>$stime1</td><td>$sdate1</td><td>$tname1</td><td>$cname1</td></tr>";
					}
					echo "</table>";
			}
		}
				mysqli_close($dbconn);
	}
		?>

</html>
