<html>
	<head>
		<title> Cities </title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<center><header>THE ONLINE TICKET BOOKING SYSTEM</header>
		<br><br>
		<a href="home_page.php">Home<a> | <a href="cities.php">Cities<a> | <a href="movies.php">Movies<a> </center>
		<br><br>  
		<form method="post" action="book_ticket.php">
			<center><input type="submit" value="Book a movie ticket">
		</form>
		<br><br>
		<?php
			include("info.inc.php");

			$dbconn = mysqli_connect($hostname,$username,$password);

			if(!$dbconn){
				die("Could not connect to the database : ".mysql_error());
			}
			else{
				$dbselect = mysqli_select_db($dbconn,$dbname);
				if(!$dbselect){
					die("Could not select database : ".mysql_error());
				}
				else{
					$query = mysqli_query($dbconn,"SELECT * FROM city c, theatre t where c.city_id=t.city_id");
					echo "<center><table border=2><tr><th>City Name</th><th>State Name</th><th>Theatre Name</th></tr>";
					while($row = mysqli_fetch_array($query)){
						$cname = $row['city_name'];
						$cstate = $row['city_state'];
						$ctheatre = $row['theatre_name'];
						echo "<tr><td>$cname</td><td>$cstate</td><td>$ctheatre</td></tr>";
					}
					echo "<table>";
				}
			}
		?>
		<br><br>
		<p>Available Movies</p>
			
			<?php
			$today = date('Y-m-d');
		
			$dbconn = mysqli_connect($hostname,$username,$password);
			if(!$dbconn){
				die("Could not connect to the database : ".mysqli_error());
			}
			else{
				$dbselect = mysqli_select_db($dbconn,$dbname);
				if(!$dbselect){
					die("Could not select the database : ".mysqli_error());
				}
				else{
					echo "<table border=2>";
					$query = mysqli_query($dbconn,"select * from movie m, show_time s, city c, theatre t where m.movie_id=s.movie_id and c.city_id=s.city_id and t.theatre_id=s.theatre_id and s.show_date>'$today' order by m.movie_name,c.city_name,show_date");
					while($row = mysqli_fetch_array($query)){
						$mname = $row['movie_name'];
						$sdate = $row['show_date'];
						$stime = $row['show_time'];
						$cname = $row['city_name'];
						$tname = $row['theatre_name'];
						echo "<tr><td>$mname</td><td>$stime</td><td>$sdate</td><td>$tname</td><td>$cname</td></tr>";
					}
					echo "</table>";
				}
			mysqli_close($dbconn);
			}
			?>
			
	</body>
</html>
