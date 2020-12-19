<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/CustomerDetails.php';?>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>

<?php 


if (isset($_GET['orStatus']) && isset($_GET['orderId'])) {
	$orderStatus = $_GET['orStatus'];
	$orderId = $_GET['orderId'];

	if ($orderStatus=="Panding") {
		$db->update("UPDATE tbl_order SET status='Shifting' WHERE orderId=$orderId");
	}
	else if ($orderStatus=="Shifting") {
		$db->update("UPDATE tbl_order SET status='Hand Overed' WHERE orderId=$orderId");
	}
	
}

?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">        
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Order ID</th>
						<th>Customer ID</th>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = $db->select("SELECT * FROM tbl_order ORDER BY tbl_order.cusId DESC");

					if ($query) {
						while ($result = $query->fetch_assoc()) {
							?>
							<tr class="odd gradeX">
								<td><?php echo $result['orderId']; ?></td>
								<td>
									<?php 
										$cusId = $result['cusId'];
										$cusD = new CustomerDetails();
										$q = $cusD->cusDetailsById($cusId);
										$cusResult = $q->fetch_assoc();
									 ?>
									<div class="tooltip"><?php echo $cusId; ?>
									  <span class="tooltiptext">
									  	<?php echo 
									  	"Name : ".$cusResult['cusName'].
									  	"<br>Address : ".$cusResult['cusAddress'].
									  	"<br>City : ".$cusResult['cusCity'].
									  	"<br>Country : ".$cusResult['cusCountry'].
									  	"<br>Phone : ".$cusResult['cusPhone'].
									  	"<br>Email : ".$cusResult['cusEmail'];
									  	?>
									  		

									  	</span>
									</div>

								</td>
								<td><?php echo $result['productId']; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php echo "$".$result['price']; ?></td>
								<td><?php echo $result['date']; ?></td>
								<td><a href="?orStatus=<?php echo $result['status'];?>&orderId=<?php echo $result['orderId'];?>"><?php echo $result['status']; ?></a></td>
							</tr>
							<?php
						}
					}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>
