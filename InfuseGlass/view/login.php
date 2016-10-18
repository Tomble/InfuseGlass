<?PHP
//Retrieve header
require('../view/header.php');
?>
<!-- /div to close header from header.php include-->
</div>
<!-- end /div -->

<div id="wrapper">
	<?PHP $message = user_message(); ?>
	<div id="form_wrapper">
		<div class="left">
			<h3>I am already registered</h3>
			<p>Login to access your account and shop online.</p>
			<form action="../controller/authentication.php" method="post">
				<input type="text" class="forminput" name="username" id="username" placeholder="  username*" required /><br />
				<input type="password" class="forminput" id="password" name="password" placeholder="  password*" required /><br />
				<p><input type="submit" name="login" value="Login" /></p>
			</form>
		</div> <!-- end left -->	

		<div class="right">
			<h3>New Customers</h3>
			<p>Register to enjoy the convenience of shopping online.</p>
			<form action="home.php?pageid=regprocess" method="post">
				<input type="text" name="firstName" id="firstName" class="forminput" required placeholder="  first name*" /><br />
				<input type="text" name="lastName"  class="forminput" id="lastName"  required placeholder="  last name*" /><br />
				<input type="email" name="email" class="forminput" id="email" placeholder="  email address*" required /><br />
				<input type="tel" name="phone" class="forminput" id="phone" required placeholder="  phone number*" pattern=".{10,}" title="Include your area code. Numbers only." /><br />
				<input type="text" name="street" class="forminput" id="street" required placeholder="  street address*" /><br />
				<input type="text" name="suburb" class="forminput" id="suburb" required placeholder="  suburb*" /><br />
				<input type="text" name="postcode" class="forminput" id="postcode" required placeholder="  postcode*" pattern=".{4,}" title="Minimum of 4 characters." /><br />
				<input type="text" name="username" class="forminput" id="username" placeholder="  username*" required /><br />
				<input type="password" class="forminput" id="password" name="password" placeholder="  password*" required pattern=".{8,}" title="Minimum of 8 characters."/><br />
				<p><input type="submit" name="register" value="Register" /></p>
			</form>
		</div> <!-- end right -->
	</div>
</div>
</body>
	<div class="PHPlog">
		<?PHP 
	echo  'Usertype: ' . $_SESSION['usertype']; 
	echo '<br/>';
	echo 'Session ID: ' .session_id(); 
	echo '<br/>';
	echo var_dump($_SESSION);
	
unset($_SESSION['usertype']);?>
	</div>
</html>