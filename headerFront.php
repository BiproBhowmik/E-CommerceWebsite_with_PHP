<?php 
include 'config/config.php';
include 'lib/Database.php';
$db = new Database();
?>
<?php 
include 'classes/ProductsDetails.php';
$pd = new ProductsDetails();

?>
<?php 
include 'classes/WhiteListClass.php';
$wl = new WhiteListClass();

?>

<?php 
include 'classes/CustomerDetails.php';
$cusD = new CustomerDetails();

?>

<?php 
include 'classes/CartDetails.php';
$cart = new CartDetails();

?>

<?php 
include 'classes/OrderClass.php';
$order = new OrderClass();

?>

<?php 
include 'lib/Session.php';
Session::init();

?>

<?php 
include 'classes/CategoryDetails.php';
$cat = new CategoryDetails();

?>
<?php 
include 'classes/BrandDetails.php';
$brand = new BrandDetails();

?>


<?php include 'helpers/helper.php'; ?>
<!DOCTYPE HTML>
<head>
	<title>Store Website</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script> 
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function($){
			$('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
		});
	</script>
</head>
<body>
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="header_top_right">
				<div class="search_box">
					<form>
						<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
					</form>
				</div>
				<div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
							<span class="cart_title">Cart</span>
							<span class="no_product"><?php

							if (Session::get("GrandTotal") && (int)Session::get("GrandTotal") > 0) {
								echo "$ ".Session::get("GrandTotal");
							}
							else
							{
								echo "(Empty)";
							}

							?></span>
						</a>
					</div>
				</div>
				<?php 

				if (Session::get('cusLogin')) {
					?>
					<div class="login"><a href="login.php?logout=LOGOUT">Logout</a></div>
					<?php
				}
				else
				{

					?>
					<div class="login"><a href="login.php">Login</a></div>

					<?php
				}

				?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="menu">
			<ul id="dc_mega-menu-orange" class="dc_mm-orange">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a> </li>
				<?php 
					if (Session::get('cusLogin')) {
						
						?>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="whitelist.php">WhiteList</a></li>
				<li><a href="cusprofile.php">Profile</a></li>
				<li><a href="order.php">My Orders</a></li>

						<?php
					}
				 ?>
				
				<li><a href="contact.php">Contact</a> </li>
				<div class="clear"></div>
			</ul>