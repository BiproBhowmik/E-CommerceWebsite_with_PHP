<?php 

/**
 * 
 */
class CustomerDetails
{
	
	public function __construct()
	{
		
	}

	public function insertCustomerDetails($all)
	{
		$db = new Database();
		$vld = new helper();
		$name = $vld->validation($all['cusName']);
		$city = $vld->validation($all['cusCity']);
		$zip = $vld->validation($all['cusZip']);
		$email = $vld->validation($all['cusEmail']);
		$address = $vld->validation($all['cusAddress']);
		$country = $vld->validation($all['cusCountry']);
		$phone = $vld->validation($all['cusPhone']);
		$pass = $all['cusPass'];

		$q = $db->select("SELECT * FROM tbl_customer WHERE cusEmail='$email'");
		
		if (empty($name) || empty($city) || empty($zip) || empty($email) || empty($address) || empty($country) || empty($phone) || empty($pass)) {
			echo "Can't be Empty";
		}
		else if ($q) {
			echo "You Are Registered Already";
		}
		else
		{
			$query = "INSERT INTO tbl_customer (cusName, cusCountry, cusCity, cusAddress, cusZipcode, cusEmail, cusPhone, cusPassword) VALUES ('$name', '$country', '$city', '$address', '$zip', '$email', '$phone', '$pass')";
			$result = $db->insert($query);
			if ($result != false) {
				echo "Inserted";
			}
			else
			{
				echo "Not inserted";
			}
		}

	}

	public function login($email, $pass)
	{
		$db = new Database();
		$q = $db->select("SELECT * FROM tbl_customer WHERE cusEmail='$email' AND cusPassword='$pass'");
		if ($q != false) {
			$value = $q->fetch_assoc();
			Session::init();
			Session::set("cusLogin", true);
			Session::set("cusId", $value['cusId']);
			Session::set("cusName", $value['cusName']);
			
			header("Location:products.php");
		}
		else
		{
			echo "Not Regesterd";
		}
	}

	public function cusDetailsById($cusId)
	{
		$db = new Database();
		$q = $db->select("SELECT * FROM tbl_customer WHERE cusId='$cusId'");

		return $q;
	}


}


?>