<?PHP
    session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_cart.php');
	
	//retrieve the username and password entered into the form
	$item = $_POST['item_id'];
	$qty = $_POST['qty'];

	//call the login() function
	$result = add_to_cart($item, $qty);

?>