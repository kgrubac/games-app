<?php

include ("bp.php");

otvoriBP();

$id = $_POST['katid'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$moderator = $_POST['moderator'];

$GLOBALS['bp']->query('UPDATE uzrast SET uzrast_id = "'.$id.'", naziv = "'.$naziv.'", opis = "'.$opis.'", moderator_id = "'.$moderator.'" WHERE uzrast_id = "'.$id.'"'); 

zatvoriBP();

header("location: igre.php");

?>