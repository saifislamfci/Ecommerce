
<?php include "../classes/brand.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$brandlist= new brand;
 if (isset($_GET['delbrand'])) {
	$id=$_GET['delbrand'];
	$delid=$brandlist->delbrand($id);
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
							$brandlist=$brandlist->allbrand();
							if ($brandlist) {
								$i=0;
								while($result= $brandlist->fetch_assoc())
								{
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandname'];?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['id'];?>">Edit</a> || <a 
								onclick=" return confirm('Are you sure delete!')" href="?delbrand= <?php echo $result['id'];?>">Delete</a></td>
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

