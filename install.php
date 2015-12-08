<?php
	include("info.inc.php");
	$link=mysql_connect($hostname,$username,$password);
	if(!$link)
		die("Could not Connect : ".mysqli_error());
	if(!mysql_select_db($dbname,$link))
		die("Could not Connect to DB : ".mysql_error());
	$query="CREATE TABLE IF NOT EXISTS movie(movie_id int(3) PRIMARY KEY AUTO_INCREMENT,movie_name varchar(50), movie_genre varchar(20), movie_language varchar(20),movie_release_date date);";
	
	
	if(mysql_query($query,$link))
		echo " movie Table created : ";
$query="CREATE TABLE IF NOT EXISTS city(city_id int(3) PRIMARY KEY AUTO_INCREMENT,city_name varchar(10), city_state varchar(20) , movie_id int(3), FOREIGN KEY(movie_id) REFERENCES movie(movie_id));";
	
	if(mysql_query($query,$link))
		echo " city Table created : ";
$query="CREATE TABLE IF NOT EXISTS theatre(theatre_id int(3) PRIMARY KEY AUTO_INCREMENT,theatre_name varchar(20), theatre_location varchar(50), city_id int(3), FOREIGN KEY(city_id) REFERENCES city(city_id) );";
	
	
	if(mysql_query($query,$link))
		echo "theatre Table created : ";
$query="CREATE TABLE IF NOT EXISTS user(user_id int(3) PRIMARY KEY AUTO_INCREMENT,user_fname varchar(10), user_lname varchar(10), user_email varchar(50), user_dob date,user_gender varchar(6),user_address varchar(50), user_password char(32));";
	
	
	if(mysql_query($query,$link))
		echo " user Table created : ";
$query="CREATE TABLE IF NOT EXISTS screen(screen_id int(3) PRIMARY KEY AUTO_INCREMENT,screen_name varchar(10), theatre_id int(3), FOREIGN KEY(theatre_id) REFERENCES theatre(theatre_id));";
	
	
	if(mysql_query($query,$link))
		echo " screen Table created : ";
$query="CREATE TABLE IF NOT EXISTS seat(seat_id int(3) PRIMARY KEY AUTO_INCREMENT,screen_id int(3),theatre_id int(3), total_seats int(10), movie_id int(3),city_id int(3),FOREIGN KEY(theatre_id) REFERENCES theatre(theatre_id),FOREIGN KEY(city_id) REFERENCES city(city_id),FOREIGN KEY(movie_id) REFERENCES movie(movie_id),FOREIGN KEY(screen_id) REFERENCES screen(screen_id));";
	
	
	if(mysql_query($query,$link))
		echo " seat Table created : ";
$query="CREATE TABLE IF NOT EXISTS show_time(show_id int(3) PRIMARY KEY AUTO_INCREMENT,show_date date,show_time time, show_price decimal(5,2), movie_id int(3),theatre_id int(3), city_id int(3),screen_id int(3),FOREIGN KEY(theatre_id) REFERENCES theatre(theatre_id),FOREIGN KEY(city_id) REFERENCES city(city_id),FOREIGN KEY(movie_id) REFERENCES movie(movie_id),FOREIGN KEY(screen_id) REFERENCES screen(screen_id));";
	
	
	if(mysql_query($query,$link))
		echo " show_time Table created : ";
$query="CREATE TABLE IF NOT EXISTS ticket_booked(ticket_id int(3) PRIMARY KEY AUTO_INCREMENT,movie_id int(3), city_id int(3),theatre_id int(3), ticket_price decimal(5,2), user_id int(3), show_id int(3),number_of_seats int(10),FOREIGN KEY(theatre_id) REFERENCES theatre(theatre_id),FOREIGN KEY(city_id) REFERENCES city(city_id),FOREIGN KEY(movie_id) REFERENCES movie(movie_id),FOREIGN KEY(show_id) REFERENCES show_time(show_id),FOREIGN KEY(user_id) REFERENCES user(user_id));";
	
	
	if(mysql_query($query,$link))
		echo " ticket_booked Table created : ";

	mysql_close($link);
?>
