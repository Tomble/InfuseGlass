<?php
    session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_cart.php');
	
	$item = $_POST['item_id'];
	
	$result = del_from_cart($item);
?>