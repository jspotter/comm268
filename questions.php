<?php
	$puzzle = $_GET["puzzle"];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css">
		<script type="text/javascript" src="js.js"></script>
	</head>
	<body>
		Questions for <?= $puzzle ?>
		<br>
		<input class="button" type="submit" value="Continue >>"
			onclick="window.location='instructions.php?next=' + next_page['<?= $puzzle ?>'];">
	</body>
</html>
