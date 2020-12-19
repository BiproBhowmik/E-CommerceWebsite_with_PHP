<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/helper.php';?>

<?php 

	$brandId = $_GET['editbrand'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$vld = new helper();
		$brandName = $vld->validation($_POST['brandName']);

		if (empty($brandName)) {
			echo "Invalid Brand Name";
		}
		else
		{
			$query = "UPDATE tbl_brand SET brandName='$brandName' WHERE brandId=$brandId";
			$result = $db->update($query);
			if ($result != false) {
				echo "Updated";
			}
			else
			{
				echo "Not Updated";
			}
		}
	}

 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Updated Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>