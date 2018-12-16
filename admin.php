<?php
	include ("header.php");
	include ("bp.php");
?>

<div class="admin">

	<h1>Administrator</h1>

	<h2>Korisnici</h2>

		<a href="novikor.php"><p>Dodaj novog korisnika</p></a>

		<a href="korisnici.php"><p>Ažuriraj/Obriši korisnika</p></a>

	<h2>Kategorije</h2>

		<a href="novakat.php"><p>Dodaj novu kategoriju</p></a>

		<a href="azurirajkat.php"><p>Ažuriraj kategoriju</p></a>

		<br>

	<h3>Pretplate:</h3>

	<?php

	otvoriBP();

		$rj = $GLOBALS['bp'] -> query('SELECT count(*), naziv FROM uzrast, pretplata WHERE uzrast.uzrast_id = pretplata.uzrast_id GROUP BY uzrast.uzrast_id');

		while ($podaci = $rj->fetch_assoc()) {

		echo '<p1>'.$podaci['naziv'].'</p1>';

		echo '<br>';

		echo "Broj pretplata:";
		echo  $podaci['count(*)'];

		echo '<br><br>';
		} 

		echo '<h3>TOP 10 moderatora:</h3>';

		$rez = $GLOBALS['bp'] -> query('SELECT count(*), ime, prezime FROM uzrast, igra, korisnik WHERE uzrast.uzrast_id = igra.uzrast_id AND korisnik.korisnik_id = uzrast.moderator_id GROUP BY korisnik.korisnik_id');

		while ($pod = $rez->fetch_assoc()){

			echo $pod['ime'];
			echo ' ';
			echo $pod['prezime'];
			echo '<br>';
		}

	?>

</div>

<?php
	include ("footer.php");
?>
