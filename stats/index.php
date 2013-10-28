<?php
	include_once("../dbfuncs.php");
	include("./sqlconnect.php");
	$result = executeQuery($db, "select * from Data;");
	$result2 = executeQuery($db, "select * from Video;");
	include("../sqldisconnect.php");
?>

<html>
	<head>
	</head>
	<body>
		<h3>
			Overall Results
		</h3>
		<p>This table includes results from both highlights puzzles and video quizzes.</p>
		<table border="1px solid black">
			<tr>
				<th>SUNet ID</th>
				<th>Puzzle</th>
				<th>Seconds Taken</th>
				<th>Clicks/Questions</th>
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
		<br>
		<h3>
			Video Quiz Results
		</h3>
		<p>This table includes question-level results for each video quiz.</p>
		<table border="1px solid black">
			<tr>
				<th>SUNet ID</th>
				<th>Puzzle</th>
				<th>Question ID</th>
				<th>Answer</th>
				<th>Correct?</th>
			</tr>
			<?php
				foreach ($result2 as $row) {
			?>
					<tr>
						<td><?= $row["sunetid"] ?></td>
						<td><?= $row["puzzle"] ?></td>
						<td><?= $row["question"] ?></td>
						<td><?= $row["answer"] ?></td>
						<td><?= ($row["correct"] == "1" ? "correct" : "incorrect") ?></td>
					</tr>
			<?php
				}
			?>
		<table>
	</body>
</html>
