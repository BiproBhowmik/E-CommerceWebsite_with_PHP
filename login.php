<?php include 'headerFront.php'; ?>

<?php 
	
	if (isset($_GET['logout'])) {
		$cart->delCart(session_id());
		Session::destroy();
	}

 ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['cusRegestration'])) {
			$cusD->insertCustomerDetails($_POST);
		}
		else if (isset($_POST['cusLogin'])) {
			$cusD->login($_POST['loginEmail'], $_POST['loginPass']);
		}
	

}
?>

<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<form action="" method="post">
				<input type="hidden" value="" placeholder="" name="cusLogin">
				<input name="loginEmail" type="text" class="field" placeholder="Email">
				<input name="loginPass" type="password" placeholder="Password">
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
			<div class="buttons"><div><button class="grey">Sign In</button></div></div>
			</form>
		</div>
		<div class="register_account">
			<h3>Register New Account</h3>
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="hidden" value="" placeholder="" name="cusRegestration">
								</div>
								<div>
									<input type="text" value="" placeholder="Customer Name" name="cusName">
								</div>

								<div>
									<input type="text" value="" placeholder="Customer City Name" name="cusCity">
								</div>

								<div>
									<input type="text" value="" placeholder="Zip-Code" name="cusZip">
								</div>
								<div>
									<input type="email" value="" placeholder="Customer Email" name="cusEmail">
								</div>
							</td>
							<td>
								<div>
									<input type="text" value="" placeholder="Customer Address" name="cusAddress">
								</div>
								<div>
									<select id="country" name="cusCountry">
										<option value="null">Select a Country</option>         
										<option value="Afghanistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>

									</select>
								</div>		        

								<div>
									<input type="text" value="" placeholder="Customer Phone Number" name="cusPhone">
								</div>

								<div>
									<input type="password" value="" placeholder="Password" name="cusPass">
								</div>
							</td>
						</tr> 
					</tbody></table> 
					<div class="search"><div><button class="grey">Create Account</button></div></div>
					<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
					<div class="clear"></div>
				</form>
			</div>  	
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="wrapper">	
		<div class="section group">
			<div class="col_1_of_4 span_1_of_4">
				<h4>Information</h4>
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Customer Service</a></li>
					<li><a href="#"><span>Advanced Search</span></a></li>
					<li><a href="#">Orders and Returns</a></li>
					<li><a href="#"><span>Contact Us</span></a></li>
				</ul>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<h4>Why buy from us</h4>
				<ul>
					<li><a href="about.html">About Us</a></li>
					<li><a href="faq.html">Customer Service</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="contact.html"><span>Site Map</span></a></li>
					<li><a href="preview-2.html"><span>Search Terms</span></a></li>
				</ul>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<h4>My account</h4>
				<ul>
					<li><a href="contact.html">Sign In</a></li>
					<li><a href="index.html">View Cart</a></li>
					<li><a href="#">My Wishlist</a></li>
					<li><a href="#">Track My Order</a></li>
					<li><a href="faq.html">Help</a></li>
				</ul>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<h4>Contact</h4>
				<ul>
					<li><span>+91-123-456789</span></li>
					<li><span>+00-123-000000</span></li>
				</ul>
				<div class="social-icons">
					<h4>Follow Us</h4>
					<ul>
						<li class="facebook"><a href="#" target="_blank"> </a></li>
						<li class="twitter"><a href="#" target="_blank"> </a></li>
						<li class="googleplus"><a href="#" target="_blank"> </a></li>
						<li class="contact"><a href="#" target="_blank"> </a></li>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
		</div>
		<div class="copy_right">
			<p>Compant Name © All rights Reseverd </p>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
	 		*/

	 		$().UItoTop({ easingType: 'easeOutQuart' });

	 	});
	 </script>
	 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
	</body>
	</html>

