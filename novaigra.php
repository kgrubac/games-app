<?php

include "header.php";
include "bp.php";

	$naziv = 0;
	$opis = 0;
	$uzrast = 0;

	otvoriBP();
			
?>

<div class="novaigra">

	<h1>Nova igra</h1>

	<form method="post" action = "novaigra.php">

			<p>Naziv igre:</p>
			<input type="text" name="naziv" required="Unesi naziv igre">

			<p>Opis igre:</p>
			<textarea name="opis" required="Unesi opis igre" rows="20" cols="40"></textarea>

			<p>Uzrast:</p>

			<?php

			echo '<select name = "kategorije">';

			if ($_SESSION['ak_tip'] == 0) {

				$rj = $GLOBALS['bp']->query('SELECT * FROM uzrast JOIN korisnik ON uzrast.moderator_id = korisnik.korisnik_id');

				while ($uzrast = $rj->fetch_assoc()) {

					echo '<option value = '.$uzrast['uzrast_id'].'>'.$uzrast['naziv'].'</option>';					
				}

			}

			else {

			$rj = $GLOBALS['bp']->query('SELECT * FROM uzrast JOIN korisnik ON uzrast.moderator_id = korisnik.korisnik_id WHERE '.$_SESSION['ak_id'].' = uzrast.moderator_id');

				while ($uzrast = $rj->fetch_assoc()) {

					echo '<option value = '.$uzrast['uzrast_id'].'>'.$uzrast['naziv'].'</option>';
					
				}

			}

			echo '</select>'

			?>

			<p>URL slike:</p>
			<input type="url" name="slika" required="Unesi URL slike">

			<p>Video:</p>
			<input type="url" name="video">

			<br><br>

			<input type="submit" name="pošalji" value="Pošalji">

	</form>

</div>

<?php

if (isset($_POST['naziv'])) {

		$naziv = $_POST['naziv'];
		$opis = $_POST['opis'];
		$uzrast = $_POST['kategorije'];
		$slika = $_POST['slika'];
		$video = $_POST['video'];


		$GLOBALS['bp']->query('INSERT INTO igra (uzrast_id, naziv, opis, slika, video, datum, vrijeme) VALUES ("'.$uzrast.'", "'.$naziv.'","'.$opis.'", "'.$slika.'", "'.$video.'", now(), now())');

		header("location: igre.php");	
}

?>

<?php

include "footer.php";

?>