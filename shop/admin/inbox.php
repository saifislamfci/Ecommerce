<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
.view a:visited {
  color: blue;
}
</style>
<?php 
$realpath = realpath(dirname(__FILE__));
include_once($realpath.'/../classes/cart.php');
include_once($realpath.'/../helper/format.php');
$cart=new cart();
$fm=new format();
?>

<?php
	if (isset($_GET['id']) && isset($_GET['time'])) {
		$id    =$_GET['id'];
		$time  =$_GET['time'];	
		$Shifted=$cart->Shifted($id,$time);
	}
 ?>
 <?php 
 if (isset($_GET['delid'])) {
 		$id    =$_GET['delid'];
		$time  =$_GET['time'];

		$delorder=$cart->delorder($id,$time);
 		}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                    	<?php
                    	if (isset($Shifted)) {
                    		echo $Shifted;
                    	}
                    	 ?>
					<thead>
						<tr>
							<th style="width: 5%">ID</th>
							<th style="width: 20%">Time</th>
							<th style="width: 15%">Product Name</th>
							<th style="width: 10%">Image</th>
							<th style="width: 10%">price</th>
							<th style="width: 10%">Qty</th>
							<th style="width: 10%">Total price</th>
							<th style="width: 10%">Address</th>
							<th style="width: 10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$cusid = Session::get("cusid");
						$getorder=$cart->getorder($cusid);
						if ($getorder) {
							$i= 0;
							while ($result=$getorder->fetch_assoc()) {
								$i++;
							 ?>
						<tr class="odd gradeX">
							<td style="font-weight: bold;"> <?php echo $result['cmr_id'] ?> </td>
							<td><?php echo $fm->formatDate($result['date'])?></td>
							<td><?php echo $result['pdname']?></td>
							<td><img src="upload/<?php echo $result['image']?>" width="40px" height="20px"></td>
							<td><?php echo $result['price']?></td>
							<td><?php echo $result['quentity']?></td>
							<td style="color:green">$<?php 
							$totalprice=$result['price']*$result['quentity'];
							echo $totalprice;
							?></td>
							<td class="view"><a href="viewcustomer.php?csid=<?php echo $result['cmr_id'] ?>">View</a></td>
							
						<?php
						if ($result['Status'] == 0) {?>
							<td><a href="?id=<?php echo $result['id']?>&time=<?php echo$result['date'];?>">Shifted</a></td>
						<?php }elseif($result['Status'] == 1){ ?>
								 <td>pending</td>
								<?php }else { ?>
							<td><a onclick="return confirm('Are you sure delete!')" href="?delid=<?php echo $result['id']?>&time=<?php echo$result['date'];?>">Remove</a></td>
								<?php } ?>
						
						</tr>
					<?php }}?>
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
