<?php

	include ('bp.php');

	otvoriBP();

	$obrisi = $_POST['Obriši'];
						
	$rez = $GLOBALS['bp']->query("DELETE FROM igra WHERE igra_id = '$obrisi'");

	header("location: igre.php");


?>