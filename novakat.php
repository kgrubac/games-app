<?php

include "header.php";
include "bp.php";

?>

<div class="novakat">

	<h1>Nova kategorija</h1>

	<form method="post" action = "novakat.php">

		<?php

		otvoriBP();

		$rj = $GLOBALS['bp']->query('SELECT * FROM korisnik');

		echo '<form method="post" action = "novakat.php">';

			echo '<p>Naziv kategorije:</p>';
			echo '<input type="text" name="naziv" required="Unesi naziv kategorije">';

			echo '<p>Opis kategorije:</p>';
			echo '<textarea name="opis" required="Unesi opis kategorije" rows="10" cols="20"></textarea>';

			echo '<p>Voditelj kategorije:</p>';

			while($voditelj = $rj->fetch_assoc()) {
				if($voditelj['tip_id'] == 1) {
					echo '<input type="radio" name="voditelj" value="'.$voditelj['korisnik_id'].'">'.$voditelj['ime']." ".$voditelj['prezime'].'<br>';
				}				
			}

			echo '<br><input type = "Submit" name= "dodaj" value = "Dodaj">';
			
		echo '</form>';

		if (isset($_POST['naziv'])) {

			$naziv = $_POST['naziv'];
			$opis = $_POST['opis'];
			$voditelj = $_POST['voditelj'];

			$rez = $GLOBALS['bp']->query("INSERT INTO uzrast (moderator_id, naziv, opis) VALUES ('$voditelj','$naziv','$opis')");

			header ("Location:igre.php");			
		}

		?>

</div>

<?php

include "footer.php"

?>