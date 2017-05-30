	<?php
	session_start();
	require("connect.php");
	$bab=$db->query("SELECT * FROM registered ");
	if(isset($_POST['submit'])){
	$abb=$db->prepare("SELECT * FROM registered WHERE Email=:em");
	$abb->execute([
	'em'=>$_POST['email'],
	]);
	if(!empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email']) && !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===FALSE && $abb->fetch()<1){
		
			$f=$_POST['first'];
	$l=$_POST['last'];
	$e=$_POST['email'];
		$ab=$db->prepare("INSERT INTO registered(FirstName,LastName,Email)VALUES(:firstname,:lastname,:email)");
		$ab->execute([
		'firstname'=>$f,
		'lastname'=>$l,
		'email'=>$e,
		]);
		
		$_SESSION['name']=$_POST['first'];
		
		header("Location:thankyou.php");
	}
	if(empty($_POST['first'] || $_POST['last'])){
		$f="Name Required";
	}
	if(empty($_POST['email'])){
		$err="Email Required";
	}elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===TRUE){
		$err="That is an invalid email";
	}elseif($abb->fetchAll(PDO::FETCH_ASSOC)!=0){
		$err="You already registered";
	}
	}
	?>



	<!DOCTYPE html>
	<html>
	<head>
	<title>Mini Project1</title>
	<link rel="stylesheet" href="css_style.css"/>
	</head>
	<body>
	<pre>
	<p>
	We are inviting you to a special event On June 15,2017. 
	We want you to be apart of this once in a lifetime special event. 
	It takes place at 199 NW 13ST APT98. Be there or be square. 
	Register today! <span style="font-weight:bold; color:white; background:grey; font-style:normal; font-family:sans-serif;"><?php echo $bab->rowCount();?> people registered</span>
	</p>
	</pre>
	<div class="thediv">
	<h3 style="color:red;"><?php echo $err;?><br></h3>
	<h3 style="color:red;"><?php echo $f;?><br></h3>
	<text class="p">
	Have you signed up yet for the biggest event of the year?<br> If not
	what are you waiting for signup now!
	</text>
		<form action="home.php" method="post">
		  <input type="text" placeholder="FirstName" name="first"><br>
		  <input type="text" placeholder="LastName" name="last"><br>
		  <input type="text" placeholder="Email" name="email"><br>
		  <input type="submit" style="background:black; border:none; outline:none;cursor:pointer;color:white; border:none;"name="submit" value="Register">
		</form>
		</div>
		<section class="section2">

	</section>
	</body>
	</html>