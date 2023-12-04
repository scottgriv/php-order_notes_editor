 <!doctype html>
 <html>

 <head>
 	<meta charset="utf-8">
 	<title>Order Notes - Access</title>
 	<link rel="icon" type="image/png" href="./images/favicon.ico">
 	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
 	<script>
 		function refresh() {
 			// SHOW overlay
 			$('#overlay').show();

 		}

 		$(document).ready(function() {
 			// Create overlay and append to body:
 			$('<div id="overlay"/>').css({
 				position: 'fixed',
 				top: 0,
 				left: 0,
 				width: '100%',
 				height: $(window).height() + 'px',
 				opacity: 0.4,
 				background: 'lightgray url(./images/loading.gif) no-repeat center'
 			}).hide().appendTo('body');
 		});
 	</script>

 	<style>
 		body {
 			margin: 0px;
 		}

 		table {

 			border: 3px solid #000000;

 		}

 		input[type=text],
 		select {
 			width: 100%;
 			border-radius: 5px;
 			margin: 7px 0;
 			border: 1px solid #ccc;
 			padding: 14px 18px;
 			display: inline-block;
 			box-sizing: border-box;
 		}

 		input[type=submit]:hover {
 			background-color: #C0C0C0;
 		}

 		textarea,
 		select {
 			width: 100%;
 			border-radius: 5px;
 			margin: 7px 0;
 			border: 1px solid #ccc;
 			padding: 14px 18px;
 			display: inline-block;
 			box-sizing: border-box;
 			resize: none;
 		}

 		input[type=submit] {
 			width: 100%;
 			border: none;
 			color: white;
 			padding: 14px 20px;
 			background-color: #000000;
 			margin: 8px 0;
 			cursor: pointer;
 			border-radius: 4px;


 		}
 	</style>
 </head>

 <body>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<div class="logo" align="center">
 		<img src="./images/logo.png" height="200" width="200" align="center" />
 	</div>
 	<tr>
 		<h3 align="center"><b>Please enter an order number and click submit.</b></h3>
 	</tr>
 	<br>
 	<form action="" method="post">
 		<table bgcolor="#f2f2f2" style="padding:2px" align="center">
 			<tr>
 				<td> Order Number : </td>
 				<td><input type="text" name="order" maxlength="8"></td>
 			</tr>
 			<tr>
 				<td colspan="2"><input type="submit" name="submit" onclick="refresh();"></td>
 			</tr>
 	</form>
 	</table>
 	<?php
		include 'dbconfig.php';  // Assuming dbconfig.php returns the $conn object

		$order = $_POST["order"] ?? '';

		if ($order == '') {
			echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='black'>Note: An order should be open and valid to access the notes.</font></span></td></center></b>";
		} else {
			if (!is_numeric($order)) {
				echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='red'>Invalid characters entered, please enter numeric values only.</font></span></td></center></b>";
			} else {
				$order = $conn->real_escape_string($order);
				$query = "SELECT COUNT(*) AS COUNT FROM Order_Header WHERE Header_Order_ID = '$order'";
				$result = $conn->query($query);

				if ($result && $result->num_rows > 0) {
					$row = $result->fetch_assoc();
					if ($row["COUNT"] > 0) {
						$query = "SELECT Header_Status FROM Order_Header WHERE Header_Order_ID = '$order'";
						$result = $conn->query($query);
						if ($result) {
							$row = $result->fetch_assoc();
							if ($row["Header_Status"] == 'Open') {
								echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='green'>Order $order is a valid open order number.</font></span></td></center></b>";
								header("Location: http://localhost/php-order_notes_editor/header.php?order=$order");
								exit;
							} else {
								echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='red'>Order $order is a closed order, please enter open orders only.</font></span></td></center></b>";
							}
						}
					} else {
						echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='red'>Order $order is not a valid order number, please try again.</font></span></td></center></b>";
					}
				} else {
					echo "<br><b><center><td align=\"center\"><font face='Verdana, Arial, Helvetica' size='3' color='red'>Database query failed.</font></span></td></center></b>";
				}
			}
		}
		// $conn->close();
		?>
 </body>

 </html>
