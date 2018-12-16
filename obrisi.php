<?php

	include ('bp.php');

	otvoriBP();

	$GLOBALS['bp']->query("SET foreign_key_checks = 0");

	$obrisi = $_POST['Obriši'];
						
	$rez = $GLOBALS['bp']->query("DELETE FROM korisnik WHERE korisnik_id = '$obrisi'");

	$GLOBALS['bp']->query("SET foreign_key_checks = 1");

	header("location: korisnici.php");


?>