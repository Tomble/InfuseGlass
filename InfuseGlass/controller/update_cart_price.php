<?php
    session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_cart.php');
	
	$item = $_POST['item_id'];
	$qty = $_POST['qty'];
	
	$result = change_qty($item, $qty);
?>