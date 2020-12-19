<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 


	if (isset($_GET['delbrand'])) {
	$brandId = $_GET['delbrand'];
    $querydel = "DELETE FROM tbl_brand WHERE brandId=$brandId";
    $resultdel = $db->delete($querydel);

    echo '<script language="javascript">';
    echo 'alert("Deleted")';
    echo '</script>';
}

 ?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Brand List</h2>
		<div class="block">        
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = $db->select("SELECT * FROM tbl_brand ORDER BY brandId desc");

					if ($query) {
						$i = 0;

						while ($result = $query->fetch_assoc()) {
							$i++;

							?>

							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brandName']; ?></td>
								<td><a href="brandedit.php?editbrand=<?php echo $result['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete this??');" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a></td>
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

