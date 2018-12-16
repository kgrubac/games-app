<?php

include ("bp.php");
	

include ("header.php");

?>

<form method="post" action="login.php">

<div class="prijava">

<div class="prijava1">

	<p1><b>Korisničko ime:</b> <input type="text" name="username" required='Unesi korisničko ime' autocomplete="on"></p1>
	<br><br>
	<p2><b>Lozinka:</b> <input type="password" name="password" required='Unesi lozinku' pattern="[A-Za-z0-9]{3,}"></p2>
	<br><br>
	<p3><input type="submit" name="potvrdi" value="Potvrdi"></p3>

	<?php

		if (isset($_POST['username']))	{


			$kor_ime = $_POST['username'];
			$lozinka = $_POST['password'];

			otvoriBP();

			if (provjeri($kor_ime,$lozinka) == true) {

				switch($_SESSION['ak_tip']) {

					case 2: 
						header ("Location:index.php");
					break;

					case 1: 
						header ("Location:moderator.php");
					break;

					case 0: 
						header ("Location:admin.php");
					break;
				}

			}

			else {

				echo '<p4><br><br>Korisnik ne postoji!</p4>';
			}
				
		}

	?>

</div>

</form>

<div class="prijava2">

	<img src= "login.png">

</div>

</div>

<?php

	include ("footer.php");
?>