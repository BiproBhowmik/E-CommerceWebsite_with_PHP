<?php 

/**
 * 
 */
class OrderClass
{
	
	public function __construct()
	{
		
	}

	public function AddToOrder($query)
	{
		$db = new Database();
		$cd = new CartDetails();
		$q = $query;
		if ($q) {
			while ($result = $q->fetch_assoc()) {
				//print_r($result);

				$cusId = $result['cusId'];
				$productId = $result['productId'];
				$productName = $result['productName'];
				$price = $result['price'];
				$quantity = $result['quantity'];
				$uploaded_image = $result['image'];
				$status = "Panding";

				$query = "INSERT INTO tbl_order (cusId, productId, productName, quantity, price, image, status) 
				VALUES('$cusId', '$productId', '$productName', '$quantity', '$price', '$uploaded_image', '$status')";
				$inserted_rows = $db->insert($query);
				if ($inserted_rows) {
					Session::set("GrandTotal", 0);
					$cd->delCartbyCusid($cusId);
					header("Location:order.php");
				}else {
					echo "<span class='error'>Image Not Inserted !</span>";
				}
			}

		}
		else{

			return "No Cart";
		}


	}

	public function getOrder($cusId)
	{
		$db = new Database();

		return $db->select("SELECT * FROM tbl_order WHERE cusId='$cusId'");
	}

	public function delCart($sessionId)
	{
		$db = new Database();

		return $db->delete("DELETE FROM tbl_cart WHERE sId='$sessionId'");
	}

}


?>