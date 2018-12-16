<?php

	include ('bp.php');

	otvoriBP();

	$r = $GLOBALS['bp']->query("UPDATE pretplata SET pretplacen = '0'");

?>