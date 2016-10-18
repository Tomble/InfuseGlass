<?php
    session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_cart.php');
	
	empty_cart();
?>