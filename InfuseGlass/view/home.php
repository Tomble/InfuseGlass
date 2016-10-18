<!DOCTYPE html>
<?PHP
require('../view/header.php');
?>
	<div id="banner" class="container">
		<?PHP $message = user_message(); ?>
		<div class="title">
			<h1>Welcome</h1>
			<span class="byline">Take the time to find  out A little more about us</span>
		</div>
	</div>
	</div>

	<div id="wrapper">
		<div id="three-column" class="container">
			<div class="title">
				<h2>Easily navigate our web store</h2>
			</div>
			<div class="boxA">
				<i class="fa fa-shopping-cart fa-4x" aria-hidden="true" ></i>
				<p>At Infuse glass we offer a wide range of slumped glass. Check out our products on offer!</p>
				<a href="../view/products.php?CategoryID=null" class="button button-alt">Shop</a>
			</div>
			<div class="boxB">
				<i class="fa fa-child fa-4x" aria-hidden="true" ></i>
				<p>For more information about your account and previous orders visit your account details.</p>

<?PHP if($_SESSION['usertype'] == 'anon') { ?>

			<a href="../view/login.php?pageid=login" class="button button-alt">My Account</a>

<?PHP } ?>

<?PHP if($_SESSION['usertype'] == 'auth') { ?>

			<a href="../view/login.php?pageid=login" class="button button-alt">My Account</a>
				
<?PHP } ?>
			</div>
			<div class="boxC">
				<i class="fa fa-info-circle fa-4x" aria-hidden="true" ></i>
				<p> Get in touch for any extra enquires or information you might have!</p>
				<a href="../view/contact.php" class="button button-alt">Contact Us</a>
			</div>
		</div>
	</div>
	</body>
	<footer>
		<div id="Contact">
			<h3>
			Contact
		</h3>
			<p>
				Infuse Glass designs
				<br/> 5 Dunnart Court
				<br/> Queensland 4560
				<br/> 0417781552
				<br/> infuseglass@gmail.com
			</p>
		</div>
		<div id="About">
			<h3>
			About
		</h3>
			<p>
				Infuse Glass designs
			</p>
		</div>
		<br/>
	</footer>

	<div class="PHPlog">
<?PHP
	echo  'Usertype: ' . $_SESSION['usertype'];
	echo '<br/>';
	echo 'Session ID: ' .session_id(); 
	echo '<br/>';
	echo var_dump($_SESSION);
?>
	</div>
</html>