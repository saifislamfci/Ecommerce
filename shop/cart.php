<?php include ("inc/header.php");?>
<?php 
if (isset($_GET['delpro']))
{
	$delid  =  $_GET['delpro'];
	$deletertocart=$cart->deletetocart($delid);
}
?>
<?php 
if (isset($_POST['submit']) && $_POST['submit'] == "Update")
{
	$quantity= $_POST['quantity'];
	$cartid  =  $_POST['catid'];
	$updatecart=$cart->updatecart($quantity,$cartid);
	if ($quantity < 1)
 {
	 $deletertocart=$cart->deletetocart($cartid);
}

}

?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<?php if (isset($updatecart)) {
					echo $updatecart;} ?>
				<?php 
				if (isset($deletertocart)){
					echo $deletertocart;}
				?>
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="5%">S.I</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							
							<?php 
							$getproduct=$cart->getproductcart();
							if ($getproduct) {
								$i=0;
								$sum=0;
								while ($result=$getproduct->fetch_assoc()) {
									$i++
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['pdname']?></td>
								<td><img src="admin/upload/<?php echo $result['image'];?>" alt=""/></td>
								<td>$<?php echo $result['price']?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="catid" value="<?php echo $result['cartid'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quentity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$
									<?php $total=$result['price'] *  $result['quentity']?>
									<?php echo  $total; ?>
										
									</td>
								<td><a onclick=" return confirm('Are you sure delete!')" href="?delpro=<?php echo $result['cartid']; ?>">X</a></td>
							</tr>
								<?php $sum = $sum + $total;?>
								<?php }} ?>
						
					   </table>
					   <?php if (isset($sum)) {?>
					   	<table style="float:right;text-align:left; box-shadow: 0px 1px 0px 1px; line-height: 20px;" width="40%">
							<tr>
								<th style="color:green; font-style: normal; font-weight: bold;">Sub Total : </th>
								<td><?php echo $sum; ?></td>
							</tr>
							<tr>
								<th style="color:green; font-style: normal; font-weight: bold;">VAT : </th>
								<td> 0% </td>
							</tr>
							<tr>
								<th style="color:red; font-size: 20px; font-style: normal; font-weight: bold;">Grand Total :</th>
								
								 <?php

								      $value= $sum * 0.00;
									   $values= $sum +$value;
								 ?>
								 
								<td style="color: red; font-size: 20px;font-weight: bold; text-decoration: underline;"><?php echo $values; ?></td>
							</tr>
					   </table>
					<?php }else{ echo "<span style='color:red; font-weight:bold;'>Cart Empty! Plz shop Now.</span>";}?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>