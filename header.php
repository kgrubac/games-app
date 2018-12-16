<?php

	if (session_id() == "") 
		session_start(); 

		$ak = -1;
		$ak_tip = -1;
		$ak_id = -1;


	if (isset($_SESSION['ak'])) {

		$ak = $_SESSION['ak'];
		$ak_ime = $_SESSION['ak_ime'];		
		$ak_tip = $_SESSION['ak_tip'];		
		$ak_id = $_SESSION["ak_id"];
}

?>

<meta charset="utf-8">
<html>
<head>
	<title>Dobrodošli u Game World</title>	

	<link rel="stylesheet" type="text/css" href="aplikacija.css"/>
	
</head>

<body>

<div class = "container">

<div class = "heading">

		<img src="logo.png">

		<div class = "login">

				<a href ="login.php">

				<?php	
				
				if ($ak_id > 0) {
					
					echo '<a href="logout.php">';
					echo '<h1>Odjava</h1>';
					echo '</a>';
					
				}

				else {

					echo "<h1>Prijava</h1>";

				}

				?>

		</div>

		<div class="meni">

		<div class="tabovi">
	
				<a href = "index.php"> <p>Početna</p> </a>
				<a href = "igre.php"><p>Igre</p> </a>

				<?php

				error_reporting(0);
		
					if($ak_tip == 0) {
						echo '<a href = "admin.php"><p>Admin</p> </a>';
						echo '<a href = "korisnici.php"><p>Korisnici</p> </a>';
					}

					if($ak_tip == 1) {
						echo '<a href = "moderator.php"><p>Moderator</p> </a>';
					}

				?>

				<a href = "oautoru.php"> <p>O Autoru</p> </a>
			
		</div>

		</div>
</div>




