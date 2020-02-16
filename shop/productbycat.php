<?php include ("inc/header.php");?>
<?php 
$db= new Database;
$getid=mysqli_real_escape_string($db->link,$_GET['proid']);

if (!isset($getid) || $getid == NULL) {
    echo "<script>window.location='catlist.php';</script>";
}
else
{
    $id=$getid;
}
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	$getcatall=$pd->getcatall($id);
	      	if ($getcatall) {
	      		while ($result=$getcatall->fetch_assoc()) { ?>

				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php echo $result['pdid'];?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					 <h2> <?php echo $result['pdname'];?> </h2>
					 <p><?php echo $fm->textShorten($result['body'],60)?></p>
					 <p><span class="price">$ <?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['pdid'];?>" class="details">Details</a></span></div>
				</div>
			<?php  }} else{ echo "upcoming added!";} ?>
			</div>

	
	
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>