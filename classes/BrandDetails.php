<?php 

/**
 * 
 */
class BrandDetails
{
	
	public function __construct()
	{
		
	}

	public function brandName($id)
		{
			$db = new Database();
			$q = $db->select("SELECT * FROM tbl_brand WHERE brandId=$id");
			if ($q) {
				while ($result = $q->fetch_assoc()) {
					return $result['brandName'];
				}

			}
			else{

			return "No Brand";
			}
		}

		public function getNewIphone()
		{
			$db = new Database();
			$q = $db->select("SELECT * FROM tbl_product WHERE brandId='2' ORDER BY productId DESC LIMIT 1");
			if ($q) {
				while ($result = $q->fetch_assoc()) {
					return $result;
				}

			}
			else{
			return "No Brand";
			}

		}
		public function getNewSamsung()
		{
			$db = new Database();
			$q = $db->select("SELECT * FROM tbl_product WHERE brandId='4' ORDER BY productId DESC LIMIT 1");
			if ($q) {
				while ($result = $q->fetch_assoc()) {
					return $result;
				}

			}
			else{
			return "No Brand";
			}

		}
		
}


 ?>