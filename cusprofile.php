<?php include 'headerFront.php'; ?>

<?php 

$cusId = Session::get('cusId');
$cusName = Session::get('cusName');
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $cusName = $_POST['cusName'];
    $cusCountry = $_POST['cusCountry'];
    $cusCity = $_POST['cusCity'];
    $cusAddress = $_POST['cusAddress'];
    $cusZip = $_POST['cusZip'];
    $cusEmail = $_POST['cusEmail'];
    $cusPhone = $_POST['cusPhone'];
    $cusPass = $_POST['cusPass'];
    $cusId = $_POST['cusId'];

    if ($cusName == NULL || $cusCountry == NULL || $cusAddress == NULL || $cusZip == NULL || $cusPass == NULL || $cusEmail == NULL || $cusPhone == NULL || $cusCity == NULL) {
     echo "<span class='error'>The filds should not be empty !</span>";
 } else{

    $query = "UPDATE tbl_customer SET cusName='$cusName', cusCountry='$cusCountry', cusCity='$cusCity', cusAddress='$cusAddress', cusZipcode='$cusZip', cusEmail='$cusEmail', cusPhone='$cusPhone', cusPassword='$cusPass' WHERE cusId='$cusId'";

    $inserted_rows = $db->update($query);

        if ($inserted_rows) {
         echo "<span class='success'>Profile Updated
         </span>";
         }
         else {
             echo "<span class='error'>Profile not Updated !</span>";
         }
}

}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Profile</h2>
        <div class="block"> 

            <?php     
            $queryV = $db->select("SELECT * FROM tbl_customer WHERE cusId=$cusId"); // Variable name should be unique
            $resultV = $queryV->fetch_assoc();

            ?>

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


