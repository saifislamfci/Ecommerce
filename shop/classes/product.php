<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helper/format.php');
?>
<?php 
class product{

	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}
 public function addproduct($data, $file)
 {
 	 	$pdname = $this->fm->validation($data['pdname']);
 		$pdname=mysqli_real_escape_string($this->db->link,$pdname);

 		$catid =$data['catid'];
 		$catid=mysqli_real_escape_string($this->db->link,$catid);

 		$brandid = $this->fm->validation($data['brandid']);
 		$brandid=mysqli_real_escape_string($this->db->link,$brandid);

 		$body = $data['body'];
 		$body=mysqli_real_escape_string($this->db->link,$body);

 		$price = $this->fm->validation($data['price']);
 		$price=mysqli_real_escape_string($this->db->link,$price);

 		$type = $this->fm->validation($data['type']);
 		$type=mysqli_real_escape_string($this->db->link,$type);


 		//image
	 	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;

	    if (empty($pdname) || empty($catid) || empty($price) || empty($body ) || empty($file_name) ) {
	    	$msg="<span style='color:red;font-size: 16px;'> name, category,price,body,image requied.</span>";
	    	return $msg;
	    }//if
	    elseif ($file_size >24000000 ) {
     		$msg="<span style='color:red;font-size: 16px;'> Image Size should be less then 3MB!</span>";
     		return $msg;
    			} 
    	elseif (in_array($file_ext, $permited) === false) {
     	$msg="<span style='color:red;font-size: 16px;'>You can upload only:-".implode(', ', $permited)."</span>";
     	return $msg;
    	} 
    	else{
   	 	move_uploaded_file($file_temp, $uploaded_image);
   	 	$query="INSERT INTO tbl_product(pdname,catid,brandid,body,price,image,type) values('$pdname','$catid','$brandid','$body','$price','$unique_image','$type')";
 		$result=$this->db->insert($query);
 		if ($result) {
 			$msg="<span style='color:green;font-size: 18px;'>Product add successful.</span>";
 			return $msg;
 		}
 		else
 		{
 			$msg="<span style='color:red; font-size: 18px;'> Product add NOT successful.</span>";
 			return $msg;
 		}
 	}//else
 		
 }//mehod
public function delproductmethod($id)
{
	$id=mysqli_real_escape_string($this->db->link,$id);
	$selectquery="SELECT * FROM tbl_product WHERE pdid='$id' ";
 	$result=$this->db->select($selectquery);
 	if ($result) {
 		while ($res=$result->fetch_assoc()) {
 			$delimg=$res['image'];
 			unlink("upload/".$delimg);
 		}
 		}

 	$query= "DELETE FROM tbl_product WHERE pdid= '$id' ";
 	$delete_row=$this->db->delete($query);
 	if ($delete_row) {
 		$msg="<span style='color:green;font-size: 18px;'>product deleted.</span>";
 		return $msg;
 	}
 	else
 	{
 		$msg="<span style='color:red;font-size: 18px;'>product NOT deleted.</span>";
 		return $msg;
 	}
}


public function getallproduct()
{
	$query="SELECT p.*,c.cat_name,b.brandname FROM tbl_product as p,tbl_cat as c,brand as b WHERE p.catid = c.id AND p.brandid = b.id ORDER BY p.pdid DESC";
 	$result=$this->db->select($query);
 	return $result;
}
public function geteditproduct($id)
{
	$query="SELECT * FROM tbl_product WHERE pdid='$id' ";
 	$result=$this->db->select($query);
 	return $result;
}
//update product

public function proupdate($data,$file,$id)
{
		$pdname = $this->fm->validation($data['pdname']);
 		$pdname=mysqli_real_escape_string($this->db->link,$pdname);

 		$imageid =$data['imageid'];

 		$catid =$data['catid'];
 		$catid=mysqli_real_escape_string($this->db->link,$catid);

 		$brandid = $this->fm->validation($data['brandid']);
 		$brandid=mysqli_real_escape_string($this->db->link,$brandid);

 		$body = $data['body'];
 		$body=mysqli_real_escape_string($this->db->link,$body);

 		$price = $this->fm->validation($data['price']);
 		$price=mysqli_real_escape_string($this->db->link,$price);

 		$type = $this->fm->validation($data['type']);
 		$type=mysqli_real_escape_string($this->db->link,$type);


 		//image
	 	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;
	 if (!empty($file_name)) {
	 	 if ($file_size >24000000 ) {
     		$msg="<span style='color:red;font-size: 16px;'> Image Size should be less then 3MB!</span>";
     		return $msg;
    			} 
    	elseif (in_array($file_ext, $permited) === false) {
     	$msg="<span style='color:red;font-size: 16px;'>You can upload only:-".implode(', ', $permited)."</span>";
     	return $msg;
    			} 
    	else{
   	 	move_uploaded_file($file_temp, $uploaded_image);
   	 	unlink("upload/".$imageid);
   	 	$query=" UPDATE  tbl_product SET 
   	 	pdname='$pdname',
   	 	catid= '$catid',
   	 	brandid ='$brandid',
   	 	body='$body',
   	 	price='$price',
   	 	image='$unique_image',
   	 	type='$type' WHERE pdid= '$id' ";
 		$result=$this->db->update($query);
 		if ($result) {

 			$msg="<span style='color:green;font-size: 18px;'>Product update successful.</span>";
 			return $msg;
	 				}
	 	else
	 		{ 
	 			echo "Not updated";
	 		}
			}
		}
	else
	{
		$query=" UPDATE  tbl_product SET 
   	 	pdname='$pdname',
   	 	catid= '$catid',
   	 	brandid ='$brandid',
   	 	body='$body',
   	 	price='$price',
   	 	type='$type' WHERE pdid= '$id' ";
 		$result=$this->db->update($query);
 		if ($result) {
 			$msg="<span style='color:green;font-size: 18px;'>Product updated successful.</span>";
 			return $msg;
	 				}
	}
	


}//method

