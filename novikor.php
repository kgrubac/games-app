<?php

include "header.php";
include "bp.php";

?> 

<div class="novaigra">

<h1>Novi korisnik</h1>

	<form method="post" action = "novikor.php">

			<p>Ime:</p>
			<input type="text" name="ime" required="Unesi ime">

			<p>Prezime:</p>
			<input type="text" name="prezime" required="Unesi prezime">

			<p>E-mail:</p>
			<input type="email" name="email" required="Unesi E-mail">

			<p>Korisničko ime:</p>
			<input type="text" name="korime" required="Unesi Korisničko ime">

			<p>Lozinka:</p>
			<input type="password" name="lozinka" required="Unesi Lozinku">

			<p>Odaberi tip korisnika:</p>
			<select name = "tip">
				<option value="0">Administrator</option>
				<option value="1">Voditelj</option>
				<option value="2">Korisnik</option>
			</select>

			<p>Postavi sliku:</p>
			<input type="text" name="slika" required="Unesi sliku"><br><br>

			<input type="submit" name="pošalji" value="Dodaj">

<?php
	
	if (isset($_POST['korime'])) {

	$ime = $_POST['ime'];
	$prez = $_POST['prezime'];
	$email = $_POST['email'];
	$kor = $_POST['korime'];
	$loz = $_POST['lozinka'];
	$tip = $_POST['tip'];
	$slika = $_POST['slika'];

	otvoriBP();

	$rj = $GLOBALS['bp']->query('INSERT INTO korisnik (tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika) VALUES ("'.$tip.'", "'.$kor.'", "'.$loz.'", "'.$ime.'", "'.$prez.'", "'.$email.'", "'.$slika.'" )');

	header ("Location:korisnici.php");

	}

	
?>

<?php

include "footer.php"

?>