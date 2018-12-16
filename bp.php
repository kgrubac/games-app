
<?php

$GLOBALS['bp'] = null;

$GLOBALS['uzrast_id'] = 0;

function otvoriBP() {

	$GLOBALS['bp'] = new mysqli ('127.0.0.1', 'iwa_2015','foi2015', 'iwa_2015_zb_projekt') or die ("Neuspjelo spajanje na bazu");
	mysqli_set_charset($GLOBALS['bp'], 'utf8mb4');
}

function provjeri($kor_ime,$lozinka) {

	$rj = $GLOBALS['bp']->query("SELECT korisnik_id, tip_id, ime, prezime FROM korisnik WHERE korisnicko_ime='$kor_ime' AND lozinka = '$lozinka'");

	if ($rj->num_rows > 0) {

		list ($id, $tip, $ime, $prezime) = mysqli_fetch_array($rj);

		session_start();

		$_SESSION['ak'] = $kor_ime;
		$_SESSION['ak_ime'] = $ime ." ". $prezime;
		$_SESSION['ak_id'] = $id;
		$_SESSION['ak_tip'] = $tip;

		return true;
	}

	else {

		return false;
	} 

}

function zatvoriBP() {

	mysqli_close($GLOBALS['bp']);
}

?>