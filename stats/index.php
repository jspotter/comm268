<?php
	include_once("../dbfuncs.php");
	include("./sqlconnect.php");
	$result = executeQuery($db, "select * from Data;");
	include("../sqldisconnect.php");
?>

<html>
	<head>
	</head>
	<body>
		<table border="1px solid black">
			<tr>
				<th>SUNet ID</th>
				<th>Puzzle</th>
				<th>Seconds Taken</th>
				<th>Clicks</th>
				<th>Correct</th>
			</tr>
			<?php
				foreach ($result as $row) {
			?>
					<tr>
						<td><?= $row["sunetid"] ?></td>
						<td><?= $row["puzzle"] ?></td>
						<td><?= $row["time"] ?></td>
						<td><?= $row["clicks"] ?></td>
						<td><?= $row["correct"] ?></td>
					</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
