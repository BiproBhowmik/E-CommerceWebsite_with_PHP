<?php include 'headerFront.php'; ?>

<?php 


if (isset($_GET['cancleOrder'])) {
	$oID = $_GET['cancleOrder'];
	
	$querydel = "DELETE FROM tbl_order WHERE orderId='$oID'";
	$resultdel = $db->delete($querydel);

	echo '<script language="javascript">';
	echo 'alert("Deleted")';
	echo '</script>';
    // header("Refresh:0; url=cart.php");		//refresh
}

?>

<div class="main">
	<div class="content">
		<div class="cartoption">		
			<div class="cartpage">
				<h2>Your Orderes</h2>
				<table class="tblone">
					<tr>
						<th width="5%">SL</th>
						<th width="15%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="5%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="15%">Date</th>
						<th width="10%">Status</th>
						<th width="5%">Action</th>
					</tr>
					<?php 

					$cartRes = $order->getOrder(Session::get("cusId"));
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
							
							$orderId = $result['orderId'];
							$orderDate = $result['date'];
							$orderStatus = $result['status'];

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img height="50px" width="50px" src="<?php echo "admin/".$result['image']; ?>" alt=""/></td>
								<td><?php echo "$ ".$price; ?></td>
								<td><?php echo $quantity; ?></td>
								<td><?php echo "$ ".$totalPrice; ?></td>
								<td><?php echo $orderDate; ?></td>
								<td><?php echo $orderStatus; ?></td>
								<?php 
								if ($orderStatus=="Panding") { ?>
									<td><a onclick="return confirm('Are you sure to Delete this??');" href="?cancleOrder=<?php echo $orderId; ?>">Cancle</a></td>
									<?php }
									else if ($orderStatus=="Shifting") {
										?>
										<td>Near You</td>
										<?php }
										else if ($orderStatus=="Hand Overed") {
											?>
											<td><a onclick="return confirm('Are you sure to Delete this??');" href="?cancleOrder=<?php echo $orderId; ?>">Remove</a></td>
											<?php
										
									
								}
								?>
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
						</tr>
					</table>
					<?php
				}
				?>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>