<!DOCTYPE HTML>
<script src = "basket.js"> </script>
<script src = "recommender.js"> </script>
<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
	
	//Connect to MongoDB and select database
    $mongoClient = new MongoClient();
    $db = $mongoClient->ecommerce;
        
    //Find all names
    $names = $db->products->find()->sort(array("price" => -1)) -> limit(10);	
	
	echo '<h2> Shop </h2>';
	echo'<br>';
	echo '
            Search for products : <input type="text" id="searchOf" >
            <button type="button" onclick="search1()"> search </button> 
    <p id="ServerRespond1"></p>';
	

	
	
	echo 'Sort by price ';
	echo '<form id="sorting" action="sort1.php"> <button type="submit"> low to high </button> </form>';
	echo '<form id="sorting" action="sort2.php"> <button type="submit"> high to low </button> </form>';
	echo '</br>';
	
	
	//Output results onto page
        if($names->count() > 0){
			echo '<br>  ';
            echo '<div class="container1">';
            echo '<div> name: </div>';
            echo '<div> description: </div>';
            echo '<div> price: </div>';
            echo '<div> add to basket </div>';
            foreach ($names as $document) {
				
                
                
                echo '<div>' . $document["name"] . "</div>";
                echo '<div>' . $document["description"] . "</div>";
                echo '<div>' . $document["price"] . "</div>";
				echo '<div> Add: <button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '")\'>';
				echo  '<img class="addButton" width="20" height="20" src="pictures/plusbasket.png" ></div> '	;
				
                
                
                
            }	
            
        }
		echo '</div>';
		echo '<br>';


        //Close the connection
        $mongoClient->close();

        ?>
		


<main>
	
	
		
	<h2> Basket </h2>
	<div id="basketDiv"> </div>
		
		
		
		
	</article>
	<br/>
	<br/>
	<br/>
	<div id="login_container">
		<form action="products.php" method="post" name="secondForm">
			name: 
			<input type="text" id="nameOf" /> 
			Description: 
			<input type="text" id="descriptionOf" /> 
			Price: 
			<input type="text" id="priceOf" /> 
			
			<button type="button" onclick="addname()"> submit </button>
			<p> Server respond: <span id="ServerRespond"></span>
			</p>
		
		</form>

</div>


</main>
<script>


function search1(){
	debugger;
	var request = new XMLHttpRequest();
	
	request.onload = function(){
		if(request.status === 200) {
			var responseData1 = request.responseText;
			 document.getElementById("ServerRespond1").innerHTML = responseData1;
		}
		else
			alert("Error" + request.status);
	};
	request.open("POST", "find_customer.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var searchD = document.getElementById("searchOf").value;
	request.send("name=" + searchD);
	
	
}


function addname(){
	var request = new XMLHttpRequest();
	  

                //Create event handler that specifies what should happen when server responds
                request.onload = function(){
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        var responseData = request.responseText;

                        //Add data to page
                        document.getElementById("ServerRespond").innerHTML = responseData;
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };
			//Set up request with HTTP method and URL 
            request.open("POST", "products.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
			var nameName = document.getElementById("nameOf").value;
			var PDescription = document.getElementById("descriptionOf").value;
			var PPrice = document.getElementById("priceOf").value;
			
                
            //Send request
            request.send("name=" + nameName + "&description=" + PDescription + "&price=" + PPrice );
		
		
	}
	


</script>



<?php
outputFooter();
?>