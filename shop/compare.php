<?php include ("inc/header.php");?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
							
							<?php 
							$csid = Session::get('cusid');
							$getcomare=$pd->getcomare($csid);
							if ($getcomare) {
								$i=0;
								while ($result=$getcomare->fetch_assoc()) {
									$i++
							?>
							<?php 
							if (isset($_GET['productid'])) {
								$csid = Session::get('cusid');
								$productid =$_GET['productid'];
								$clearsave=$pd->clearsave($csid,$productid);
								if ($clearsave) {
									echo "<script>window.location='compare.php';</script>";
								}
							}

							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['pdname']?></td>
								<td><img src="admin/upload/<?php echo $result['image'];?>" height="60px" width="80px" alt=""/></td>
								<td>$<?php echo $result['price']?></td>
								<td><button><a href="preview.php?proid=<?php echo $result['pdid'];?>">View</a></button>||<button><a href="preview.php?proid=<?php echo $result['pdid'];?>">Buy Now</a></button>||<button><a href="?productid=<?php echo $result['pdid'];?>">Clear</a></button></td>
							</tr>
						<?php }} ?>
					   </table> 
					
					   	
			
					</div>
					<div class="shopping">
						<div style="float: right;" class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>