public function getFea_method()
{
	$query="SELECT * FROM tbl_product WHERE type='0' ORDER BY pdid DESC LIMIT 4 ";
 	$result=$this->db->select($query);
 	return $result;
}

public function getNew_method()
{
	$query="SELECT * FROM tbl_product ORDER BY pdid DESC LIMIT 4 ";
 	$result=$this->db->select($query);
 	return $result;
}
public function getsinglepro($id)
{
	$query="SELECT p.*,c.cat_name,b.brandname FROM tbl_product as p,tbl_cat as c,brand as b WHERE p.catid = c.id AND p.brandid = b.id AND p.pdid='$id' ";
 	$result=$this->db->select($query);
 	return $result;

}
public function brandfromiphone()
{
	$query="SELECT * FROM tbl_product Where brandid= '8' ORDER BY pdid DESC LIMIT 1 ";
 	$result=$this->db->select($query);
 	return $result;
}
public function brandfromsamsung()
{
	$query="SELECT * FROM tbl_product Where brandid= '5' ORDER BY pdid DESC LIMIT 1 ";
 	$result=$this->db->select($query);
 	return $result;
}
public function brandfromacer()
{
	$query="SELECT * FROM tbl_product Where brandid= '1' ORDER BY pdid DESC LIMIT 1 ";
 	$result=$this->db->select($query);
 	return $result;
}
public function brandfromcanon()
{
	$query="SELECT * FROM tbl_product Where brandid= '9' ORDER BY pdid DESC LIMIT 1 ";
 	$result=$this->db->select($query);
 	return $result;
}


public function getcatall($id)
{
	$query="SELECT * FROM tbl_product Where catid = '$id' ORDER BY pdid DESC ";
 	$result=$this->db->select($query);
 	return $result;

} 
public function addtocompare($pdid,$csid)
{
	$query="SELECT * FROM tbl_compare Where pdid = '$pdid' AND cmr_id = '$csid' ";
 	$result=$this->db->select($query);
 	if ($result) {
 			$msg="<span style='color:red;font-size: 18px;'>Product already save.</span>";
 			return $msg;
 			exit();
 	}
 	else{
	$selectdata="SELECT * FROM tbl_product WHERE pdid = '$pdid' ";
 	$value=$this->db->select($selectdata)->fetch_assoc();
 	if ($value)
 	{
 			$pdname   =$value['pdname'];
 			$price    =$value['price'];
 			$image    =$value['image'];
 			$insertquery="INSERT INTO tbl_compare(cmr_id,pdid,pdname,price,image) values ('$csid','$pdid','$pdname','$price','$image') ";
 			$insertocompare=$this->db->insert($insertquery);
 	
 		if ($insertocompare) {
 			$msg="<span style='color:green;font-size: 18px;'>Product add to list.</span>";
 			return $msg;
 		}
 	}
 }

}
public function getcomare($csid)
{
	$query="SELECT * FROM tbl_compare WHERE cmr_id = '$csid' ";
 	$result=$this->db->select($query);
 	return $result;

}
public function checkcompare($cusid)
{
	$query="SELECT * FROM tbl_compare WHERE cmr_id = '$cusid'";
 	$res=$this->db->select($query);
 	return $res;	
}
public function clearsave($csid,$productid)
{
	$csid 	  = mysqli_real_escape_string($this->db->link, $csid);
	$productid	  = mysqli_real_escape_string($this->db->link, $productid);

	$deletedata="DELETE FROM tbl_compare WHERE  pdid = '$productid' AND cmr_id = '$csid' ";
 	$result=$this->db->delete($deletedata);
 	return $result;
}

 }//class
 ?>