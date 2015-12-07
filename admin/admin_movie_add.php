<!DOCTYPE html>
<html>
	<head>
		<title>Add a movie</title>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
	<a href="cities.php">Cities<a> | <a href="all_movies.php">Movies<a>
		<form action="update_movie.php" method="post">
			<center><p>Movie Registration Form</p><br>
			<br><br><br>
			<table border="0">
				
				<tr><th>MOVIE NAME</th><td><input type="text" name="mname" required></td></tr>
				<tr><th>MOVIE GENRE</th><td><input type="text" name="mgenre" required></td></tr>
				<tr><th>MOVIE RELEASE DATE</th><td><input type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" name="dor" required placeholder="Please follow format yyyy-mm-dd"></td></tr>
				<tr><th>MOVIE LANGUAGE</th><td><input type="text" name="mlanguage" required></td></tr>

				</table><br><br>
				<input type='submit' value='Add Movie'><br><br>
		</form><br><br>
		<form action="add_show_details.php">
		Want to add Show details for this Movie?<br><br>
		<input type='submit' value='Add Show Details'><br><br>
			
		</form>
	</body>
</html>
