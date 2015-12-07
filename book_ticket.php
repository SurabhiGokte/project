<html>
	<head>
		<title>Booking Ticket</title>
		<style>
			<?php
				include('custom.css');
			?>
			<link rel='stylesheet' type='text/css' href='custom.css'>
		</style>
		<script>
			function showTheatre(str) {
				//alert(str);
				if (str=="") {
    					document.getElementById("txtHint").innerHTML="";
    					return;
  				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
  				}
				else{ 
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						//alert(xmlhttp.responseText);
      						document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    					}
  				}
  				xmlhttp.open("GET","getTheatre.php?q="+str,true);
  				xmlhttp.send();
			}
			function showData(str){
				showDate(str);
				
				showPrice(str);
				//showTime(str);
			}

			function showDate(str){
				//alert(document.getElementById("mdate").innerHTML);
				//alert(str);
				document.getElementById("mdate").innerHTML="";
				if (str=="") {
    					document.getElementById("mdate").innerHTML="";
    					return;
  				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
  				}
				else{ 
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						//alert(xmlhttp.responseText);
      						document.getElementById("mdate").innerHTML=xmlhttp.responseText;
    					}
  				}
  				xmlhttp.open("GET","getDate.php?q="+str,false);
  				xmlhttp.send();
			}
			function showTime(str){
				//alert(str);
				document.getElementById("mtime").innerHTML="";
				if (str=="") {
    					document.getElementById("mtime").innerHTML="";
    					return;
  				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
  				}
				else{ 
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						//alert(xmlhttp.responseText);
      						document.getElementById("mtime").innerHTML=xmlhttp.responseText;
    					}
  				}
  				xmlhttp.open("GET","getTime.php?q="+str,false);
  				xmlhttp.send();
			}
			function showPrice(str){
				//alert(str);
				document.getElementById("mprice").innerHTML="";
				if (str=="") {
    					document.getElementById("mprice").innerHTML="";
    					return;
  				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
  				}
				else{ 
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						//alert(xmlhttp.responseText);
      						document.getElementById("mprice").innerHTML=xmlhttp.responseText;
    					}
  				}
  				xmlhttp.open("GET","getPrice.php?q="+str,false);
  				xmlhttp.send();
			}
		</script>

		
	</head>
	<body>
	<form action='db_book_ticket.php' method='post'>
		<center><header>BOOK YOUR TICKET</header>
		<br><br>
		<p>SELECT MOVIE DETAILS</p>
		<br><br>
		<table border=0>
			<tr><td>Select Movie</td>
			<td><select name='movie' onchange="showData(this.value)">
			<option>Select Movie</option>
			<?php
			include('info.inc.php');
			$today = date("Y-m-d");
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
					$query = mysqli_query($dbconn,"SELECT * FROM movie where movie_release_date<='$today'");
					while($row = mysqli_fetch_array($query)){
						$mname = $row['movie_name'];
						echo "<option value='".$row['movie_id']."'>$mname</option>";
					}
				}
			mysqli_close($dbconn);
			}
			?>
			</select></td></tr>
			<tr id="mdate">
			</tr>
			<tr id="mtime">
			</tr>
			<tr><td>Select City</td>
			<td><select name='city' onchange="showTheatre(this.value)">
			<option>Select City</option>
			<?php
			session_start();
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
					$query = mysqli_query($dbconn,"SELECT * FROM city");
					while($row = mysqli_fetch_array($query)){
						$cname = $row['city_name'];
						$cid = $row['city_id'];
						echo "<option value='".$cid."'>$cname</option>";
					}
				$_SESSION['cname'] = $cname;
					
				}
				/*if($cname=='Pune'){
					echo "<tr><td>Select Theatre</td>
						<td><select name='theatre'>
						<option value=1>E Square</option>
						</select></td></tr>";
				}
				else {
					echo "<tr><td>Select Theatre</td>
						<td><select name='theatre'>
						<option value=1>Inox</option>
						</select></td></tr>";
				}*/
			mysqli_close($dbconn);
			}
			?>
			
			</select></td></tr>
			
			<tr id="txtHint"></tr>
		
		<tr><td>Select Quantity</td>
		<td><select name='qty'>
			<option>Select Qunatity</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
		</select></td></tr>
		</table>
		<br><br>
		<p>SELECT PRICE DETAILS</p>
		<br><br>
		<table border=0>
		<tr id="mprice">
		</tr>
		</table>	
		<br><br>
		<p>SELECT YOUR SEAT(S)</p>
		<table border=0>
		<tr><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox></td></tr>
		<tr><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox></td></tr>
		<tr><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox></td></tr>
		<tr><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox><td><input type=checkbox></td></tr>
		</table>
		---------------------------
		<br><br>

		<input type='submit' value='Book'>
	</form>
	</body>
</html>
