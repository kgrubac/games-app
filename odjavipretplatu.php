<?php

	include ('bp.php');

	otvoriBP();

	$p = $_POST['pretplacen'];
	$id = $_POST['uzrast_id'];
	$korid = $_POST['kor_id'];


	$rj2 = $GLOBALS['bp']->query("UPDATE pretplata SET pretplacen = 0 WHERE korisnik_id = '$korid' AND uzrast_id = '$id'");

	header("location: igre.php");

?>