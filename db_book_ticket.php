<html>
	<head>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
</html>
<?php
	include("info.inc.php");
	session_start();
	$mname = $_POST['movie'];
	$mdate = $_POST['date'];
	$mtime = $_POST['time'];
	$mcity = $_POST['city'];
	$mtheatre = $_POST['theatre'];
	$mqty = $_POST['qty'];
	$mprice = $_POST['price'];
	$total = ($mprice*$mqty);
	$user_id = $_SESSION['user_id'];
	//echo $user_id;

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

			$query1 = "SELECT movie_name FROM movie WHERE movie_id='$mname'";
			$query_run1 = mysqli_query($dbconn,$query1);
			$row = mysqli_fetch_array($query_run1);
			$movie_name = $row['movie_name'];

			$query2 = "SELECT city_name FROM city WHERE city_id='$mcity'";
			$query_run2 = mysqli_query($dbconn,$query2);
			$row2 = mysqli_fetch_array($query_run2);
			$city_name = $row2['city_name'];

			$query3 = "SELECT * FROM theatre WHERE theatre_name='$mtheatre'";
			$query_run3 = mysqli_query($dbconn,$query3);
			
			while($row3 = mysqli_fetch_array($query_run3)){
				$id3 = $row3['theatre_id'];
				//echo "<br> theatre id $id3";
			}

			$query4 = "SELECT * FROM show_time s, movie m, theatre t, city c WHERE show_time='$mtime' and m.movie_id=$mname and theatre_name='$mtheatre' and c.city_id=$mcity and s.movie_id=m.movie_id and c.city_id=s.city_id and t.theatre_id=s.theatre_id";

			$query_run4 = mysqli_query($dbconn,$query4);
			
			while($row4 = mysqli_fetch_array($query_run4)){
				$id4 = $row4['show_id'];
				//echo "<br> show id $id4";
			}

			$insert_query = mysqli_query($dbconn,"INSERT into ticket_booked values(null,$mname,$mcity,$id3,'$mprice',$user_id,$id4,$mqty)");
		}
		
	mysqli_close($dbconn);
	}


	echo "<html><center>";
	echo "<header>BOOKING SUMMARY</header><br>";
	echo "<br>Movie - $movie_name <br>Date - $mdate <br>Time - $mtime <br>Venue - $mtheatre, $city_name <br>Amount per seat - Rs. $mprice <br>Number of seats - $mqty";
	echo "<br><br><b>Total Amount Payable</b><br>";
	echo "<br> Rs. $total";


	echo "<head>
		<title>Booking Summary</title>		
	</head>
	<body>
		<form action='payment.php' method='post'>
			<br><br><br>
			<input type='submit' value='Proceed To Pay'>
		</form>
	</body>
</html>";
?>
