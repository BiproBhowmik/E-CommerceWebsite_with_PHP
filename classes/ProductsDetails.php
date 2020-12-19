
<?php 
	
	/**
	 * 
	 */
	class ProductsDetails
	{
		
		public function __construct()
		{
			
		}

		public function IdProDetails($id)
		{
			$db = new Database();

			return $db->select("SELECT * FROM tbl_product WHERE productId=$id");
		}

		public function featureProducts()
		{
			$db = new Database();

			return $db->select("SELECT * FROM tbl_product WHERE type='Featured' ORDER BY productId DESC LIMIT 4");
		}

		public function newProducts()
		{
			$db = new Database();

			return $db->select("SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4");
		}

		public function catIdProDetails($id)
		{
			$db = new Database();

			return $db->select("SELECT * FROM tbl_product WHERE catId=$id");
		}
		
	}


 ?>