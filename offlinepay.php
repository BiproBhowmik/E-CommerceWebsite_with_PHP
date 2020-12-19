<?php include 'headerFront.php'; ?>
<div class="header_bottom">
	<div class="header_bottom_left">

		<div class="box round first grid">
        <h2>Card Review</h2>
        <table class="tblone">
					<tbody><tr>
						<th width="5%">SL</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="20%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
												<tr>
								<td>1</td>
								<td>Note Js</td>
								<td><img height="50px" width="50px" src="admin/upload/d25856c12f.jpg" alt=""></td>
								<td>$ 100</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="upCartId" value="29">
										<input type="number" name="upQuant" value="5">
										<input type="submit" name="submit" value="Update">
									</form>
								</td>
								<td>$ 500</td>
								<td><a onclick="return confirm('Are you sure to Delete this??');" href="?delCartP=29">X</a></td>
							</tr>
						
					</tbody></table>
    </div>

	</div>
	<div class="header_bottom_right_images">
		<div class="box round first grid">
        <h2>Update Profile</h2>
        <div class="block"> 
<form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input name="cusName" value="<?php echo $resultV['cusName']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                        <td>
                            <input name="cusId" value="<?php echo $resultV['cusId']; ?>" type="hidden" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Country</label>
                        </td>
                        <td>
                            <input name="cusCountry" value="<?php echo $resultV['cusCountry']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>City</label>
                        </td>
                        <td>
                            <input name="cusCity" value="<?php echo $resultV['cusCity']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Address</label>
                        </td>
                        <td>
                            <input name="cusAddress" value="<?php echo $resultV['cusAddress']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Zip-Code</label>
                        </td>
                        <td>
                            <input name="cusZip" value="<?php echo $resultV['cusZipcode']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input name="cusEmail" value="<?php echo $resultV['cusEmail']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Phone</label>
                        </td>
                        <td>
                            <input name="cusPhone" value="<?php echo $resultV['cusPhone']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input name="cusPass" value="<?php echo $resultV['cusPassword']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
	</div>
	<div class="clear"></div>
</div>