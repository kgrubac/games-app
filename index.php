<?php

include ("header.php");
include ("bp.php");

?>

<div class="uvod">

	<p> Dobrodošli u Game World! <br><br> 
	Mjesto gdje možete pronaći sve potrebno za Vašu djecu od najranijih uzrasta pa sve do srednjoškolaca. Postanite naš korisnik i pretplatite se za igre primjenjene uzrastu Vašeg djeteta. Uz svaku igru naveden je i kratki opis kako biste pronašli baš onu igru koja odgovara Vašem djetetu. Našim korisnikom možete postati potpuno besplatno u par kratkih koraka, zato učinite to odmah kako bi Vaše dijete dobilo adekvatan sadržaj za svoj uzrast.  </p>

</div>

<?php

		if($_SESSION['ak_tip'] == 2) {

?>

<div class="mojepretplate">

			<p> Moje igre </p>

				<div class="pretplate">

					<?php

						otvoriBP();
						
							$rj = $GLOBALS['bp']->query('SELECT * FROM pretplata JOIN igra ON pretplata.uzrast_id = igra.uzrast_id WHERE pretplata.pretplacen = "1" AND '.$_SESSION['ak_id'].' = pretplata.korisnik_id ORDER BY datum, vrijeme' );
							
							while ($podaci = $rj->fetch_assoc()) {

								echo '<p>' .$podaci['naziv']. '</p>';
								echo '<br>';
							}
						
						
					?>

				</div>

</div>

<?php
}

include("footer.php");

?>
