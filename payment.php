<html>
	<head>
		<title>Payment</title>
		<script type="text/javascript">
			function falert(){
				alert("Paid successfully!");
			}
		</script>
		<style>
			<?php
				include("custom.css");
			?>
			<link rel="stylesheet" type="text/css" href="custom.css">
		</style>
	</head>
	<body>
		<center><header>FILL YOUR DEBIT/CREDIT CARD DETAILS BELOW</header>
		<br><br><br>
		<table border="0">
			<tr><td><input type="text" placeholder="Enter you card number" name="card_no"></td></tr>
			<tr><td><input type="text" placeholder="Enter name on the card" name="card_name"></td></tr>
			<tr><td><select><option>Expiry Date</option></select></td></tr>
			<tr><td><input type="text" placeholder="CVV" name="cvv"></td></tr>
		</table>
		<br><br>
		<input type="button" value="Pay Now" onclick=falert()><input type="reset" value="Cancel Transaction">
	</body>
</html>
