<?php

session_start();

unset($_SESSION['ak']);
unset($_SESSION['ak_ime']);
unset($_SESSION['ak_tip']);
unset($_SESSION['ak_id']);

session_destroy();
header("Location:index.php");


?>
