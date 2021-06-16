<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    'name' => $search_string , 
 ];

$findCriteria2 = [
    'keyword' => $search_string , 
 ];

//Find all of the customers that match  this criteria
$cursor = $db->products->find($findCriteria);
$cursor2 = $db->products->find($findCriteria2);
//Output the results


	echo "<h1>Results</h1>";
if($cursor->count() > 0){
			echo '<br>  ';
            echo '<div class="container1">';
            echo '<div> name: </div>';
            echo '<div> description: </div>';
            echo '<div> price: </div>';
            echo '<div> add to basket </div>';
            foreach ($cursor as $document) {
				
                
                
                echo '<div>' . $document["name"] . "</div>";
                echo '<div>' . $document["description"] . "</div>";
                echo '<div>' . $document["price"] . "</div>";
				echo '<div> Add: <button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '")\'>';
				echo  '<img class="addButton" width="20" height="20" src="pictures/plusbasket.png" ></div> '	;
				
                
                
                
            }	
            
        }
if($cursor2->count() > 0){
            echo '<br>  ';
            echo '<div class="container1">';
            echo '<div> name: </div>';
            echo '<div> description: </div>';
            echo '<div> price: </div>';
            echo '<div> add to basket </div>';
            foreach ($cursor2 as $document) {
                
                
                
                echo '<div>' . $document["name"] . "</div>";
                echo '<div>' . $document["description"] . "</div>";
                echo '<div>' . $document["price"] . "</div>";
                echo '<div> Add: <button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '")\'>';
                echo  '<img class="addButton" width="20" height="20" src="pictures/plusbasket.png" ></div> '    ;
                
                
                
                
            }   
            
        }
		echo '</div>';

//Close the connection
$mongoClient->close();



