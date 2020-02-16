<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helper/format.php');
include_once ($realpath.'/../lib/session.php');
					Session::checkLogin();
?>


<?php

 class Adminlogin
 {
 	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}
 	public function adminlogin($adminuser,$adminpass)
 	{
 		$username = $this->fm->validation($adminuser);
 		$userpass = $this->fm->validation($adminpass);

 		$username=mysqli_real_escape_string($this->db->link,$username);
 		$userpass=mysqli_real_escape_string($this->db->link,$userpass);
 		if (empty($username) || empty($userpass) ) {
 			$logerror = "username and Password requied";
 			return $logerror; 		
 		}
 		else
 		{
 			$query="SELECT * FROM admin_user WHERE adUser='$username' AND adPass='$userpass' ";
 			$result=$this->db->select($query);
 			if ($result != false ) 
 			{
 				$value=$result->fetch_assoc();
 				Session::set("adminlogin", true);
 				Session::set("adName",  $value['adName']);
 				Session::set("adminid", $value['adminid']);
 				Session::set("adUser",  $value['adUser']);
 				Session::set("adEmail", $value['adEmail']);
 				header("Location:index.php");

 			}
 			else
 			{
 			$logerror = "username and password not match!";
 			return $logerror; 	
 			}

 		}
 	}
 } 
?>