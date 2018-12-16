<?php
	include ('bp.php');
	include ("header.php");
?>

<div class="kor">

	<table cellspacing="0">

		<tr>
		<th>Ime</th>
		<th>Prezime</th>
		<th>E-mail</th>
		<th>Status</th>
		<th>Slika</th>

		<?php

			if ($_SESSION['ak_tip'] == 0){

				echo '<th></th>';
				echo '<th></th>';	
			}
		?>

		</tr>

		<?php

			otvoriBP();

			$rj = $GLOBALS['bp'] -> query('SELECT * FROM korisnik');

			while ($podaci = $rj->fetch_assoc()) {

					echo '<tr>';
					echo '<td id = "ime">' .$podaci['ime']. '</td>';
					echo '<td id = "prez">' .$podaci['prezime']. '</td>';
					echo '<td>' .$podaci['email']. '</td>';

					if ($podaci['tip_id'] == 0) {
					echo "<td>Administrator</td>";
					}

					if ($podaci['tip_id'] == 1){
					echo "<td>Voditelj</td>"; 
					}

					if ($podaci['tip_id'] == 2) {
					echo "<td>Korisnik</td>";
					}  

					echo '<td>' .'<img src = "'.$podaci['slika'].'" width = 10%; >'. '</td>';
					if ($_SESSION['ak_tip'] == 0){

						echo '<form method = "post" action = "azuriraj.php">';
						echo '<input type = "hidden" name= "azuriraj" value= "'.$podaci['korisnik_id'].'">';
						echo '<td><input type = "Submit" name = "update" value = "Ažuriraj"></td>';
						echo '</form>';

						echo '<form method = "post" action = "obrisi.php">';
						echo '<input type = "hidden" name= "Obriši" value= "'.$podaci['korisnik_id'].'">';
						echo '<td><input type = "Submit" name= "delete" value = "Obriši"></td>';
						echo '</form>';
					}
					echo '</tr>';

					}
		?>

	</table>

</div>

<?php
	include ("footer.php");
?>