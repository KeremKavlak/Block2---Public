

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
    </div>      
</main>
<script>
     //Global variables 
            var loggedInStr = "<form action='fetch_customer.php' method='post'>" 
            var loggedInStr2 = "Search criteria: <input type='text' name='name' required><br>"  
            var loggedInStr3 = "<input type='submit'> ";
            var loginStr = document.getElementById("LoginPara").innerHTML;
            var request = new XMLHttpRequest();
            
            //Check login when page loads
            window.onload = checkLogin;
            
            //Checks whether user is logged in.
            function checkLogin(){
                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    if(request.responseText === "ok"){
                        window.location.replace("fetch_customer.php");
                    }
                    else{
                        document.getElementById("LoginPara").innerHTML  = "aint logged in cheif";
                    }
                };
                //Set up and send request
                request.open("GET", "check_login.php");
                request.send();
            }
</script>

<?php
outputFooter();
?>