<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>

	<div>
		<a href="vkladani.php"><button>Vkladani vozidel do database</button></a>&nbsp;
		<a href="prehled.php"><button>Prehled vozidel v databazi</button></a>&nbsp;
		<a href="vyhledavanni.php"><button>Vyhledani vozidel v databazi</button></a>&nbsp;
	</div>

	<?php
	if (!($con = mysqli_connect("localhost", "host2", "kojeneckavoda", "databaze_vozidel"))) {	
		die("Nelze se připojit k databázovému serveru!</body></html>");
	}
	mysqli_query($con, "SET NAMES 'utf8'");

	if (!($vysledek = mysqli_query($con, "SELECT * FROM vozidla"))) {
		die("Nelze provést dotaz 1.</body></html>");
	}
	?>

	<h1>Vypis database aut</h1>
	<table border="1 solid black">
		<?php
		while ($radek = mysqli_fetch_array($vysledek)) {
		?>
			
			<tr>
				<td><?php echo "SPZ : " .  htmlspecialchars($radek["spz"]); ?></td>
				<td><?php echo "Znacka : " .  htmlspecialchars($radek["znacka"]); ?></td>
				<td><?php echo "Typ : " .  htmlspecialchars($radek["typ"]); ?></td>
				<td><?php echo "Popis : " .  htmlspecialchars($radek["popis"]); ?></td>
			</tr>
		<?php
		}
		?>
	</table>
	<?php
	mysqli_free_result($vysledek);
	mysqli_close($con);
	?>
</body>
</html>