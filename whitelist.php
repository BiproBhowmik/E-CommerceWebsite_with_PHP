<?php include 'headerFront.php'; ?>

<?php  //Update quantity

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['upQuant']) && isset($_POST['upCartId']) && (int)($_POST['upQuant'])>0) {
		//$wlRes = $cart->getCart(Session::get("cusId"));
		$wlRes = $cart->setQtoCart($_POST['upQuant'], $_POST['upCartId']);
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


if (isset($_GET['delWlP'])) {
	$wId = $_GET['delWlP'];
	
	$querydel = "DELETE FROM tbl_whitelist WHERE wtlstId='$wId'";
	$resultdel = $db->delete($querydel);

	echo '<script language="javascript">';
	echo 'alert("Deleted")';
	echo '</script>';
}

?>

<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>Your Faverite Products</h2>
				<table class="tblone">
					<tr>
						<th width="10%">SL</th>
						<th width="20%">Product Name</th>
						<th width="30%">Image</th>
						<th width="20%">Price</th>
						<th width="30%">Action</th>
					</tr>
					<?php 

					$wlRes = $wl->getWhiteLise(Session::get("cusId"));
					if ($wlRes) {
						$i = 0;
						
						while ($result = $wlRes->fetch_assoc()) {
							$i++;
							$wlId = $result['wtlstId'];
							$price = $result['price'];

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img height="50px" width="50px" src="<?php echo "admin/".$result['image']; ?>" alt=""/></td>
								<td><?php echo "$ ".$price; ?></td>
								<td><a onclick="return confirm('Are you sure to Delete this??');" href="?delWlP=<?php echo $wlId; ?>">Remove</a> || <a href="preview.php?productid=<?php echo $result['productId']; ?>">Bye Now</a></td>
							</tr>
						<?php } ?>

					</table>
					
					<?php
				}
				?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>  	
		<div class="clear"></div>
	</div>
</div>
</div>

<?php include 'footer.php'; ?>