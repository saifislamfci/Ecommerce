
<?php include "../classes/addcat.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$listcatatory= new addcat;
if (isset($_GET['delcat'])) {
	$id=$_GET['delcat'];
	$delid=$listcatatory->delcatmethod($id);
}


 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

					if (isset($delid)) {
						echo $delid;
					}
						 ?>
						<?php
							$catlist=$listcatatory->allcatlist();
							if ($catlist) {
								$i=0;
								while($result= $catlist->fetch_assoc())
								{
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['id'];?>">Edit</a> || <a 
								onclick=" return confirm('Are you sure delete!')" href="?delcat= <?php echo $result['id'];?>">Delete</a></td>
						</tr>
					<?php }} ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

