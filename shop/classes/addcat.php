<?php
include_once '../lib/database.php';
include_once '../helper/format.php';
?>
<?php 
class addcat{

	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}
 	public function addcatagory($addcat)
 	{
 		$addname = $this->fm->validation($addcat);
 		$addname=mysqli_real_escape_string($this->db->link,$addname);
 	if (empty($addname)) {
 		   $rback= "<span style='color:red;font-size: 18px;'> YOU are not category name.</span>";
 			return $rback;
 	} 
 	else {
 		$query="INSERT INTO tbl_cat(cat_name) values('$addname')";
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

 public function allcatlist()
 {
 	$query="SELECT * FROM tbl_cat ORDER BY id DESC";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function catshow($id)
 {
 	$query="SELECT * FROM tbl_cat WHERE id='$id' ";
 	$result=$this->db->select($query);
 	return $result;
 }

 public function catupdate($upcat,$id)
 {
 	$upname = $this->fm->validation($upcat);
 	$updatename=mysqli_real_escape_string($this->db->link,$upname);
 	if (empty($updatename)) {
 		   $rback= "<span style='color:red;font-size: 18px;'> YOU are not update category name.</span>";
 			return $rback;
 	} 
 	else
 	{
 	$query="UPDATE tbl_cat SET 
				cat_name= '$updatename'
				WHERE id='$id' ";
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
 public function delcatmethod($id)
 {
 	$id=mysqli_real_escape_string($this->db->link,$id);
 	$query= "DELETE FROM tbl_cat WHERE id= '$id' ";
 	$delete_row=$this->db->delete($query);
 	if ($delete_row) {
 		$msg="<span style='color:green;font-size: 18px;'>category deleted.</span>";
 		return $msg;
 	}
 	else
 	{
 		$msg="<span style='color:red;font-size: 18px;'>category NOT deleted.</span>";
 		return $msg;
 	}
 }



 	

}//class

?>
