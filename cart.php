<?php include 'headerFront.php'; ?>

<?php  //Update quantity

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['upQuant']) && isset($_POST['upCartId']) && (int)($_POST['upQuant'])>0) {
		//$cartRes = $cart->getCart(Session::get("cusId"));
		$cartRes = $cart->setQtoCart($_POST['upQuant'], $_POST['upCartId']);
	}
}
?>

<?php //order placement

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['offline'])) {
		$cusId = Session::get("cusId");

		$query = $cart->getCart($cusId);
		$order->AddToOrder($query);
}
}
?>

<?php 


if (isset($_GET['delCartP'])) {
	$cID = $_GET['delCartP'];
	
	$querydel = "DELETE FROM tbl_cart WHERE cartId='$cID'";
	$resultdel = $db->delete($querydel);

	echo '<script language="javascript">';
	echo 'alert("Deleted")';
	echo '</script>';
    header("Refresh:0; url=cart.php");		//refresh
}

?>

<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="5%">SL</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="20%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php 

					$cartRes = $cart->getCart(Session::get("cusId"));
					if ($cartRes) {
						$i = 0;
						$subTotal = 0;
						$vat = 0;
						
						while ($result = $cartRes->fetch_assoc()) {
							$i++;
							$quantity = (int)$result['quantity'];
							$price = (float)$result['price'];
							$totalPrice = $quantity*$price;
							$subTotal += $totalPrice;
							
							$cartId = $result['cartId'];

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img height="50px" width="50px" src="<?php echo "admin/".$result['image']; ?>" alt=""/></td>
								<td><?php echo "$ ".$price; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="upCartId" value="<?php echo $cartId; ?>"/>
										<input type="number" name="upQuant" value="<?php echo $quantity; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php echo "$ ".$totalPrice; ?></td>
								<td><a onclick="return confirm('Are you sure to Delete this??');" href="?delCartP=<?php echo $cartId; ?>">X</a></td>
							</tr>
						<?php } ?>

					</table>
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td><?php echo "$ ".$subTotal; ?></td>
						</tr>
						<tr>
							<th>VAT : </th>
							<?php $vat = $subTotal/5; ?>
							<td><?php echo "$ ".$vat. "(5%)"; ?></td>
						</tr>
						<tr>
							<th>Grand Total :</th>
							<td><?php echo "$ ".$subTotal+$vat; ?></td>
							<?php 
							Session::set("GrandTotal", $subTotal+$vat); 
							?>
						</tr>
					</table>
					<?php
				}
				?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<!-- <a href="payment.php"> <img src="images/check.png" alt="" /></a> -->
					<form action="" method="post">

						<input class="button" type="submit" name="offline" value="Cash On Delivery">
						<input class="marpa" type="submit" name="online" value="Online Payment">

					</form>
				</div>
			</div>
		</div>  	
		<div class="clear"></div>
	</div>
</div>
</div>

<?php include 'footer.php'; ?>