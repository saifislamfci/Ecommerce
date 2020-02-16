<?php include "../classes/product.php"; ?>
<?php include_once '../helper/format.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$pd = new product();
$fm =new Format();
 
if (isset($_GET['delpro'])) {
	$id=$_GET['delpro'];
	$delid=$pd->delproductmethod($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php
      if (isset($delid)) {
      	  echo $delid;
         }
       ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th style="width: 5%;"> Sl No:</th>
					<th style="width: 10%;">product Name</th>
					<th style="width: 10%;">category Name</th>
					<th style="width: 10%;">Brand Name</th>
					<th style="width: 20%;">Boody</th>
					<th style="width: 10%;">Price</th>
					<th style="width: 15%;">image</th>
					<th style="width: 10%;">type</th>
					<th style="width: 10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$productlist=$pd->getallproduct();
				if ($productlist) {
					$i = 0;
					while ($result=$productlist->fetch_assoc()) {
					$i++;
				?>

				<tr class="odd gradeX">
					<td> <?php echo $i; ?></td>
					<td> <?php echo $result['pdname']; ?> </td>
					<td> <?php echo $result['cat_name']; ?> </td>
					<td> <?php echo $result['brandname']; ?> </td>
					<td> <?php echo $fm->textShorten($result['body'],50);?> </td>
					<td> $ &nbsp <?php echo $result['price']; ?> </td>
					<td><img src="upload/<?php echo $result['image']; ?>" height="40px" weidth="60px"> </td>
					<td> <?php if ($result['type'] == 0) {echo "Featured";}else{ echo "Genaral";}
					 ?> </td>
					<td> <a href="productedit.php?proid=<?php echo $result['pdid'];?>">Edit</a>  || <a onclick="return confirm('Are you sure delete!')" href="?delpro= <?php echo $result['pdid'];?>">Delete</a></td>
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

