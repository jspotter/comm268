// http://stackoverflow.com/questions/1191865/code-for-a-simple-javascript-countdown-timer
var count=10;	// number of seconds to allow

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
function timer()
{
  count=count-1;
  if (count < 0)
  {
     clearInterval(counter);
     alert("Time is up!");
		 $.post("submit.php", {"time": 120, "puzzle": puzzle, "clicks": clicks, 
				"correct": correct});
     return;
  }

 document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
}
