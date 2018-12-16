<?php

include ("bp.php");

otvoriBP();


$id = $_POST['id'];
			$tip = $_POST['tip'];
			$ime = $_POST['ime'];
			$prez = $_POST['prezime'];
			$email = $_POST['email'];

			$rj = $GLOBALS['bp'] -> query("UPDATE Korisnik SET tip_id = '$tip', ime = '$ime', prezime = '$prez', email = '$email' WHERE korisnik_id = '$id'"); 

			header("location: korisnici.php");

			zatvoriBP();

header("location: korisnici.php");

?>