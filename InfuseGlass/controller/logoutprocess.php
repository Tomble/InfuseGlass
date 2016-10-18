<?PHP	
	session_start();
	//destroy the user session
	$_SESSION['usertype'] = 'anon';
	//redirect to the login page after logout
	header("location:../view/login.php?pageid=login");
?>