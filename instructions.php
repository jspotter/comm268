<?php
	$next = $_GET["next"];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body>
		<div class="instructions">
			<?php
				if ($next == "merman" ||
				    $next == "piglet" ||
						$next == "shells" ||
						$next == "smurf") {
			?>
					<h1>
						Spot The Difference
					</h1>
					<h3>
						You will have 2 minutes to spot the number of 
						differences listed in the upper left hand corner. 
						You can click on a difference you have found in 
						either the photo on the left or the photo on the 
						right. When you have clicked on a difference, the 
						item you have found will be listed at the bottom. 
						Once 2 minutes have passed or you have found as 
						many differences as possible for that photo set, 
						you will automatically move on to the next test.
					</h3>
			<?php
				} else if ($next == "baseball" ||
				           $next == "foxandstork" ||
									 $next == "frog" ||
									 $next == "funatthefair") {
			?>
					<h1>
						Hidden Pictures
					</h1>
					<h3>
						You will have 2 minutes to find the objects listed 
						below the photo. Click on a hidden object you have 
						found. When you have clicked on a hidden object, 
						the item you have found will be listed at the bottom. 
						Once 2 minutes have passed or you have found as many 
						hidden objects as possible for that photo, you will 
						automatically move on to the next test.  
					</h3>
			<?php
				} else if ($next == "whocheated") {
			?>
					<h1>
						Video: Who Cheated?
					</h1>
					<h3>
						Watch the video giving special attention to what was asked in the instructions at the beginning. You will be asked to answer those questions at the end.
					</h3>
			<?php
				} else if ($next == "cardtrick") {
			?>
					<h1>
						Video: Card Counting
					</h1>
					<h3>
						Watch the video giving special attention to what was asked in the instructions at the beginning. You will be asked to answer those questions at the end.
					</h3>

			<?php
				} else if ($next == "whodunit") {
			?>
					<h1>
						Video: Whodunit
					</h1>
					<h3>
						Watch the video closely. Pay attention to the details of the investigation.
					</h3>
			<?php
				} else if ($next == "dodson") {
			?>
					<h1>
						Video: Exclamation Points
					</h1>
					<h3>
						Watch the video giving special attention to what was asked in the instructions at the beginning. You will be asked to answer those questions at the end.
					</h3>
			<?php
				} else if ($next == "end") {
			?>
					<h1>
						You're All Done!
					</h1>
					<h3>
						Thanks for helping us with our experiment!
					</h3>
			<?php
				}
			?>
			<br>
			<?php
				if ($next != "end") {
			?>
					<input class="button" type="submit" value="Continue >>"
						onclick="window.location='<?= $next ?>.html';">
			<?php
				}
			?>
		</div>
	</body>
</html>
