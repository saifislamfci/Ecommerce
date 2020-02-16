<?php include ("inc/header.php");?>
    <?php 
       $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }?>
<style>
.tblone
{
	width: 50%; margin: 0px auto; border: 2px solid #ddd;
}
.tblone tr td
{
	text-align: justify;
}
.tblone input[type=text]
{
    width: 85%;
    padding:5px;
    font-size: 15px;
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
        <?php
        if (isset($_POST['submit']) && $_POST['submit'] == "Save" ) {   
        $id=Session::get('cusid');
        $csupdate=$cs->updateprofile($_POST,$id);
        if (isset($csupdate)) {
          echo $csupdate;
        }
        }
         ?>
    		
    	<form action="" method="post">
    	<table class="tblone">
    		<tr>
    			<td colspan="2" style="background-color: #ad8c8c; text-align: center; color: white;">Your profile</td>
    		</tr>
    		<tr>
    			<td style="width: 20%">Name</td>
    			<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
    		</tr>

    		 <tr>
    			<td>Mobile</td>
    			<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
    		</tr>
    		 <tr>
    			<td>gmail</td>
    			<td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
    		</tr>
    		<tr>
    			<td>zip code</td>
    			<td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
    		</tr>
    		<tr>
    			<td>Address</td>
    			<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
    		</tr>
    	    <tr>
    			<td>city</td>
    			<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
    		</tr>
    		<tr>
    			<td>Country</td>
    			<td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
    		</tr>
    	
    		<tr>
    			<td colspan="3" style="background-color: #ad8c8c; text-align: center;"><input type="submit" name="submit" value="Save"></td>
    		</tr>
    	</table>
    </form>
    <?php  } }?>
		
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>