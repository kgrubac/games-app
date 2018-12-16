<?php
	include ("header.php");
	include ("bp.php");
?>

<div class="moderator">

	<h1>Moderator</h1>

	<a href="novaigra.php"><p>Dodaj novu igru</p></a>

	<a href="igre.php"><p>Ažuriraj/Obriši igru</p></a>

	<h2>Popis mojih kategorija:</h2>

	<?php

		otvoriBP();

		$sql = $GLOBALS['bp']->query('SELECT * FROM uzrast');

		echo '<form method = "post">';

			echo '<select name = "kategorije">';

					echo '<option selected hidden>Odaberi kategoriju</option>';

					while ($pod = $sql->fetch_assoc()) {

						if ($_SESSION["ak_id"] == $pod['moderator_id']) {

							echo '<option value = "'.$pod['uzrast_id'].'">'.$pod['naziv'].'</option>';
						}

					}

					echo '<input type = "Submit" name "Pretraži">';

			echo '</select>';

		echo "</form>";	
		
		if (isset($_POST['kategorije'])) {

			echo '<p>Igre</p><br>';

				$uzr = $_POST['kategorije'];

				$rj = $GLOBALS['bp']->query("SELECT * FROM igra WHERE igra.uzrast_id = '$uzr' ");

				while ($podaci = $rj->fetch_assoc()) {

					echo $podaci['naziv']; 
					echo '<br>';
				}

			echo '<p>Pretplaceni korisnici:</p>';

				$rez = $GLOBALS['bp']->query("SELECT * FROM korisnik JOIN pretplata ON korisnik.korisnik_id = pretplata.korisnik_id WHERE pretplata.pretplacen = 1 ");

					while ($p = $rez->fetch_assoc()) {

						if ($uzr == $p['uzrast_id']) {

							echo $p['ime'];
							echo ' '; 
							echo $p['prezime'];
							echo '<br>';
						}
					}
		}
		
	?>

</div>

<?php
	include ("footer.php");
?>
