<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/helper.php';?>

<?php 

	$catId = $_GET['editcat'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$vld = new helper();
		$catName = $vld->validation($_POST['catName']);

		if (empty($catName)) {
			echo "Invalid Category Name";
		}
		else
		{
			$query = "UPDATE tbl_category SET catName='$catName' WHERE catId=$catId";
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
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Updated Category Name..." class="medium" />
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