/* Hack to make sure that "www" appears at start of URL. */
var curr_url = "" + document.URL;
if (curr_url.indexOf("http://stanford") != -1) {
	window.location = "http://www.stanford" + window.location.substring(15);
}

var puzzle = "?";
var clicks = 0;
var correct = 0;
var timeTaken = -1;
var count = 120;	// number of seconds to allow
var counter = 0;

var next_page = {
	"start": "merman",
	"merman": "whocheated",
	"whocheated": "baseball",
	"baseball": "piglet",
	"piglet": "cardtrick",
	"cardtrick": "foxandstork",
	"foxandstork": "shells",
	"shells": "whodunit",
	"whodunit": "frog",
	"frog": "smurf",
	"smurf": "dodson",
	"dodson": "funatthefair",
	"funatthefair": "end"
};

/* Initialize global data for puzzle. */
function init(puzzleName, timeAllowed) {
	if (typeof timeAllowed !== "undefined")
		count = timeAllowed;

	puzzle = puzzleName;
	clicks = 0;
	correct = 0;
	if (count > 0) {
		counter = setInterval(timer, 1000); //1000 will  run it every 1 second
		document.getElementById("timer").innerHTML = count + " secs"; // watch for spelling
	}
}

// http://stackoverflow.com/questions/1191865/code-for-a-simple-javascript-countdown-timer

function timer()
{
  count--;
	timeTaken++;
  if (count < 0)
  {
     clearInterval(counter);
		 $.post("submit.php", {"time": timeTaken, "puzzle": puzzle, "clicks": clicks, 
				"correct": correct});
     alert("Time is up!");
		 window.location = "instructions.php?next=" + next_page[puzzle];
     return;
  }

 document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
}

/* Handle click events on puzzle image. */
function onImageClick(event, differences, offset) {
	// Update global click count
	clicks++;

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
				// Update global correct count
				correct++;

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

				// Check if we're done
				if (thingsLeft - 1 == 0) {
     			clearInterval(counter);
     			alert("Congrats, you found everything!");
		 			$.post("submit.php", {"time": timeTaken, "puzzle": puzzle, "clicks": clicks, 
						"correct": correct});
					window.location = "instructions.php?next=" + next_page[puzzle];
					return;
				}

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
