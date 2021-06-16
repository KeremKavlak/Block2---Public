<?php
	//Connect to database
	$mongoClient = new MongoClient();

	//Select a database
	$db = $mongoClient->ecommerce;

	//Select a collection 
	$collection = $db->products;
	
	$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	$price= filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
   
	
	 if($name != "" && $description != "" && $price != "" ){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB
		//Convert to PHP array
	$productsDataArray = [
		"name" => $name,
		"description" => $description,
		"price" => $price
		
		
	 ];
	 $returnVal = $collection->insert($productsDataArray);
		
        //Output message confirming registration
        echo 'Thank you for entering product: ' ;
    }
    else{//A query string parameter cannot be found
        echo 'data missing';
    }

	$mongoClient->close();