<?php

include ("header.php");
include ("bp.php");

?>

<div class="azurirajigra">

	<h1>Uredi igru</h1>

	<?php

		otvoriBP();

		$igraid = $_POST['azuriraj'];
			
		$rj = $GLOBALS['bp'] -> query("SELECT igra.naziv AS inaziv, igra.opis AS iopis, igra.slika, igra.video, igra.igra_id, uzrast.uzrast_id, uzrast.naziv FROM igra LEFT JOIN uzrast ON igra.uzrast_id = uzrast.uzrast_id WHERE igra.igra_id = '$igraid'"); 

		$podaci = $rj->fetch_assoc(); 

		$id = $podaci['igra_id'];


		$rez = $GLOBALS['bp'] -> query('SELECT * FROM uzrast');


		echo '<form method = "post" action = "azurirajigra2.php">';

			echo '<input type = "hidden" name = "id" value = "'.$id.'">';

			echo '<p>Kategorija:</p>';
			echo '<select name = "uzrast">';

						echo '<option value = "'.$podaci['uzrast_id'].'">'.$podaci['naziv'].'</option>';
						
						while ($p = $rez->fetch_assoc()) {

							if ($podaci['uzrast_id'] != $p['uzrast_id']) {

							echo '<option value = "'.$p['uzrast_id'].'">'.$p['naziv'].'</option>';
							}
						}

			echo '</select>';
			
			echo '<p>Naziv:</p>';
			echo '<input type= "text" name="naziv" value="'.$podaci['inaziv'].'"">';

			echo '<p>Opis:</p>';
			echo '<textarea name="opis" rows="20" cols="40">'.$podaci['iopis'].'</textarea>';

			echo '<p>Slika:</p>';
			echo '<input type= "text" name="slika" value="'.$podaci['slika'].'"><br><br>';

			echo '<p>Video:</p>';
			echo '<input type= "url" name="video" value="'.$podaci['video'].'"><br><br>';

			echo '<input type = "submit" value = "Ažuriraj">';

		echo '</form>';

	?>
						
</div>

<?php

include ("footer.php");

?>