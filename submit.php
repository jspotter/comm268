<?php
	include_once("stanford.person.php");
	$person = StanfordPerson::get_current_user();
	$id = $person->get_sunetid();

	include("sqlconnect.php");
	include_once("dbfuncs.php");

	$whitelist = array("amberr", "kbaldoni", "sm", "jimywang", "jspotter", "agleason");

	$puzzle = $_POST["puzzle"];
	$time = $_POST["time"];
	$clicks = $_POST["clicks"];
	$correct = $_POST["correct"];

	$query = "select * from Data where sunetid='" . $id
		. "' and puzzle='" . $puzzle . "';";
	$result = executeQuery($db, $query);
	if (count($result) > 0) {
		if (in_array($id, $whitelist)) {
			$stmt = "update Data set time=" . $time . ", clicks=" . $clicks
				. ", correct=" . $correct . " where sunetid='" . $id
				. "' and puzzle='" . $puzzle . "';";
			executeQuery($db, $stmt);
		} else {
			echo "NO good.";
		}
	} else {
		$stmt = "insert into Data values (NULL, '" . $id . "', '" . $puzzle . "', "
			. $time . ", " . $clicks . ", " . $correct . ");";
		executeQuery($db, $stmt);
	}

	include("sqldisconnect.php");
?>
