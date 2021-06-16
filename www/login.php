

<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
?>
<body >
<main>

	<h2> Log in to get personal: </h2>
	<div id="login_container">
	
	<p id= "LoginPara" > 
	E-mail:
	<input type="text" id="email"/> 
	Password: 
	<input type="password" id="password" /> <!-- placeholder="password"  can do this as well -->
	
	<input type="submit" value="Log in!"   onclick="login()">  </input>
	</p>
	
	<p style="color: red" id="ErrorMessages"></p>
	<p id="loginFailure" style="color:red;"></p>
	<form action="signup.php">


	<p id= "SignUpPara"> Or: <br/><input type="submit" value="Sign up!"> <br/> </p>
	</form>

	</div>      
</main>
<script>
	 //Global variables 
            var loggedInStr = "Logged in <button onclick='logout()'>Logout</button>";
            var loginStr = document.getElementById("LoginPara").innerHTML;
            var request = new XMLHttpRequest();
            
            //Check login when page loads
            window.onload = checkLogin;
            
            //Checks whether user is logged in.
            function checkLogin(){
                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    if(request.responseText === "ok"){
                        document.getElementById("LoginPara").innerHTML = loggedInStr;
                        document.getElementById("SignUpPara").innerHTML = "";
                    }
                    else{
                        console.log(request.responseText);
                        document.getElementById("LoginPara").innerHTML  = loginStr;
                    }
                };
                //Set up and send request
                request.open("GET", "check_login.php");
                request.send();
            }
            
            //Attempts to log in user to server
            function login(){
                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        var responseData = request.responseText;

                        //Add data to page
                        if(responseData === "ok"){
							
                            document.getElementById("LoginPara").innerHTML = loggedInStr;
                            document.getElementById("ErrorMessages").innerHTML = "";//Clear error messages
                        }
                        else
                            document.getElementById("ErrorMessages").innerHTML = request.responseText;
                    }
                    else
                        document.getElementById("ErrorMessages").innerHTML = "Error communicating with server";
                };

                //Extract login data
                var usrEmail = document.getElementById("email").value;
                var usrPassword = document.getElementById("password").value;
                
                //Set up and send request
                request.open("POST", "customer_login.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send("email=" + usrEmail + "&password=" + usrPassword);
            }
            
            //Logs the user out.
            function logout(){
                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    checkLogin();
                };
                //Set up and send request
                request.open("GET", "logout.php");
                request.send();
            }

	

	// function checkLogin() {
		// if(localStorage.loggedInUsrUsername !== undefined) {
			// /*extract detail of logged in user */
			// var usrObj = JSON.parse(localStorage[localStorage.loggedInUsrUsername]);
			
			// /* say hello to logged in user*/ 
			// document.getElementById("login_container").innerHTML = usrObj.Username + " logged in." ;
			
		// }
	// }
	// function login() {
		// /*get username */
		// var username = document.getElementById("usernameInput").value;
		
		// /* if a user does not have an account */
		// if(localStorage[username] === undefined) {
			// /* inform the user that they need to sign up */
			// document.getElementById("loginFailure").innerHTML = "Username not recognized. Try again or sign up first.";
			// return; /* do nothing else */
		// }
		// else {
			// var usrObj = JSON.parse(localStorage[username]); /* convert to object*/
			// var pass = document.getElementById("passInput").value;
			// if(pass === usrObj.pass) { /* when succesfully loged in do this */ 
				// document.getElementById("login_container").innerHTML = usrObj.username + " logged in. ";
				// document.getElementById("loginFailure").innerHTML = ""; /* Clear any login failures */
				// localStorage.loggedInUsrUsername = usrObj.username;
				
			// }
			// else {
				// document.getElementById("loginFailure").innerHTML = " Password not correct. Please try again.";
			// }
		// }
	// }

</script>

<?php
outputFooter();
?>