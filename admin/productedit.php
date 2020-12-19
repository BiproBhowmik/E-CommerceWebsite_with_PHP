<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php $productIdV = $_GET['editproduct'];  ?>

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
            

            if ($productName == NULL || $productCategory == NULL || $productBody == NULL || $productPrice == NULL || $productType == NULL || $productBrand == NULL) {
               echo "<span class='error'>The filds should not be empty !</span>";
           }elseif ($file_size >1048567) {
               echo "<span class='error'>Image Size should be less then 1MB!
               </span>";
           } elseif (in_array($file_ext, $permited) === false && file_exists($file_name)) {
               echo "<span class='error'>You can upload only:-"
               .implode(', ', $permited)."</span>";
           } else{
            
            if (file_exists($file_name)) {
                $uploaded_image = "upload/".$unique_image;
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET productName='$productName', catId='$productCategory', brandId=$productBrand, body='$productBody', price='$productPrice', image='$uploaded_image', type='$productType' WHERE productId='$productIdV'";
            }
            else
            {
                $query = "UPDATE tbl_product SET productName='$productName', catId='$productCategory', brandId=$productBrand, body='$productBody', price='$productPrice', type='$productType' WHERE productId='$productIdV'";
            }
            
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
        <h2>Edit Product</h2>
        <div class="block"> 

            <?php     
            $queryV = $db->select("SELECT * FROM tbl_product WHERE productId=$productIdV"); // Variable name should be unique
            $resultV = $queryV->fetch_assoc();

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input name="productName" value="<?php echo $resultV['productName']; ?>" type="text" placeholder="Enter Product Name..." class="medium" />
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
                                        <option <?php if ($result['catId']==$resultV['catId']) { //for selected item ?>
                                            selected="<?php echo $result['catName']; }?>" 
                                            value="<?php echo $result['catId'] ?>"><?php echo $result['catName']; ?> </option>
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
                                            <option <?php if ($result['brandId']==$resultV['brandId']) { //for selected item ?>
                                            selected="<?php echo $result['brandName']; }?>" value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']; ?></option>
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
                                <textarea name="body" class="tinymce"><?php echo $resultV['body']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input value="<?php echo $resultV['price']; ?>" name="price" type="text" placeholder="Enter Price..." class="medium" />
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
                                    <?php if ($resultV['type']=="Non-Featured") {
                                        ?>
                                        <option value="Featured">Featured</option>
                                        <option selected="selected" value="Non-Featured">Non-Featured</option>


                                        <?php
                                    } else{ ?>
                                            <option selected="selected" value="Featured">Featured</option>
                                        <option value="Non-Featured">Non-Featured</option>
                                        <?php

                                    } ?>
                                </select>
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


