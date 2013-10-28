<?php
	$puzzle = $_GET["puzzle"];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css">
		<script type="text/javascript" src="js.js"></script>
	</head>
	<body>
		<form method="POST" action="videosubmit.php">
			<input type="hidden" name="puzzle" value="<?= $puzzle ?>"></input>
			<?php
				if ($puzzle == "whocheated") {
			?>
				<h3>Which of the following changes occurred in the video?</h3>
				<input name="whocheated_1" type="hidden" value="0">
				<input name="whocheated_1" type="checkbox" value="1">
					The flag in the far left corner changed direction.
				</input>
				<br>
				<input name="whocheated_2" type="hidden" value="0">
				<input name="whocheated_2" type="checkbox" value="1">
					The clock in the far left corner was taken away.
				</input>
				<br>
				<input name="whocheated_3" type="hidden" value="0">
				<input name="whocheated_3" type="checkbox" value="1">
					The window in the far left corner was uncovered.
				</input>
				<br>
				<input name="whocheated_4" type="hidden" value="0">
				<input name="whocheated_4" type="checkbox" value="1">
					Somebody pooped in the far left corner.
				</input>
				<br>
				<input name="whocheated_5" type="hidden" value="0">
				<input name="whocheated_5" type="checkbox" value="1">
					New students replaced the students on the left side of the room.
				</input>
				<br>
				<input name="whocheated_6" type="hidden" value="0">
				<input name="whocheated_6" type="checkbox" value="1">
					The students on the left side of the room traded seats with each other.
				</input>
				<br>
				<input name="whocheated_7" type="hidden" value="0">
				<input name="whocheated_7" type="checkbox" value="1">
					New students replaced the students on the right side of the room.
				</input>
				<br>
				<input name="whocheated_8" type="hidden" value="0">
				<input name="whocheated_8" type="checkbox" value="1">
					The students on the right side of the room traded seats with each other.
				</input>
				<br>
				<input name="whocheated_9" type="hidden" value="0">
				<input name="whocheated_9" type="checkbox" value="1">
					A new student appeared in the far right corner.
				</input>
				<br>
				<input name="whocheated_10" type="hidden" value="0">
				<input name="whocheated_10" type="checkbox" value="1">
					A flag appeared in the far right corner.
				</input>
				<br>
				<input name="whocheated_11" type="hidden" value="0">
				<input name="whocheated_11" type="checkbox" value="1">
					A plant appeared in the far right corner.
				</input>
				<br>
				<input name="whocheated_12" type="hidden" value="0">
				<input name="whocheated_12" type="checkbox" value="1">
					A chicken appeared in the far right corner.
				</input>
				<br>
			<?php
				} else if ($puzzle == "dodson") {
			?>
				<h3>How many exclamation marks did you count?</h3>
				<input name="dodson_text_1" type="text"></input>
				<br>
				<h3>Which of the following changes occurred in the video?</h3>
				<input name="dodson_1" type="hidden" value="0">
				<input name="dodson_1" type="checkbox" value="1">
					Jason's sunglasses came off.
				</input>
				<br>
				<input name="dodson_2" type="hidden" value="0">
				<input name="dodson_2" type="checkbox" value="1">
					Jason put on a hat.
				</input>
				<br>
				<input name="dodson_3" type="hidden" value="0">
				<input name="dodson_3" type="checkbox" value="1">
					The writing on the whiteboard changed.
				</input>
				<br>
				<input name="dodson_4" type="hidden" value="0">
				<input name="dodson_4" type="checkbox" value="1">
					The whiteboard got erased.
				</input>
				<br>
				<input name="dodson_5" type="hidden" value="0">
				<input name="dodson_5" type="checkbox" value="1">
					The time on the clock moved backwards.
				</input>
				<br>
				<input name="dodson_6" type="hidden" value="0">
				<input name="dodson_6" type="checkbox" value="1">
					Jason's shirt changed colors.
				</input>
				<br>
				<input name="dodson_7" type="hidden" value="0">
				<input name="dodson_7" type="checkbox" value="1">
					A puppet appeared in the top left corner.
				</input>
				<br>
			<?php
				} else if ($puzzle == "whodunit") {
			?>
				<h3>Which of the following changes occurred in the video?</h3>
				<input name="whodunit_1" type="hidden" value="0">
				<input name="whodunit_1" type="checkbox" value="1">
					The flower arrangement on the table changed colors.
				</input>
				<br>
				<input name="whodunit_2" type="hidden" value="0">
				<input name="whodunit_2" type="checkbox" value="1">
					The clocks on the wall changed times.
				</input>
				<br>
				<input name="whodunit_3" type="hidden" value="0">
				<input name="whodunit_3" type="checkbox" value="1">
					The tablecloth changed to a new design.
				</input>
				<br>
				<input name="whodunit_4" type="hidden" value="0">
				<input name="whodunit_4" type="checkbox" value="1">
					The inspector changed his hat and his coat.
				</input>
				<br>
				<input name="whodunit_5" type="hidden" value="0">
				<input name="whodunit_5" type="checkbox" value="1">
					The maid changed her outfit.
				</input>
				<br>
				<input name="whodunit_6" type="hidden" value="0">
				<input name="whodunit_6" type="checkbox" value="1">
					The man on the floor (the dead man) changed to a different person.
				</input>
				<br>
				<input name="whodunit_7" type="hidden" value="0">
				<input name="whodunit_7" type="checkbox" value="1">
					The butler changed to a different weapon.
				</input>
				<br>
				<input name="whodunit_8" type="hidden" value="0">
				<input name="whodunit_8" type="checkbox" value="1">
					The bear in the right hand corner changed to a knight.
				</input>
				<br>
				<input name="whodunit_9" type="hidden" value="0">
				<input name="whodunit_9" type="checkbox" value="1">
					The chandelier changed from the center of the room to the left side of the room.
				</input>
				<br>
			<?php
				} else if ($puzzle == "cardtrick") {
			?>
				<h3>How many red cards were dealt?</h3>
				<input name="cardtrick_text_1" type="text"></input>
				<h3>What did the message written on the back of some of the cards say?</h3>
				<textarea name="cardtrick_text_2"></textarea>
			<?php
				}
			?>
			<br>
			<input class="button" type="submit" value="Continue >>"></input>
		</form>
	</body>
</html>
