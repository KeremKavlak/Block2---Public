<!DOCTYPE HTML>

<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
?>
<script>
function  player1name() {
	document.getElementById("user1").innerHTML = localStorage.getItem("playername1");
}
function player1score() {
	document.getElementById("score1").innerHTML = localStorage.getItem("scored1");
}
function  player2name() {
	document.getElementById("user2").innerHTML = localStorage.getItem("playername2");
}
function player2score() {
	document.getElementById("score2").innerHTML = localStorage.getItem("scored2");
}
function  player3name() {
	document.getElementById("user3").innerHTML = localStorage.getItem("playername3");
}
function player3score() {
	document.getElementById("score3").innerHTML = localStorage.getItem("scored3");
}
function  player4name() {
	document.getElementById("user4").innerHTML = localStorage.getItem("playername4");
}
function player4score() {
	document.getElementById("score4").innerHTML = localStorage.getItem("scored4");
}




</script>
<main>
	<article>
	
		<div class="container1">
			<div > Rank: </div>
			<div> Name: </div>
			<div> Moves: </div>
			<div> 1 </div>
			<div id="user1" ><script> player1name(); </script> </div>
			<div id="score1"><script> player1score(); </script>  </div>
			<div > 2 </div>
			<div id="user2"> <script> player2name(); </script> </div>
			<div id="score2"> <script> player2score(); </script> </div>
			<div> 3 </div>
			<div id="user3"> <script> player3name(); </script> </div>
			<div id="score3"> <script> player3score(); </script> </div>
			<div> 4 </div>
			<div id="user4"> <script> player4name(); </script>  </div>
			<div id="score4"> <script> player4score(); </script></div>

		</div>
	</article>
	<br/>
	<br/>
	<br/>


</main>



<?php
outputFooter();
?>