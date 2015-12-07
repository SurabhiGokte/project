<html>
	<head>
		<title></title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<form action="db_conn.php" method="post">
			<center><header>SHAANDAAR</header>
			<br><br>
			Romance blossoms as the families of two East Indian business dynasties prepare for a merger.<br><br>
			<b>Initial Release :</b> October 22, 2015 (USA)<br>
			<b>Director :</b>  Vikas Bahl <br>
			<b>Producers :</b>  Anurag Kashyap, Madhu Mantena, Vikramaditya Motwane, Karan Johar, Fox Star Studios<br>
			<br>
			<img src='movie5.jpg' height=250 width=250><br><br>
<?php
	include("info.inc.php");

	$dbconn = mysqli_connect($hostname,$username,$password);
	if(!$dbconn){
		die("Could not connect to the databse : ".mysql_error());
	}
	else{
		$dbselect = mysqli_select_db($dbconn,$dbname);
		if(!$dbselect){
			die("Could not select the databse : ".mysql_error());
		}
		else{
			$query = mysqli_query($dbconn,"SELECT * from movie m,city c, theatre t, show_time s WHERE movie_name='Shaandaar' and s.movie_id=m.movie_id and c.city_id=s.city_id and t.theatre_id=s.theatre_id ");
			echo "<table border=2><tr><th>Available shows</th><th>Theatre</th><th>City</th><th>Booking</th><th>Check Availability</th></tr>"; 
			while($row = mysqli_fetch_array($query)){
				$showtime = $row['show_time'];
				$cityname = $row['city_name'];
				$theatrename = $row['theatre_name'];
				echo "<tr><td>$showtime</td><td>$theatrename</td><td>$cityname</td><td><a href='book_ticket.php'>Book Now</a></td><td><a href=''>Available Seats</a></td></tr>";
			}
			echo "</table>";
			echo "<br><br><br>Movie is coming soon!!";
		}
	mysqli_close($dbconn);
	}
?>
