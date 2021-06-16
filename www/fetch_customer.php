<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
	
    //Output header and navigation 
    outputHeader("My Game Website - Game");
	outputBannerNavigation("Nav");
?>


<?php


    //Include the PHP functions to be used on the page 
session_start();
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = $_SESSION['loggedInUserEmail'];

//Create a PHP array with our search criteria
$findCriteria = ["email" => $search_string, ];

//Find all of the customers that match  this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>";   
foreach ($cursor as $cust){
	echo '<div id="login_container">';
	echo '<p> change info here </p>';
    echo '<form action="save_customer.php" method="post">';
    echo 'Name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
    echo '<input type="text" name="email" value="' . $cust['email'] . '" required><br>';
    echo 'Password: <input type="password" name="password" value="' . $cust['password'] . '" required><br>'; 
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
    echo '</div>';
}

//Close the connection
$mongoClient->close();

?>

<?php
outputFooter();
?>