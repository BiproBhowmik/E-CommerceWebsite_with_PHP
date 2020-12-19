<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 


	if (isset($_GET['delcat'])) {
	$catId = $_GET['delcat'];
    $querydel = "DELETE FROM tbl_category WHERE catId=$catId";
    $resultdel = $db->delete($querydel);

    echo '<script language="javascript">';
    echo 'alert("Deleted")';
    echo '</script>';
}

 ?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">        
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = $db->select("SELECT * FROM tbl_category ORDER BY catId desc");

					if ($query) {
						$i = 0;

						while ($result = $query->fetch_assoc()) {
							$i++;

							?>

							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><a href="catedit.php?editcat=<?php echo $result['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete this??');" href="?delcat=<?php echo $result['catId']; ?>">Delete</a></td>
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

