<!DOCTYPE HTML>

<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
?>

<body>
	<form  name="myForm3" onsubmit="return false" >
	<input type="text" id="nameInput" /> <br />
	<input type="submit"  value="Enter your name" onclick="storename()" />
	</form>
	<p id="str" >  </p>
	
	<form>
	<br/>
	<input type="submit" value="Easy mode!" />
	</form>
	<form action="playgamehard.php">
	<input type="submit" value="Hard mode!"  />
	</form>
	
	
	<p id="result"> </p>

<canvas id="myCanvas" width="400" height="400"> </canvas>

<p id="timer"><p>

<script>

var canvas = document.getElementById("myCanvas");


var ctx = canvas.getContext("2d");
var board = [
    [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [ 0, 1, 1, 1, 1, 1, 1, 1, 1, 0],
    [ 0, 0, 1, 0, 0, 0, 0, 0, 1, 0],
    [ 0, 0, 0, 0, 1, 1, 1, 0, 1, 0],
    [ 0, 1, 1, 0, 0, 0, 1, 0, 1, 0],
    [ 0, 0, 1, 1, 1, 1, 1, 0, 1, 0],
    [ 0, 0, 1, 0, 0, 0, 1, 0, 1, 0],
    [ 0, 0, 1, 0, 1, 0, 1, 0, 0, 0],
    [ 0, 0, 1, 0, 1, 0, 0, 1, 1, 0],
    [-1, 0, 1, 0, 1, 1, 0, 0, 0, 0]
];

var player = {
    x: 0,
    y: 0
};

//Draw the game board
function draw(){
    var width = canvas.width;
    var blockSize = 40;
   
    
    ctx.clearRect(0, 0, width, width);
    ctx.fillStyle="#751b1b";
    //Loop through the board array drawing the walls and the goal
    for(var y = 0; y < board.length; y++){
        for(var x = 0; x < board[y].length; x++){
            //Draw a wall
            if(board[y][x] === 1){
                ctx.fillRect(x*blockSize, y*blockSize, blockSize, blockSize);
            }
            //Draw the goal
             else if(board[y][x] === -1){
                ctx.beginPath();
                ctx.lineWidth = 5;
                ctx.strokeStyle = "gold";
                ctx.moveTo(x*blockSize, y*blockSize);
                ctx.lineTo((x+1)*blockSize, (y+1)*blockSize);
                ctx.moveTo(x*blockSize, (y+1)*blockSize);
                ctx.lineTo((x+1)*blockSize, y*blockSize);
                ctx.stroke();
            }
        }
    }
    //Draw the player
	ctx.beginPath();
    var half = blockSize/2;
    ctx.fillStyle = "red";
    ctx.arc(player.x*blockSize+half, player.y*blockSize+half, half, 0, 2*Math.PI);
    ctx.fill();
	

	
}
function canMove (x, y){
	if(board[y][x] == -1){
		
		alert("You made it with " + score + " moves");
		document.location.reload();
		storename();
		rankingStore();
		
		
		
	}
	return (y>=0) && (y<board.length) && (x >= 0) && (x < board[y].length) && (board[y][x] != 1);}

function rungame (){
	if((document.myForm2.moveit.value == "right") && canMove(player.x+1, player.y)){
	score++;
	player.x++;}
	else if((document.myForm2.moveit.value == "left") && canMove(player.x-1, player.y)){
	score++;
	player.x--;}
	else if((document.myForm2.moveit.value == "up") && canMove(player.x, player.y-1)){
	score++;
	player.y--;}
	else if((document.myForm2.moveit.value == "down") && canMove(player.x, player.y+1)){
	score++;
	player.y++;}
	
	
	draw();
	drawScore();

}
var score = 0;

function drawScore(){
	ctx.font="16px Arial";
	ctx.fillStyle="#0095DD";
	ctx.fillText("Moves made: "+score, 8, 20);
}
		

var timeLeft = 30;
function countdown(){
var timerId = setInterval (function() {
	if(timeLeft == 0){
		clearTimeout(timerId);
		alert("try again");
		document.location.reload();
		
	}
	else{
		document.getElementById("timer").innerHTML = timeLeft + ' seconds remaining';
		timeLeft--;
	}
}, 1000);
}


function storename(){
	var nameObject = {};
	nameObject.name = document.getElementById("nameInput").value;
	nameObject.score = score;
	localStorage[nameObject.name] = JSON.stringify(nameObject);

}

var playerPosition = 0;
var playerPoses = localStorage.getItem("playerP");
var playerLastPosition = JSON.parse(playerPoses);

function rankingStore (){
	var playername = document.getElementById("nameInput").value;
	var scored = score;
	playerPosition++;
	if (playerPosition > 0 ) {
		playerPosition = playerLastPosition + 1;
		
	}
	
	
	
	localStorage.setItem("playername" + playerPosition, JSON.stringify(playername));
	localStorage.setItem("scored" + playerPosition, JSON.stringify(scored));
	localStorage.setItem("playerP", JSON.stringify(playerPosition));
}




var string = "Enter your name to store your score, press the mode you want to play and get started!";
var str = string.split("");
var el = document.getElementById('str');
(function animate() {
str.length > 0 ? el.innerHTML += str.shift() : clearTimeout(running); 
var running = setTimeout(animate, 50);
})();

draw(); 
drawScore();



</script>
<br/>
	<form  name="myForm2" onsubmit="return false" >
	<input type="text" id="moveit" /> <br />
	<input type="submit"  value="Move!" onclick="rungame()"  />
	</form>
	


<br/>
<br/>
<br/>
<br/>


<?php
outputFooter();
?>