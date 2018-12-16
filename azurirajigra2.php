<?php

include ("bp.php");

otvoriBP();

$id = $_POST['id'];
$uzr = $_POST['uzrast'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$slika = $_POST['slika'];

$GLOBALS['bp']->query('UPDATE igra SET uzrast_id = "'.$uzr.'", naziv = "'.$naziv.'", opis = "'.$opis.'", slika = "'.$slika.'" WHERE igra_id = "'.$id.'"'); 

zatvoriBP();

header("location: igre.php");

?>