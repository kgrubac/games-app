<?php
	include ('bp.php');
	include ("header.php");
?>

<div class="kategorije">

	<p>Kategorije</p>

	<?php

		otvoriBP();

		$sql = $GLOBALS['bp']->query('SELECT * FROM uzrast');

		echo '<form method = "get">';

			echo '<select name = "kategorije">';

					echo '<option selected hidden>Odaberi kategoriju</option>';

					while ($pod = $sql->fetch_assoc()) {

					echo '<option value = "'.$pod['uzrast_id'].'">'.$pod['naziv'].'</option>';
					}

					echo '<input type = "Submit" name "Pretraži">';

			echo '</select>';

		echo "</form>";	

				if (isset($_GET['kategorije'])) {

					$id = $_GET['kategorije'];
					

					$rj = $GLOBALS['bp']->query('SELECT * FROM uzrast JOIN igra ON uzrast.uzrast_id = igra.uzrast_id WHERE igra.uzrast_id = "'.$id.'" ORDER BY igra.datum, igra.vrijeme ASC');

					echo '<div class = "igre">';

						echo '<div class = "katbtn">';

						echo '<table>';
		
							echo'<tr>';
								echo'<th>Ime</th>';

								if ($_SESSION['ak_id'] >= 1) {

									echo'<th id="opis">Opis</th>';
									echo'<th>Datum</th>';
									echo'<th>Vrijeme</th>';
									echo'<th id="slika">Slika</th>';
									echo'<th>Video</th>';
								}

							echo'</tr>';
							
							while ($podaci = $rj->fetch_assoc()) {

								echo '<tr>';
									echo '<td id="naziv">' .$podaci['naziv']. '</td>';

									if ($_SESSION['ak_id'] >= 1) {

										echo '<td>' .$podaci['opis']. '</td>';																		
										echo '<td>' .$podaci['datum']. '</td>';
										echo '<td>' .$podaci['vrijeme']. '</td>';
										echo '<td>' .'<img src = "'.$podaci['slika'].'" width = 110%; >'. '</td>';

										if ($podaci['video'] == !null) {

											echo '<td> <video width="40" height="30" controls><source src="'.$podaci['video'].'"type="video/mp4"</video></td>';
										}

										else {

											echo '<td>-</td>';
										}

									}

									if ($_SESSION['ak_tip'] == 1) {

											if ($_SESSION['ak_id'] == $podaci['moderator_id']) {

												echo '<form method = "post" action = "azurirajigra.php">';
												echo '<input type = "hidden" name= "azuriraj" value= "'.$podaci['igra_id'].'">';
												echo '<td><input type = "submit" name = "update" value = "Ažuriraj"></td>';
												echo '</form>';

												echo '<form method = "post" action = "obrisiigru.php">';
												echo '<input type = "hidden" name= "Obriši" value= "'.$podaci['igra_id'].'">';
												echo '<td><input type = "submit" name= "delete" value = "Obriši"></td>';
												echo '</form>';
											}
									}
 
								echo '<tr>';
							}

						echo'</table>';

						echo '</div>';

						if ($_SESSION['ak_tip'] == 2) {

							$korid = $_SESSION['ak_id'];

							$r = $GLOBALS['bp']->query("SELECT DISTINCT (korisnik.korisnik_id) FROM korisnik, pretplata
														WHERE (korisnik.korisnik_id = pretplata.korisnik_id AND pretplata.uzrast_id = '$id'
														AND  pretplata.pretplacen = 0) OR korisnik.korisnik_id not in(
														SELECT korisnik_id FROM pretplata WHERE uzrast_id = '$id'
														AND pretplacen = 1)");

							while ($p = $r->fetch_assoc()) {

								if ($p['korisnik_id'] == $korid) {

									$k = $p['korisnik_id'];
								}
														
							}

							$r1 = $GLOBALS['bp']->query("SELECT pretplacen FROM pretplata WHERE korisnik_id = '$korid' AND uzrast_id = '$id'");

									$p1 = $r1->fetch_assoc();


								if ($k == $korid) {

									echo '<form method = "post" action ="pretplati.php">';
												echo '<input type = "hidden" name = "kor_id" value = "'.$korid.'">';
												echo '<input type = "hidden" name = "uzrast_id" value = "'.$id.'">';
												echo '<input type = "hidden" name = "pretplacen" value = "'.$p1['pretplacen'].'">';
												echo '<td><input type = "submit" name = "pretplati" value = "Pretplati se!"></td>';
									echo '</form>';

										
								}

								else {

										echo '<form method = "post" action ="odjavipretplatu.php">';
											echo '<input type = "hidden" name = "kor_id" value = "'.$korid.'">';
											echo '<input type = "hidden" name = "uzrast_id" value = "'.$id.'">';
											echo '<input type = "hidden" name = "pretplacen" value = "'.$p1['pretplacen'].'">';
											echo '<td><input type = "submit" name = "odjavi" value = "Odjavi se!"></td>';
										echo '</form>';
										
								} 
						}

					echo'</div>';

				}
		?>

</div>

<?php
	include ("footer.php");
?>
