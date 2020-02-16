<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helper/format.php');
?>
<?php 
class brand{

	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}

 public function addbrand($addbrand)
 	{
 		$addname = $this->fm->validation($addbrand);
 		$addname=mysqli_real_escape_string($this->db->link,$addname);
 	if (empty($addname)) {
 		   $rback= "<span style='color:red;font-size: 18px;'> YOU are not category name.</span>";;
 			return $rback;
 	} 
 	else {
 		$query="INSERT INTO brand(brandname) values('$addname')";
 		$result=$this->db->insert($query);
 		if ($result) {
 			$rback="<span style='color:green;font-size: 18px;'> Category add successful</span>";
 			return $rback;
 		}
 		else
 		{
 			$rback="<span style='color:red; font-size: 18px;'> Category add successful.</span>";
 			return $rback;
 		}
 	}
 	}


 public function allbrand()
 	{
 	$query="SELECT * FROM brand ORDER BY id DESC";
 	$result=$this->db->select($query);
 	return $result;
 	}

 public function delbrand($id)
 	{
 	$id=mysqli_real_escape_string($this->db->link,$id);
 	$query= "DELETE FROM brand WHERE id= '$id' ";
 	$delete_row=$this->db->delete($query);
 	if ($delete_row) {
 		$msg="<span style='color:green;font-size: 18px; background:yellow;'>Brand deleted.</span>";
 		return $msg;
 	}
 	else
 	{
 		$msg="<span style='color:red;font-size: 18px;'>Brand NOT deleted.</span>";
 		return $msg;
 	}
 	}

 public function brandshow($id)
 		{
 	$query="SELECT * FROM brand WHERE id='$id' ";
 	$result=$this->db->select($query);
 	return $result;
 		}

 public function brandupdate($upbrand,$id)
 	{
 	$upname = $this->fm->validation($upbrand);
 	$updatename=mysqli_real_escape_string($this->db->link,$upname);
 	if (empty($updatename)) {
 		   $rback= "<span style='color:red;font-size: 18px;'> YOU are not update category name.</span>";
 			return $rback;
 	} 
 	else
 	{
 	$query="UPDATE brand SET 
				brandname= '$updatename'
				WHERE id= '$id' ";
	$update_row=$this->db->update($query);
	if ($update_row)
	{
		$upback= "<span style='color:green;font-size: 18px;'>update category Name.</span>";
		return $upback;
	}
	else
	{
		$upback= "<span style='color:red;font-size: 18px;'> Not update category Name.</span>";
		return $upback;
	}
 	}
 }

 }//class
 ?>