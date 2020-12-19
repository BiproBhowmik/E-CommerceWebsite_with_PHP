<?php include 'headerFront.php'; ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		# code...
	
	$quantity = $_POST['quantity'];
	$proId = $_GET['productid'];
	$sessionId = session_id();

	$cusId = Session::get("cusId");

	$query = $db->select("SELECT * FROM tbl_cart WHERE productId='$proId' AND sId='$sessionId'");
	if($query)
	{
		echo '<script language="javascript">';
		echo 'alert("Already Added. Update There.")';
		echo '</script>';
	}
	else{

		if ((int)$quantity>0) {
			$cart->AddToCard($proId , $quantity, $sessionId, $cusId);
		}
		else
		{
			echo "Quantity can't be less then 1";
		}
	}
}
	else if (isset($_POST['whtlst'])) {
	
	$proId = $_GET['productid'];
	$cusId = Session::get("cusId");

	$query = $db->select("SELECT * FROM tbl_product WHERE productId='$proId'");
	if($query)
	{
		$result = $query->fetch_assoc();
		$productName = $result['productName'];
		$productId = $result['productId'];
		$price = $result['price'];
		$image = $result['image'];

		if ($db->select("SELECT * FROM tbl_whitelist WHERE productId='$productId'")) {
			echo '<script language="javascript">';
		echo 'alert("Already Added. Update There.")';
		echo '</script>';

		}
		else{

		$db->insert("INSERT INTO tbl_whitelist (cusId, productId, productName, price, image) VALUES ('$cusId', '$productId', '$productName', '$price', '$image')");
		echo "Added to whitelist.";
		}

	}
	
}


}

?>

<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">	

				<?php 

				$query = $pd->IdProDetails($_GET['productid']);
				if ($query) {
					while ($result = $query->fetch_assoc()) {
						?>

						<div class="grid images_3_of_2">
							<img src="admin/<?php echo $result['image'] ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result['productName']; ?> </h2>		
							<div class="price">
								<p>Price: <span><?php echo '$ '.$result['price']; ?></span></p>
								<p>Category: <span><?php echo $cat->cataName($result['catId']); ?></span></p>
								<p>Brand:<span><?php echo $brand->brandName($result['brandId']); ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1"/>
									<?php
									if (Session::get('cusLogin')) {

										?>
										<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
										<input type="submit" class="buysubmit" name="whtlst" value="Add to White List"/>
										<?php

									}
									else
									{
										?>
										<span >**Login To Buy**</span>
										<?php
									}
									?>


								</form>				
							</div>
						</div>
						<div class="product-desc">
							<h2>Product Details</h2>
							<p><?php echo $result['body']; ?></p>
						</div>

						<?php
					}
				}
				?>
				
			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php
					$query = $cat->cataAll(); 
					while ($result = $query->fetch_assoc()) {
						?>
						<li><a href="productbycat.php?catIdcat=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>

						<?php
					}
					?>
				</ul>

			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>