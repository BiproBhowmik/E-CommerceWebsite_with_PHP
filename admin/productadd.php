<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $productName = $_POST['productName'];
            $productCategory = $_POST['category'];
            $productBrand = $_POST['brand'];
            $productBody = $_POST['body'];
            $productPrice = $_POST['price'];
            $productType = $_POST['productType'];

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));  //JPG -> jpg
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;   //unique name
            

            if (empty($file_name) || $productName == NULL || $productCategory == NULL || $productBody == NULL || $productPrice == NULL || $productType == NULL || $productBrand == NULL) {
               echo "<span class='error'>The filds should not be empty !</span>";
           }elseif ($file_size >1048567) {
               echo "<span class='error'>Image Size should be less then 1MB!
               </span>";
           } elseif (in_array($file_ext, $permited) === false) {
               echo "<span class='error'>You can upload only:-"
               .implode(', ', $permited)."</span>";
           } else{
                $uploaded_image = "upload/".$unique_image;
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product (productName, catId, brandId, body, price, image, type) 
                VALUES('$productName','$productCategory', $productBrand, '$productBody', '$productPrice', '$uploaded_image','$productType')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                   echo "<span class='success'>Image Inserted Successfully.
                   </span>";
               }else {
                   echo "<span class='error'>Image Not Inserted !</span>";
               }
            }

        }
   ?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <?php 

                                $query = $db->select("SELECT * FROM tbl_category");

                                if ($query) {
                                    while ($result = $query->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName']; ?></option>
                                        <?php
                                    }
                                }

                             ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <?php 

                                $query = $db->select("SELECT * FROM tbl_brand");

                                if ($query) {
                                    while ($result = $query->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']; ?></option>
                                        <?php
                                    }
                                }

                             ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="productType">
                            <option>Select Type</option>
                            <option value="Featured">Featured</option>
                            <option value="Non-Featured">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


