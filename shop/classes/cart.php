<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helper/format.php');
?>
<?php 
class cart{

	private $db;
 	private $fm;
 	public function __construct()
 	{
 		$this->db=new Database;
 		$this->fm=new Format;
 	}

 public function addtocart($id,$quantity)
 {
 	$pdid=$id;

 	$quantity = $this->fm->validation($quantity);
 	$quantity=mysqli_real_escape_string($this->db->link,$quantity);

 	$ssid=session_id();

 	$selectquery="SELECT * FROM tbl_product WHERE pdid = '$pdid' ";
 	$res=$this->db->select($selectquery);
 	if ($res) {
 	 		while ($result=$res->fetch_assoc()) {
 			$image= $result['image'];
 			$pdname= $result['pdname'];
 			$price= $result['price']; 
 	 	}}

 	 	$chekquery="SELECT * FROM tbl_cart WHERE pdid = '$pdid' AND ssid='$ssid' ";
 	 	$getpro=$this->db->select($chekquery);
 	 	if ($getpro) 
 	 	{
 	 		$msg="<span style='color:red;font-size: 16px;'>product already added!</span>";
 	 		return $msg;
 	 	}
 	 	else
 	    {
 		$insertquery="INSERT INTO tbl_cart(ssid,pdid,pdname,price,quentity,image) values('$ssid','$pdid','$pdname','$price','$quantity','$image')";
 		$insert_row=$this->db->insert($insertquery);
 		if ($insert_row) 
 		{
 			header("Location:cart.php");
 		}
 		else
 		{
 			header("Location:404.php");
 		}
 	}
 }

 public function getproductcart()
 {
 	$ssid=session_id();
 	$selectquery="SELECT * FROM tbl_cart WHERE ssid = '$ssid' ";
 	$result=$this->db->select($selectquery);
 	return $result;
 }

 public function updatecart($quantity,$cartid)
 {
 	$cartid	 = mysqli_real_escape_string($this->db->link,$cartid);
 	$quantity=mysqli_real_escape_string($this->db->link,$quantity);
 	$query="UPDATE tbl_cart SET 
				quentity= '$quantity'
				WHERE cartid= '$cartid' ";
	$update_row=$this->db->update($query);
	if ($update_row)
	{
		echo "<script>window.location='cart.php';</script>";
		
	}
	else
	{
		$upback= "<span style='color:red;font-size: 18px;'> Not updated Product.</span>";
		return $upback;
	}
 }

