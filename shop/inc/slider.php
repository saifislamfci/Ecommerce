	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
				$iphonefrom=$pd->brandfromiphone();
				if ($iphonefrom) {
					while ($result=$iphonefrom->fetch_assoc()) { ?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid= <?php echo $result['pdid'];?>"> <img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $result['pdname'];?>"</p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['pdid'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php }}?>
			   	<?php 
				$samsungfrom=$pd->brandfromsamsung();
				if ($samsungfrom) {
					while ($result=$samsungfrom->fetch_assoc()) { ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?proid= <?php echo $result['pdid'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $result['pdname'];?></p>
						  <div class="button"><span><a href="preview.php?proid= <?php echo $result['pdid'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php }}?>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
				<?php 
				$acerfrom=$pd->brandfromacer();
				if ($acerfrom) {
					while ($result=$acerfrom->fetch_assoc()) { ?>	
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid= <?php echo $result['pdid'];?>"> <img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $result['pdname'];?></p>
						<div class="button"><span><a href="preview.php?proid= <?php echo $result['pdid'];?>">Add to cart</a></span></div>
				   </div>
				   <?php }}?>
			   </div>
			   <?php 
				$canonfrom=$pd->brandfromcanon();
				if ($canonfrom) {
					while ($result=$canonfrom->fetch_assoc()) { ?>				
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?proid= <?php echo $result['pdid'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p><?php echo $result['pdname'];?></p>
						  <div class="button"><span><a href="preview.php?proid= <?php echo $result['pdid'];?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php }}?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>