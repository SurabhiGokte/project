<?php
	include ('info.inc.php');
	$mname=$_POST['mname'];
	$mgenre=$_POST['mgenre'];
	$releasedate=$_POST['dor'];
	$mlanguage=$_POST['mlanguage'];
	

	$dbconn = mysql_connect($hostname,$username,$password);
	if(!$dbconn){
		die("Could not connect to the database : ".mysql_error());
	}
	else{
		$dbselect = mysql_select_db($dbname,$dbconn);
		if(!$dbselect){
			die("Could not select the database : ".mysql_error());
		}
		else{
		$query = "INSERT into movie values(NULL,'$mname','$mgenre','$mlanguage','$releasedate')";
			if(mysql_query($query)){
				echo "Movie Added!<br><br>";
				header("Location: a.php");
				
			}
		}
	mysql_close($dbconn);
	}
?>