	public function deletetocart($delid)
	{
	$id	 = mysqli_real_escape_string($this->db->link, $delid);
	$query= "DELETE FROM tbl_cart WHERE cartid= '$id' ";
 	$delrow=$this->db->delete($query);
	if ($delrow) {

 		echo "<script>window.location='cart.php';</script>";
			}
	 else
 	{
 		echo "producted Not deleted";
 	}
	}
//header
	public function checkgetdata()
	{
	$ssid=session_id();
	$query="SELECT * FROM tbl_cart WHERE ssid = '$ssid' ";
 	$res=$this->db->select($query);
 	if ($res) {
 		$sum=0;
 	 		while ($result=$res->fetch_assoc()) {
 			$quentity= $result['quentity'];
 			$price   = $result['price']; 
 			$total= $result['price'] *  $result['quentity'];
 			 $sum = $sum + $total;
 	 	}}
 	 	
 	 	if (isset($sum)) {
 	 	$value= $sum * 0.00;
 	 	$values= $sum +$value;
 	 	return $values;
 	 	}	

	}

public function checkgetquenty()
	{
	$ssid=session_id();
	$query="SELECT * FROM tbl_cart WHERE ssid = '$ssid' ";
 	$res=$this->db->select($query);
 	if ($res) {
 		$q=0;
 	 		while ($result=$res->fetch_assoc()) {
 			$quentity= $result['quentity'];	
 			$q=$q+$quentity;	
 	 	}}
 	 	if (isset($q)) {
 	 			return $q;
 	 		}
 	 		else{
 	 			$q= 0;
 	 			return false;
 	 		}	
 	 }

public function getcategory()
 {
 	$selectquery="SELECT * FROM tbl_cat";
 	$result=$this->db->select($selectquery);
 	return $result;
 }
 public function delcustormdata()
 {
 	$ssid=session_id();
 	$deletedata="DELETE FROM tbl_cart WHERE ssid = '$ssid' ";
 	$result=$this->db->select($deletedata);
 	return $result;
 }
public function insertorder($csid)
{
	$ssid=session_id();
 	$selectdata="SELECT * FROM tbl_cart WHERE ssid = '$ssid' ";
 	$result=$this->db->select($selectdata);
 	if ($result)
 	{
 		while($value =$result->fetch_assoc()) {
 			$pdid 	  =$value['pdid'];
 			$pdname   =$value['pdname'];
 			$price    =$value['price'];
 			$quantity =$value['quentity'];
 			$image    =$value['image'];
 			$insertquery="INSERT INTO tbl_order (cmr_id,pdid,pdname,price,quentity,image,Status) values ('$csid','$pdid','$pdname','$price','$quantity','$image',0) ";
 			$inserorder=$this->db->insert($insertquery);
 	
 		}
 		return $inserorder;
 	}

}

public function ordermony($cusid)
{
	$query="SELECT * FROM tbl_order WHERE cmr_id = '$cusid' ";
 	$res=$this->db->select($query);
 	return $res;
}
public function orderdetails($cusid)
{
$query="SELECT * FROM tbl_order WHERE cmr_id = '$cusid' ";
 	$res=$this->db->select($query);
 	return $res;	
}
public function checkordermenu($cusid)
{
	$query="SELECT * FROM tbl_order WHERE cmr_id = '$cusid'";
 	$res=$this->db->select($query);
 	return $res;	
}
public function getorder()
{
	$query="SELECT * FROM tbl_order ORDER BY date DESC";
 	$result=$this->db->select($query);
 	return $result;
}
public function Shifted($id,$time)
{
	$id	 = mysqli_real_escape_string($this->db->link, $id);
	$time	 = mysqli_real_escape_string($this->db->link, $time);

 	$query="UPDATE tbl_order SET 
				Status = '1'
				WHERE id= '$id' AND date='$time'";
	$update_row=$this->db->update($query);
	if ($update_row)
	{
	$upback= "<span style='color:green;font-size: 18px;'> updated Status.</span>";
	return $upback;
	}
	else
	{
		$upback= "<span style='color:red;font-size: 18px;'> Not updated Status.</span>";
		return $upback;
	}

}
public function custromerShifted($id,$time)
{
	$id	 = mysqli_real_escape_string($this->db->link, $id);
	$time	 = mysqli_real_escape_string($this->db->link, $time);

 	$query="UPDATE tbl_order SET 
				Status = '2' 
				WHERE cmr_id ='$id' AND date ='$time' ";
	$update_row=$this->db->update($query);
	if ($update_row)
	{
	$upback= "<span style='color:green;font-size: 18px;'> updated Status.</span>";
	return $upback;
	}
	else
	{
		$upback= "<span style='color:red;font-size: 18px;'> Not updated Status.</span>";
		return $upback;
	}
}
public function delorder($id,$time)
{
	$id	 	  = mysqli_real_escape_string($this->db->link, $id);
	$time	  = mysqli_real_escape_string($this->db->link, $time);

	$deletedata="DELETE FROM tbl_order WHERE id='$id' AND date = '$time' ";
 	$result=$this->db->delete($deletedata);
 	if ($result) {
 	$upback= "<span style='color:green;font-size: 18px;'> updated Status.</span>";
	return $upback;
 	}
 	else
 	{
 		$upback= "<span style='color:red;font-size: 18px;'> Not updated Status.</span>";
		return $upback;
 	}

}


 }//class}
