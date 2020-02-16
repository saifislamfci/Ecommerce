<?php include ("inc/header.php");?>
    <?php 
    $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
    ?>
<style>
.tblone
{
	width: 50%; margin: 0px auto; border: 2px solid #ddd;
}
.tblone tr td
{
	text-align: justify;
}
</style>
 <div class="main">
    <div class="content">
    	<?php
    	$id=Session::get('cusid');
    	$profileshow=$cs->profileshow($id);
    	?>
    	<?php if ($profileshow) { 
    		while ($result= $profileshow->fetch_assoc()) {
    		?>
    		
    	
    	<table class="tblone">
    		<tr>
    			<td colspan="3" style="background-color: #ad8c8c; text-align: center; color: white;">Your profile</td>
    		</tr>
    		<tr>
    			<td style="width: 20%">Name</td>
    			<td style="width: 5%">:</td>
    			<td><?php echo $result['name'];?></td>
    		</tr>

    		 <tr>
    			<td>Mobile</td>
    			<td>:</td>
    			<td><?php echo $result['phone'];?></td>
    		</tr>
    		 <tr>
    			<td>gmail</td>
    			<td>:</td>
    			<td><?php echo $result['email'];?></td>
    		</tr>
    		<tr>
    			<td>zip code</td>
    			<td>:</td>
    			<td><?php echo $result['zip'];?></td>
    		</tr>
    		<tr>
    			<td>Adress</td>
    			<td>:</td>
    			<td><?php echo $result['address'];?></td>
    		</tr>
    	    <tr>
    			<td>city</td>
    			<td>:</td>
    			<td><?php echo $result['city'];?></td>
    		</tr>
    		<tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country'];?></td>
    		</tr>
    	
    		<tr>
    			<td colspan="3" style="background-color: #ad8c8c; text-align: center;"><a href="updateprofile.php"><span style="color:white;">Update profile</span></a></td>
    		</tr>
    	</table>
    <?php  } }?>
		
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>