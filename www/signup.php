

<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
	
?>
<body>
<main>

	<h2> Sing up: </h2>
	<div id="login_container">
		<form action="signing.php" name="myForm"  method="post">
			Username: 
			<input type="text" id="usernameInput" /> 
			Password: 
			<input type="password" id="passInput"   />	<!-- placeholder="password"  can do this as well -->
			Confirm	password: 
			<input type="password" id="PInput" />
			
			E-mail Address:
			<input type="text" id="emailInput"/>
			</form >
			<br/><input type="submit" value="Sign up!" onclick="storeUser()"  > 
			<p style="color:red;" id="result"> </p>
			</form>	
			<p> Server response: <span id="ServerResponse"></span>
			<form action="login.php">
			Already have an account? 
			<br/><input type="submit" value="Log in!"  > <br/>
		</form>

	</div>
	
</main>

<script>
	
                
	


	
	function storeUser(){
		
		
	
		
		/* inform user of result  */
		
		if (document.myForm.usernameInput.value == "" ){
			document.getElementById("result").innerHTML = "<em> Provide username! <em>"; 
			return false;
		}
		else if (document.myForm.passInput.value == "" ){
			document.getElementById("result").innerHTML = "<em> Provide password! <em>";
			return false;
		}
		else if (document.myForm.PInput.value == "" ){
			document.getElementById("result").innerHTML = "<em> Confirm your password! <em>";
			return false;
		}
		else if (document.myForm.passInput.value != document.myForm.PInput.value) {
			document.getElementById("result").innerHTML = "<em> Password does not match! <em>";
		}

		else if (document.myForm.emailInput.value == ""){
			document.getElementById("result").innerHTML = "<em> Provide email! <em>";
			return false;
		}
		else if(validateEmail() == false){
			document.getElementById("result").innerHTML = "<em> Provide correct email! <em>";
			return false;
		}
		
		else {
			//Create request object 
                var request = new XMLHttpRequest();

                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        var responseData = request.responseText;

                        //Add data to page
                        document.getElementById("ServerResponse").innerHTML = responseData;
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };
			//Set up request with HTTP method and URL 
            request.open("POST", "signing.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			var usrName = document.getElementById("usernameInput").value;
			var usrAddress = document.getElementById("emailInput").value;
            var usrPassword = document.getElementById("passInput").value;
                
            //Send request
            request.send("name=" + usrName + "&email=" + usrAddress + "&password=" + usrPassword);
			var delay = 4000;
			setTimeout(function(){
			window.location.replace("login.php");}, delay);
		
		
	}
		
			
		/*email address must contain at least a ‘@’ sign and a dot (.). Also, the ‘@’ must not be the first character of the email address, and the last dot must at least be one character after the ‘@’ sign. */
		
		
	}
	function validateEmail(){
		var email = document.myForm.emailInput.value;
		at = email.indexOf("@");
		dot = email.lastIndexOf(".");
		
		if(at < 1 || (dot - at < 2) )
		{
			return false;
		}
		return (true);
	}

	

	

</script>
</body>
<?php

outputFooter();
?>