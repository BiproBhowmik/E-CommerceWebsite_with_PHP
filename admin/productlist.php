<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/helper.php';?>

<?php 


	if (isset($_GET['delproduct'])) {
	$productId = $_GET['delproduct'];
    $querydel = "DELETE FROM tbl_product WHERE productId=$productId";
    $resultdel = $db->delete($querydel);

    echo '<script language="javascript">';
    echo 'alert("Deleted")';
    echo '</script>';
}

 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL No</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Discription</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$query = $db->select("SELECT * FROM tbl_product JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId JOIN tbl_category ON tbl_product.catId = tbl_category.catId");

					if ($query) {
						$i = 0;
						while ($result = $query->fetch_assoc()) {
							$i++;
							?>
								<tr class="odd gradeX">
									<td><?php echo $i; ?></td>
									<td><?php echo $result['productName']; ?></td>
									<td><?php echo $result['catName']; ?></td>
									<td class="center"> <?php echo $result['brandName']; ?></td>
									<td><?php 

									$textFormat = new helper();
									echo $textFormat->textShorter($result['body']);

										// if(strlen($result['body']) > 40)
										// {
										// 	echo substr($result['body'], 0, 40)."...";
										// }
										// else {
										// 	echo $result['body'];
										// }

									 ?></td>
									<td><?php echo $result['price']; ?></td>
									<td class="center"> <img src="<?php echo $result['image']; ?>" alt="PIm" width="30" height="30"> </td>
									<td><?php echo $result['type']; ?></td>
									<td><a href="productedit.php?editproduct=<?php echo $result['productId'] ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete this??');" href="?delproduct=<?php echo $result['productId']; ?>">Delete</a></td>
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
