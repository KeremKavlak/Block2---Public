<?php

//Extract the product IDs that were sent to the server
session_start();

 if( array_key_exists("loggedInUserEmail", $_SESSION) ){
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$email = $_SESSION['loggedInUserEmail'];

$prodIDs= $_POST['prodIDs'];

//Convert JSON string to PHP array 
$purchase = json_decode($prodIDs, true);

//Output the IDs of the products that the customer has ordered


//for($i=0; $i<count($purchase); $i++){
//	$purchaseArray = array($purchase[$i]['id'] );
//}

$customerData = [
    "email" => $email,
    "ProdIDs" =>$purchase,
];


$returnVal = $db->purchases->save($customerData);


if($returnVal['ok']==1){
    echo '<p>lol</p>' ;
    echo json_encode($purchase);
}
else {
    echo 'Error';
}
$mongoClient->close();
}
    else{
        echo 'Not logged in.';
    }

	