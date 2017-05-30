	<?php
	session_start();
	require("connect.php");

	?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>To_do List</title>
	<link rel="stylesheet" href="css_style.css"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body class="thankyoubody">
	<div class="divy">
	<h2>
	Thank you <span style="color:purple;"><?php echo $_SESSION['name'];?></span> for registering,<br> we look forward to seeing you
	</h2>
	<a href="logout.php"><span class="glyphicon glyphicon-home"></span>
	</a>

	</div>
	</body>

	</html>