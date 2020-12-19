<?php 

/**
 * 
 */
class CartDetails
{
	
	public function __construct()
	{
		
	}

	public function AddToCard($productId, $quantity, $sessionId, $cusId)
	{
		$db = new Database();
		$q = $db->select("SELECT * FROM tbl_product WHERE productId=$productId");
		if ($q) {
			while ($result = $q->fetch_assoc()) {
				//print_r($result);

				$productName = $result['productName'];
				$price = $result['price'];
				$uploaded_image = $result['image'];

				$query = "INSERT INTO tbl_cart (sId, cusId, productId, productName, price, quantity, image) 
				VALUES('$sessionId', '$cusId', '$productId', '$productName', '$price', '$quantity', '$uploaded_image')";
				$inserted_rows = $db->insert($query);
				if ($inserted_rows) {
					header("Location:cart.php");
				}else {
					echo "<span class='error'>Image Not Inserted !</span>";
				}
			}

		}
		else{

			return "No Cart";
		}


	}

	public function setQtoCart($quantity, $cartId)
	{
		$db = new Database();
		$query = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartId=$cartId";
			$result = $db->update($query);
			if ($result != false) {
				echo "Updated";
			}
			else
			{
				echo "Not Updated";
			}
	}

	public function getCart($cusId)
	{
		$db = new Database();

		return $db->select("SELECT * FROM tbl_cart WHERE cusId='$cusId'");
	}

	public function delCart($sessionId)
	{
		$db = new Database();

		return $db->delete("DELETE FROM tbl_cart WHERE sId='$sessionId'");
	}
	public function delCartbyCusid($cusId)
	{
		$db = new Database();

		return $db->delete("DELETE FROM tbl_cart WHERE cusId='$cusId'");
	}
	

}


?>