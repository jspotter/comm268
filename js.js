/* Handle click events on puzzle image. */
function onImageClick(event, differences, offset) {
	// Get coordinates relative to image placement
	var x = event.pageX - $("#testimage").offset().left;
	var y = event.pageY - $("#testimage").offset().top;
	console.log("(" + x + ", " + y + ")");

	// Look through each difference to see if the click matters
	var foundSomething = false;
	for (var diff in differences) {
		var diffInfo = differences[diff];

		// Check the x and y of the click to see if it is inside
		// one of the differences
		if (((x <= diffInfo["maxX"] && x >= diffInfo["minX"]) || 
				(x <= diffInfo["maxX"] + offset &&
				x >= diffInfo["minX"] + offset)) && 
				y <= diffInfo["maxY"] && y >= diffInfo["minY"]) {

			// Whoops, we already found this one
			if (diffInfo["found"]) {
				alert("You already found the " + diff + ".");
			}
			
			// Didn't find this one yet, so mark it as found
			else {
				console.log("Found the " + diff + ".");
				differences[diff]["found"] = true;
				var others = $("#status").html();
				if ($.trim(others).length > 0)
					$("#status").html(others + ", " + diff);
				else
					$("#status").html(others + diff);

				var thingsLeft = parseInt($("#thingsLeft").html());
				$("#thingsLeft").html(thingsLeft - 1);
			}

			foundSomething = true;
			break;
		}
	}

	if (!foundSomething) {
		alert("Nothing there!");
	}
}
