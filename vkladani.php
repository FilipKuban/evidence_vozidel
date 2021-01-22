<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vkladani vozidel</title>
</head>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<!--Menu-->
	<div class="telo">
        <div class="telo2">
        <div>
		<a href="vkladani.php"><button>Vkladani vozidel do database</button></a>&nbsp;
		<a href="prehled.php"><button>Prehled vozidel v databazi</button></a>&nbsp;
		<a href="vyhledavani.php"><button>Vyhledani vozidel v databazi</button></a>&nbsp;
	</div>

	<!--Vlozeni dat-->
	<?php
	if (!($con = mysqli_connect("localhost", "host2", "kojeneckavoda", "databaze_vozidel"))) {	//navazani spojeni
		die("Nelze se připojit k databázovému serveru!</body></html>");
	} else {
		mysqli_query($con, "SET NAMES 'utf8'");
		if (isset($_POST["odesli"])) {
			if (($_POST["spz"] != "") && ($_POST["znacka"] != "") && ($_POST["typ"] != "") && ($_POST["popis"] != "")) {	//osetreni nacteni stranky

				if (mysqli_query(
					$con,
					"INSERT INTO vozidla(spz, znacka, typ, popis) VALUES('" .	//vlozeni do DB
						addslashes($_POST["spz"]) . "', '" .
						addslashes($_POST["znacka"]) . "', '" .
						addslashes($_POST["typ"]) . "', '" .
						addslashes($_POST["popis"]) . "')"
				)) {
					ob_start();
					echo "<strong>Úspěšně vloženo.</strong>";
					header("Refresh: 3; vkladani.php");
					ob_end_flush();
				}
			} else {
				ob_start();
				echo "<strong>Nevloženo.</strong>";
				header("Refresh: 3; vkladani.php");
				ob_end_flush();
			}
		}
	}
	?>

	<!--Formular-->
	<h3>Vkladani noveho vozidla</h3>
	<form method="POST" action="vkladani.php">
		<input type="text" name="spz" placeholder="spz" id="spzID"><label for="spzID">Vlozte SPZ auta.</label><br>
		<input type="text" name="znacka" placeholder="vyrobce" id="znackaID"><label for="znackaID">Vlozte znacku vyrobce auta.</label><br>
		<input type="text" name="typ" placeholder="typ" id="typID"><label for="typID">Vlozte typ auta.</label><br>
		<textarea name="popis" cols="20" rows="5" placeholder="popis" id="popisID"></textarea><label for="popisID">Vlozte SPZ auta.</label><br>
		<input type="submit" value="Vlozit" name="odesli">
	</form>

	<?php
	mysqli_close($con);
	?>
        </div>
   
    </div>
</body>
</html>
</body>
</html>