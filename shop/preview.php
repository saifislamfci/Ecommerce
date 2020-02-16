<?php include ("inc/header.php");?>
<style>
	.comapare{
	background: #602d8d url(../images/large-button-overlay.png) repeat scroll 0 0;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    color: #fff;
    font-family: Arial,"Helvetica Neue","Helvetica",Tahoma,Verdana,sans-serif;
    font-size: 0.8em;
    padding: 7px 15px;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
    cursor: pointer;
    outline: none;
}
</style>

 <div class="main">
    <div class="content">

<?php
$db= new Database;
$getid=mysqli_real_escape_string($db->link,$_GET['proid']);

if (!isset($getid) || $getid == NULL) {
    echo "<script>window.location='404.php';</script>";
}
else
{
    $id=$getid;
}

?>
<?php 
if (isset($_POST['submit']) && ($_POST['submit']) == 'Buy Now' )
{
	$quantity=$_POST['quantity'];
	$addtocart=$cart->addtocart($id,$quantity);
}
?>
<?php 
if (isset($_POST['addtolist']) && $_POST['addtolist']=='Add to list' )
{
	$csid= Session::get('cusid');
	$pdid=$_POST['addid'];
	$pdtocompare=$pd->addtocompare($pdid,$csid);
}
?>

    <div class="section group">
    		<?php 
		$getsinglepro=$pd->getsinglepro($id);
		if ($getsinglepro) {
	while ($result=$getsinglepro->fetch_assoc()) {?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php  echo $result['image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['pdname']; ?> </h2>
									
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['cat_name']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandname']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" min="1" max="100" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
					<?php if(isset($addtocart))
					{
						echo $addtocart;
					}
					?>			
				</div>
				<?php
    			$login=Session::get('cuslogin');
    			if ($login == true) {?>
				<div class="add-cart">

					<form action="" method="post">
						<input type="hidden" class="buysubmit" name="addid" value="<?php echo $result['pdid']; ?>"/>
						<input type="submit" class="buysubmit" name="addtolist" value="Add to list"/>
					</form>	
				<?php 
				if (isset($pdtocompare)) {
					echo $pdtocompare;
				}
				?>
							
				</div>
			<?php }?>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body']; ?>
	       
	    </div>
				
				</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<?php
					$getcategory=$cart->getcategory();
					if ($getcategory) {
						while ($result=$getcategory->fetch_assoc()) {	?>
					<ul>
				      <li><a href="productbycat.php?proid=<?php echo $result['id']; ?>"> <?php  echo $result['cat_name']; ?></a></li>
    				</ul>
    		<?php  } }?>
 				</div>
 		</div>
 	<?php }} ?>
 	</div>
	</div>
<?php include ("inc/footer.php");?>