<?php include ("inc/header.php");?>
<?php include ("inc/slider.php");?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$getFpd=$pd->getFea_method();
	      	if ($getFpd) {
	      		while ($result=$getFpd->fetch_assoc()) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $result['pdid'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['pdname'];?> </h2>
					 <p><?php echo $fm->textShorten($result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['pdid'];?>" class="details">Details</a></span></div>
				</div>
			<?php }} ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
			$getNpd=$pd->getNew_method();
	      	if ($getNpd) {
	      		while ($result=$getNpd->fetch_assoc()) { ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid= <?php echo $result['pdid'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['pdname'];?> </h2>
					 <p><?php echo $fm->textShorten($result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['pdid'];?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
		</div>
    </div>
 </div>
</div>
<?php include ("inc/footer.php");?>
  