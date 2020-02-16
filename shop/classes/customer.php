<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helper/format.php');
?>
<?php 
class customer{

	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}
 public function Customerdetails($data)
 {
 	 	$name = $this->fm->validation($data['name']);
 		$name =mysqli_real_escape_string($this->db->link,$name);

 		$city = $this->fm->validation($data['city']);
 		$city=mysqli_real_escape_string($this->db->link,$city);

 		$zip = $this->fm->validation($data['zip']);
 		$zip=mysqli_real_escape_string($this->db->link,$zip);

 		$email = $this->fm->validation($data['email']);
 		$email=mysqli_real_escape_string($this->db->link, $email);

 		$address =$data['address'];
 		$address=mysqli_real_escape_string($this->db->link,$address);

 		$country = $this->fm->validation($data['country']);
 		$country=mysqli_real_escape_string($this->db->link,$country);

 		$phone = $this->fm->validation($data['phone']);
 		$phone=mysqli_real_escape_string($this->db->link,$phone);

 		$pass = $this->fm->validation($data['pass']);
 		$pass= md5($pass);
 		$pass=mysqli_real_escape_string($this->db->link,$pass);

 		if (empty($name) || empty($city) || empty($zip) || empty($email) ||empty($address) || empty($country) ||empty($phone) || empty($pass) )  
 		{
 			
 			$msg ="<span style='color:red; font-size: 20px;'>All field are requeid!</span>";
 			return $msg;

 		}
 		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
 			$msg="<span style='color:red; font-size: 18px;'>Invalid gmail!</span>";
 			return $msg;
 		}
 		else
 		{
 		$query="SELECT * FROM tbl_customer WHERE email = '$email'";
 		$result=$this->db->select($query);
 		if($result) 
 		{
 			$msg="<span style='color:red; font-size: 20px;'>Gmail already exits!</span>";
 			return $msg;
 		}
 		else
 		{
 			$query="INSERT INTO tbl_customer(name,city,zip,email,address,country,phone,pass) values('$name','$city','$zip','$email','$address','$country','$phone','$pass')";
 			$res=$this->db->insert($query);
 		if ($res){
 			$rback="<span style='color:green;font-size: 18px;'>Registration Successful</span>";
 			return $rback;
 		}
 		else
 		{
 			$rback="<span style='color:red; font-size: 18px;'> Registration  NOT Successful </span>";
 			return $rback;
 		}

 		}
 	}

 }


 public function Customerlogin($data)
 {
 	$emandpn = $this->fm->validation($data['email']);
 	$emandpn  =mysqli_real_escape_string($this->db->link, $emandpn);
 	$pass = $this->fm->validation($data['password']);
 	$pass= md5($pass);
 	$pass=mysqli_real_escape_string($this->db->link,$pass);
 	if (empty($emandpn) || empty($pass)) {
 		 	$msg ="<span style='color:red; font-size: 20px;'>All field are requeid!</span>";
 			return $msg;
 	}
 	else
 	{
 	$query="SELECT * FROM tbl_customer WHERE email= '$emandpn' AND  pass ='$pass' ";
 	$result=$this->db->select($query);
 	if ($result != false) {

 				$value=$result->fetch_assoc();
 				Session::set("cuslogin", true);
 				Session::set("cusid",  $value['id']);
 				Session::set("cusname", $value['name']);
 				header("Location:index.php");
 	}
 	else
 	{
 		$msg="<span style='color:red;font-size: 18px;'>Username and password are not match!</span>";
 		return $msg;

 	}
 	}

 }


 public function profileshow($id)
 {
 	$selectquery="SELECT * FROM tbl_customer WHERE id = '$id'";
 	$result=$this->db->select($selectquery);
 	return $result;
 }

 public function updateprofile($data,$id)
 {
 		$name = $this->fm->validation($data['name']);
 		$name =mysqli_real_escape_string($this->db->link,$name);

 		$city = $this->fm->validation($data['city']);
 		$city=mysqli_real_escape_string($this->db->link,$city);

 		$zip = $this->fm->validation($data['zip']);
 		$zip=mysqli_real_escape_string($this->db->link,$zip);

 		$email = $this->fm->validation($data['email']);
 		$email=mysqli_real_escape_string($this->db->link, $email);

 		$address =$data['address'];
 		$address=mysqli_real_escape_string($this->db->link,$address);

 		$country = $this->fm->validation($data['country']);
 		$country=mysqli_real_escape_string($this->db->link,$country);

 		$phone = $this->fm->validation($data['phone']);
 		$phone=mysqli_real_escape_string($this->db->link,$phone);

 		if (empty($name) || empty($city) || empty($zip) || empty($email) ||empty($address) || empty($country) ||empty($phone))  
 		{
 			$msg ="<span style='color:red; font-size: 20px;'>All field are requeid!</span>";
 			return $msg;

 		}
 		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
 			$msg="<span style='color:red; font-size: 18px;'>Invalid gmail!</span>";
 			return $msg;
 		}
 		else
 		{
 			$query="INSERT INTO tbl_customer(name,city,zip,email,address,country,phone) values('$name','$city','$zip','$email','$address','$country','$phone',)";

 	$query="UPDATE tbl_customer SET 
				name	= '$name',
				city	= '$city',
				zip		= '$zip',
				email	= '$email',
				address = '$address',
				country  ='$country',
				phone	= '$phone'
				WHERE id= ' $id' ";

	$update_row=$this->db->update($query);
 		if ($update_row){
 			$rback="<span style='color:green;font-size: 18px;'>Updated Your Profile.</span>";
 			return $rback;
 		}
 		else
 		{
 			$rback="<span style='color:red; font-size: 18px;'> Update  NOT Successful </span>";
 			return $rback;
 		}

 		}
 	}
 	public function viewshow($id)
 	{
 	$selectquery="SELECT * FROM tbl_customer WHERE id = '$id'";
 	$result=$this->db->select($selectquery);
 	return $result;
 	}



 }//class
 ?>

 	
 		