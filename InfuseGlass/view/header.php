<!DOCTYPE html>
<?PHP
session_start();

if(!isset($_SESSION['usertype'])) {
	$_SESSION['usertype'] = 'anon';
}
	//Retrieve database connection
	require('../model/database.php');
	
	require('../model/functions_users.php');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="css/css.css" rel="stylesheet" type="text/css" media="all"/>
	<link rel="stylesheet" href="../view/css/font-awesome.css">
</head>
<body>
	<div id="whole">
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="../index.php"><img src="images/logooo.png"></a></h1>
            </div>
			
            <div id="menu">
                <ul>
                    <li><a href="home.php" accesskey="1" title="">Homepage</a></li>
                    <li><a href="../view/products.php" accesskey="2" title="">Shop</a></li>
                    <li><a href="checkout.php" accesskey="3" title="">checkout</a></li>
                    <li><a href="../view/contact.php" accesskey="4" title="">Contact Us</a></li>
                </ul>
				
				
<?PHP if($_SESSION['usertype'] == 'anon') { ?>
				<div class="anon-nav">
				<ul>
					<li id="left"><a href="../view/login.php?pageid=login">Login</a></li>
					<li id="right"><a href="../view/login.php?pageid=login" title="">Register</a></li>
				</ul>
				</div>
<?PHP } if($_SESSION['usertype'] == 'auth') { ?>
				
				<div class="known-nav">
				<ul>
					<li id="left"><a href="../index.php?pageid=invoices" title="">My Account</a></li>
					<li id="right"><a href="../controller/logoutprocess.php" title="">Logout</a></li>
				</ul>
				</div>
<?PHP } ?>
            </div>
        </div>
	</div>