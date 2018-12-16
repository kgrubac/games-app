<?php

	include ('bp.php');

	otvoriBP();

	$p = $_POST['pretplacen'];
	$id = $_POST['uzrast_id'];
	$korid = $_POST['kor_id'];

		if ($p === "0") {
									
				$rj1 = $GLOBALS['bp']->query("UPDATE pretplata SET pretplacen = 1 WHERE korisnik_id = '$korid' AND uzrast_id = '$id'");
		}

		else {
		
				$rj2 = $GLOBALS['bp']->query('INSERT INTO pretplata (korisnik_id, uzrast_id, pretplacen) VALUES ("'.$korid.'", "'.$id.'", 1)');									
			}
		

		header("location: igre.php");
		
?>