<?php include ("inc/header.php");?>
    <?php 
       $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
     if (isset($_GET['customid']) && ($_GET['time']) )
  	{
	$id   =  $_GET['customid'];
	$time =  $_GET['time'];
	$custromid=$cart->custromerShifted($id,$time);
	}
	if (isset($custromid)) {
		echo $custromid;
	}

 ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3 style="color:green">Your Order Details</h3>
			    	
						<table class="tblone">
							<tr>
								<th width="5%">NO</th>
								<th width="15%">Product Name</th>
								<th width="10%">Price</th>
								<th width="15%">Image</th>
								<th width="10%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Date</th>
								<th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
						<?php
							$cusid=Session::get("cusid");
							$orderdetails=$cart->orderdetails($cusid);
							if ($orderdetails) {
								$i=0;
								$sum=0;
								while ($result=$orderdetails->fetch_assoc()) {
									$i++
							?>

							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $fm->textShorten($result['pdname'],20)?></td>
								<td>$<?php echo $result['price']?></td>
								<td><img src="admin/upload/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['quentity']?></td>
								<td>$
									<?php $total=$result['price'] *  $result['quentity']?>
									<?php echo  $total; ?>
										
								</td>
								<td><?php echo $fm->Datefomrate($result['date'])?></td>
								<td>
								<?php
								if($result['Status'] == '0')
								{
									echo "Pending";
								}
								elseif($result['Status'] == '1'){
									echo "Shifted";
								}
							   else{ 
										echo "OK ";
									}
								?>
									
								
								</td>
								<td>
									
									<?php 
									if ($result['Status'] == '0') {?>
									<p>pending</p>
								<?php } elseif($result['Status'] == '1') {?>
								<button> <a href="?customid=<?php echo $cusid;?>&time=<?php echo$result['date'];?>">confirm</a></button>
									<?php }elseif($result['Status'] == '2') {echo "OK";}?>
									
								
								</td>
							</tr>
									<?php $sum = $sum + $total;?>
									<?php }} ?>
						
					   </table>
					
			
					</div>
					</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>