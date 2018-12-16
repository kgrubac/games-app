<?php

include ("header.php");
include ("bp.php");

?>

<div class="azurirajkat">

	<h1>Uredi kategoriju</h1>

	<?php

		otvoriBP();

		$rez = $GLOBALS['bp']->query('SELECT * FROM uzrast');
			
		echo '<form method = "post" action = "">';

			echo '<select name = "kategorije">';
					echo '<option selected hidden>Odaberi kategoriju</option>';

					while ($pod = $rez->fetch_assoc()) {

					echo '<option value = "'.$pod['uzrast_id'].'">'.$pod['naziv'].'</option>';
					}

					echo '<input type = "Submit" name "Pretraži">';

			echo '</select>';

		echo "</form>";	
		
				if (isset($_POST['kategorije'])) {

					$id = $_POST['kategorije'];

					$rj = $GLOBALS['bp']->query("SELECT * FROM uzrast LEFT JOIN korisnik ON korisnik.korisnik_id = uzrast.moderator_id WHERE uzrast.uzrast_id = '$id'");

					$p = $rj->fetch_assoc();

					$rez = $GLOBALS['bp']->query("SELECT * FROM korisnik WHERE korisnik.tip_id = '1'");

					echo "<p>Ako ste pogrešno odabrali kategoriju, ovdje možete ponoviti svoj odabir!</p>";
					echo "<hr/>";

					echo '<form method = "post" action = "azurirajkat2.php">';

						echo '<input type = hidden name = "katid" value = "'.$id.'">';

						echo '<p>Naziv:</p>';
						echo '<input type = "text" name = "naziv" value = "'.$p['naziv'].'">';

						echo '<p>Opis:</p>';
						echo '<input type = "text" name = "opis" value = "'.$p['opis'].'">';

						echo '<p>Moderator:</p>';
						echo '<select name = "moderator">';

							echo '<option value = "'.$p['moderator_id'].'">'.$p['korisnicko_ime'].'</option>';
							
							 while ($pod = $rez->fetch_assoc()) {

							 	if ($pod['korisnik_id'] != $p['korisnik_id']) {

									echo '<option value = "'.$pod['korisnik_id'].'">'.$pod['korisnicko_ime'].'</option>';
								}
							}

						echo '</select> <br><br>';

						echo '<input type = "Submit" value = "Ažuriraj">';

					echo '</form>';

				}
	?>

</div>

<?php

include ("footer.php");

?>

