<?php

//Ouputs the header for the page and opening body tag
function outputHeader($title){
echo<<<END
	<!DOCTYPE HTML>
	<html lang="en">
    <head>
	<title>' $title'</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv= "X-UA-Compatible" content="IE=edge,chrome=1" /> <!made for IE application, render the website in best quiality for IE./>
	
	<meta name="description" content="A game about a maze" />
	<meta name="keywords" content="make, game, how" />
	
	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<!-- font images used as facebook links, insta links -->
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/> 
 	<!-- my CSS file linkeds -->
	<link rel="stylesheet" href="css/style.css" type="text/css"/> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 


	</head>
END;
}

// Ouputs the banner and the navigation bar 
function outputBannerNavigation($pageName){
    //Output banner and first part of navigation
echo<<<END

    <header class="container">
	<div="row">
		<div class="social "> 
			<div class="fb"><i class="icon-facebook "> </i> </div>
			<div class="ig"><i class="icon-instagram"></i>  </div>
			<div class="yt"><i class="icon-youtube"> </i> </div>
			
			<div style="clear:both"></div>
		</div>	
		<div class="login col-4">
			<a href="login.php" class="tilelink"> login! </a>
		</div>
	<div>
		
		<div style="clear:both"></div>
		<div id="logo">
			<h1> 
			ama<span style="color:#751b1b">MAZE</span>ing  </h1>
		</div>
		
		<nav class="navbar navbar-dark my-1 navbar-expand-md container" >
		
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Navbar button"> 
			<span class="navbar-toggler-icon d-inline-block ml-1 align-bottom"> </span> 
		</button>
		
		<a class="navbar-brand d-inline-block mx-2 " href="index.php" > <i class="icon-gamepad"> </i>  </a> 
		
		<div class="collapse navbar-collapse" id="mainmenu">
			<ul class="navbar-nav">
				
				<li class="nav-item "> <a class="nav-link" href="index.php"> Game info </a> </li>
				<li class="nav-item"> <a class="nav-link" href="playgame.php"> Play game </a> </li>
				
				<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="userpage.php aria-expanded="false" id="submenu" aria-haspopup="true"> User page </a> 
					
					<div class="dropdown-menu" aria-labelledby="submenu">
					
						<a class="dropdown-item" href="login.php"> Log in </a> 
						<a class="dropdown-item" href="signup.php"> Sign up </a>
						<a class="dropdown-item" href="account.php"> Update account </a> 
					
					</div>
					
				</li>  
				<li class="nav-item"> <a class="nav-link" href="ranks.php"> Ranks </a> </li>
				<li class="nav-item"> <a class="nav-link" href="shop.php"> Shop </a> </li>
			</ul>
		</div>
		
		
		
		</nav>
	</header>
END;

	
}

//Outputs closing body tag and JS
function outputFooter(){
echo<<<END
	<footer class="container">
	Making a game, by <u> Lukasz Wlosek </u> &copy; 2018, Thank you for your visit!
	</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>



</body>
</html>

END;
}

?>