<?php

include ("header.php");
include ("bp.php");
		
?>

<div class="azuriraj">

	<h1>Uredi korisnika</h1>

	<?php

		otvoriBP();
	
		$rj = $GLOBALS['bp'] -> query('SELECT * FROM korisnik LEFT JOIN tip_korisnika ON korisnik.tip_id = tip_korisnika.tip_id WHERE korisnik.korisnik_id = "'.$_POST['azuriraj'].'"');

		$podaci = $rj->fetch_assoc(); 

		$id = $podaci['korisnik_id'];

		$rez = $GLOBALS['bp'] -> query('SELECT * FROM tip_korisnika');

		echo '<form method = "post" action = "azuriraj2.php">';

			echo '<input type = "hidden" name = "id" value = "'.$id.'">';

			echo '<p>Ime:</p>';
			echo '<input type= "text" name="ime" value='.$podaci['ime'].'>';

			echo '<p>Prezime:</p>';
			echo '<input type= "text" name="prezime" value="'.$podaci['prezime'].'">';

			echo '<p>E-mail:</p>';
			echo '<input type= "email" name="email" value="'.$podaci['email'].'">';

			echo '<p>Tip korisnika:</p>';
			
				echo '<select name = "tip">';
					echo '<option value = "'.$podaci['tip_id'].'" selected>'.$podaci['naziv'].'</option>';
					while ($p = $rez->fetch_assoc()) {

						if($podaci['tip_id'] != $p['tip_id']){

							echo '<option value = "'.$p['tip_id'].'">'.$p['naziv'].'</option>';
						}
					}
				echo '</select>';
			
			echo '<p>Slika:</p>';
			echo '<input type = "text" name = "slika" value = "'.$podaci['slika'].'"><br><br>';

			echo '<input type = "hidden" name = "azr" value = "Ažuriraj">';
			echo '<input type = "submit" value = "Ažuriraj">';

		echo '</form>';


	?>
						
</div>

<?php

include ("footer.php");

?>