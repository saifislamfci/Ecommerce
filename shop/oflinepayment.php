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
	width: 60%; margin: 0px auto; border: 2px solid #ddd;
}
.tblone tr td
{
	text-align: justify;
}
.content
{
    height:  400px;
}
.right_content{ float: right;
    max-width: 50%;
    text-align: justify;
    line-height: 20px; 
}
.tbltwo{
    margin-right: 30px;

}
.tbl_three{margin-top: 43px; border-top: 2px solid #F1F1F5;}
.tbl_three  table th{ color:green;  }
.left_content { float: left; }
.order {margin: 0px auto;display: block;text-align: center;margin-top: 15px; margin-top: 20px;}
.order a{ text-decoration: none;    background: #c10000; color: white;  padding: 16px 47px; border: 1px solid #6b6565;}

</style>
 <div class="main">
    <div class="content">
        <div class="content_1">
            <?php 
            if (isset($_GET['orderid']) && $_GET['orderid'] == "order") {
                $csid= Session::get('cusid');

                $insertorder =$cart->insertorder($csid);
                if ($insertorder)
                {
                    $delcustormdata=$cart->delcustormdata();
                    header("Location:success.php");
                }

            }


            ?>
           
        <div class="left_content">
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
        <div class="right_content">
            <h2>Your choose product list</h2>
            <br>
                     <table class="tbltwo">
                            <tr style="background-color: #AD8C8C; padding: 10px;">
                                <th width="10%">S.I</th>
                                <th width="40%">Product Name</th>
                                <th width="15%">Price</th>
                                <th width="15%">Qty</th>
                                <th width="20%">Total Price</th>
                                
                            </tr>
                            
                            <?php 
                            $getproduct=$cart->getproductcart();
                            if ($getproduct) {
                                $i=0;
                                $sum=0;
                                while ($result=$getproduct->fetch_assoc()) {
                                    $i++
                            ?>
                            <tr>
                                <td ><?php echo $i;?></td>
                                <td><?php echo $result['pdname']?></td>
                                <td style="color: red;">$<?php echo $result['price']?></td>
                                <td><?php echo $result['quentity'];?> </td>
                                <td style="color: red; font-weight: bold;">$
                                    <?php $total=$result['price'] *  $result['quentity']?>
                                    <?php echo  $total; ?>
                                        
                                </td>
                            </tr>
                                <?php $sum = $sum + $total;?>
                                <?php }} ?>
                        
                       </table>
                       <?php if (isset($sum)) {?>
                        <table class="tbl_three">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <th>VAT : </th>
                                <td> 0% </td>
                            </tr>
                            <tr>
                                <th style="font-weight: bold; color: red;">Grand Total :</th>
                                
                                 <?php

                                      $value= $sum * 0.00;
                                       $values= $sum +$value;
                                 ?>
                                 
                                <td style="font-weight: bold; color: red;"><?php echo $values; ?></td>
                            </tr>
                       </table>
                    <?php }?>
                     <div class="order"><a href="?orderid=order">ORDER</a></div> 
                </div>

        </div>
        <div class="clear"></div>  
        
        <div class="clear"></div>   
        </div>

    </div>
    </div>
    
 </div>
</div>
 <div class="clear"></div> 
  <?php include ("inc/footer.php");?>