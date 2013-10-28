<?php
	include_once("stanford.person.php");
	$person = StanfordPerson::get_current_user();
	$id = $person->get_sunetid();

	include("sqlconnect.php");
	include_once("dbfuncs.php");

	$CORRECT_ANSWERS = array(
		"whocheated_1" => "1",
		"whocheated_2" => "0",
		"whocheated_3" => "0",
		"whocheated_4" => "0",
		"whocheated_5" => "1",
		"whocheated_6" => "0",
		"whocheated_7" => "0",
		"whocheated_8" => "1",
		"whocheated_9" => "0",
		"whocheated_10" => "0",
		"whocheated_11" => "0",
		"whocheated_12" => "1",

		"dodson_text_1" => "22",
		"dodson_1" => "0",
		"dodson_2" => "1",
		"dodson_3" => "0",
		"dodson_4" => "0",
		"dodson_5" => "1",
		"dodson_6" => "0",
		"dodson_7" => "0",

		"whodunit_1" => "1",
		"whodunit_2" => "0",
		"whodunit_3" => "1",
		"whodunit_4" => "1",
		"whodunit_5" => "0",
		"whodunit_6" => "1",
		"whodunit_7" => "1",
		"whodunit_8" => "1",
		"whodunit_9" => "0",

		"cardtrick_text_1" => "15",
		"cardtrick_text_2" => "The truth is in the details. Watch closely."
	);

	$puzzle = $_POST["puzzle"];

	function grade($db, $answers, $puzzle_name, $correct_answers, $student_id) {
		$num_correct = 0;
		$total = 0;
		foreach (array_keys($answers) as $question) {
			if ($question != "puzzle") {
				$total++;
				$is_correct = ($answers[$question] == $correct_answers[$question]);
				if ($is_correct) $num_correct++;
				$stmt = "insert into Video values(NULL, '" . $student_id . "', '" . $puzzle_name . "', '"
					. $question . "', '" . $answers[$question] . "', " . ($is_correct ? "1" : "0")
					. ");";
				executeQuery($db, $stmt);
			}
		}

		$stmt = "insert into Data values(NULL, '" . $student_id . "', '" . $puzzle_name . "', 0, "
			. $total . ", " . $num_correct . ");";
		executeQuery($db, $stmt);
	}

	$whitelist = array("amberr", "kbaldoni", "sm", "jimywang", "jspotter", "agleason");

	$query = "select * from Video where sunetid='" . $id
		. "' and puzzle='" . $puzzle . "';";
	$result = executeQuery($db, $query);
	$query2 = "select * from Data where sunetid='" . $id
		. "' and puzzle='" . $puzzle . "';";
	$result2 = executeQuery($db, $query2);
	if (count($result) > 0 or count($result2) > 0) {
		if (in_array($id, $whitelist)) {
			$stmt = "delete from Video where sunetid='" . $id
				. "' and puzzle='" . $puzzle . "';";
			executeQuery($db, $stmt);
			$stmt2 = "delete from Data where sunetid='" . $id
				. "' and puzzle='" . $puzzle . "';";
			executeQuery($db, $stmt2);
			grade($db, $_POST, $puzzle, $CORRECT_ANSWERS, $id);
		} else {
			echo "NO good.";
		}
	} else {
		grade($db, $_POST, $puzzle, $CORRECT_ANSWERS, $id);
	}

	include("sqldisconnect.php");
?>

<script type="text/javascript" src="js.js"></script>
<script type="text/javascript">
	window.location = "instructions.php?next=" + next_page["<?= $puzzle ?>"];
</script>

