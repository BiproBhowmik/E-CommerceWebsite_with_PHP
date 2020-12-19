<?php 

/**
 * 
 */
class CategoryDetails
{
	
	public function __construct()
	{
		
	}

	public function cataName($id)
	{
		$db = new Database();
		$q = $db->select("SELECT * FROM tbl_category WHERE catId=$id");
		if ($q) {
			while ($result = $q->fetch_assoc()) {
				return $result['catName'];
			}

		}
		else{

			return "No Category";
		}


	}

	public function cataAll()
	{
		$db = new Database();
		$q = $db->select("SELECT * FROM tbl_category");
		if ($q) {
			return $q;

		}
		else{

			return "No Category";
		}


	}
}


?>