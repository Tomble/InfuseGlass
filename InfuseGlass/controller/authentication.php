<?php
	session_start();
	//connect to the database
	require('../model/database.php');
	//Load user functions
	require('../model/functions_users.php');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
    //call the login() function
	$count = login($username, $password);
	
	//if there is one matching record
	if($count == 1)
	{
		//set usertype to auth
		$_SESSION['usertype'] = 'auth';
		
		//redirect
		header('LOCATION: ../view/home.php');
		
		//if login is successful, create a success message
		$_SESSION['success'] = 'Welcome ' . $username . ': Checkout the easy naviagtion below to start shopping';
	}
	else
	{
		//set usertype to anon
		$_SESSION['usertype'] = 'anon';
		
		//redirect
		header('location: ../view/login.php');
		
		//if login is unsuccessful, create a success message
		$_SESSION['error'] = 'Incorrect username or password. Please try again.';
	}
?>
