<?PHP
//Retrieve header
require('../view/header.php');
?>
<!-- /div to close header from header.php include-->
</div> 
    <div id="wrapper">
        <div id="contact" class="container">
            <div class="title">
                <h2>Contact Us</h2>
            </div>
			
			
			<div id="form">
				<form id="contact-form">
				<div id="col1">
				<h4>Your Name*</h4>
				<input type="text" name="name" id="name" required>
				</div>
				
				<div id="col2">
				<h4>Your Email*</h4>
				<input type="text" name="email" id="emaill" required>
				</div>
					
				<h4>Subject</h4>
				<input type="text" name="subject" id="subject">
				
				<h4>Message*</h4>
					<textarea type="text" name="message" id="message"> </textarea>
				<input type="submit" value="Send Message" required>
				</form>
			</div>
			
			<div id="textblock-right">
				<h3>Get in <strong>touch</strong></h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.</p>
				
				<hr>
			
				<h3>Our <strong>location</strong></h3>
				<ul class="li-style">
					<li> <p><strong>Address:</strong> 1234 Street Name, City Name, United States</p>
					</li>
					
					<li> <p><strong>Phone:</strong> 0421 601 007 </p> 
					</li>
					
					<li> <p>
					<strong>Email:</strong> 
					<a href="mailto:@kooltom@live.com.au">kooltom@live.com.au</a>
					</p>
					</li>
				</ul>

				
				
			</div>
        </div>
    </div>
</body>
	

</html>