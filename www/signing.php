<?php
	//Connect to database
	$mongoClient = new MongoClient();

	//Select a database
	$db = $mongoClient->ecommerce;

	//Select a collection 
	$collection = $db->customers;
	
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $findCriteria = [
        "email" => $email, 
     ];
    
    $cursor = $db->customers->find($findCriteria);

     if($cursor->count() != 0){
        echo 'Database error: Multiple customers have same email address.';
        return;
    }

    else if($name != "" && $email != "" && $password != ""){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB
		//Convert to PHP array
	$dataArray = [
		"name" => $name, 
		"email" => $email, 
		"password" => $password
	 ];
	 $returnVal = $collection->insert($dataArray);
		
        //Output message confirming registration
        echo 'Thank you for registering ' . $name;
    }
    else{//A query string parameter cannot be found
        echo 'Registration data missing';
    }

	$mongoClient->close();