<?php 

/**
 * 
 */
class WhiteListClass
{
	
	public function __construct()
	{
		
	}

	
	public function getWhiteLise($cusId)
	{
		$db = new Database();

		return $db->select("SELECT * FROM tbl_whitelist WHERE cusId='$cusId'");
	}

	public function delCart($sessionId)
	{
		$db = new Database();

		return $db->delete("DELETE FROM tbl_whitelist WHERE sId='$sessionId'");
	}
	public function delCartbyCusid($cusId)
	{
		$db = new Database();

		return $db->delete("DELETE FROM tbl_whitelist WHERE cusId='$cusId'");
	}
	

}


?>