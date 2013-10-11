/* Handle click events on puzzle image. */
function onImageClick(event, differences, offset) {
	// Get coordinates relative to image placement
	var x = event.pageX - $("#testimage").offset().left;
	var y = event.pageY - $("#testimage").offset().top;
	console.log("(" + x + ", " + y + ")");

	// Look through each difference to see if the click matters
	var foundSomething = false;
	var alreadyFound = "";
	for (var diff in differences) {
		var diffInfo = differences[diff];

		// Check the x and y of the click to see if it is inside
		// one of the differences
		if (((x <= diffInfo["maxX"] && x >= diffInfo["minX"]) || 
				(x <= diffInfo["maxX"] + offset &&
				x >= diffInfo["minX"] + offset)) && 
				y <= diffInfo["maxY"] && y >= diffInfo["minY"]) {

			console.log("something");

			// Whoops, we already found this one
			if (diffInfo["found"]) {
				console.log("already found");
				alreadyFound = diff;
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

				var front_string = "<div class='box' style='left:";
				var back_string = "px; top:" + (diffInfo["minY"] + $("#testimage").offset().top) 
					+ "px; width:"
					+ (diffInfo["maxX"] - diffInfo["minX"]) + "px; height:"
					+ (diffInfo["maxY"] - diffInfo["minY"]) 
					+ "px;' />"
				$("body").append(front_string
					+ (diffInfo["minX"] + $("#testimage").offset().left)
					+ back_string);
				$("body").append(front_string
					+ (diffInfo["minX"] + $("#testimage").offset().left + offset)
					+ back_string);

				foundSomething = true;
				break;
			}
		}
	}

	if (!foundSomething) {
		if (alreadyFound.length != 0) {
			//alert("You already found the " + alreadyFound + ".");
		} else {
			//alert("Nothing there!");
		}
	}
}
