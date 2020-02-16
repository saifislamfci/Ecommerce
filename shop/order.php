
<?php include ("inc/header.php");?>
    <?php 
    $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
    ?>
<style>
.contents
{
	text-align: center;
	line-height: 400px;
	font-size: 100px;
}
.contents h2 {
    font-size: 107px;
    color: #b52828;
    font-family: 'Monda', sans-serif;
}
.contents h2 span
{
	color:#DEE1E6;
}
</style>



 <div class="main">
    <div class="contents">
    	
    	<h2>Order</h2> 
 	  </div>
       <div class="clear"></div>
  
 </div>

  <?php include ("inc/footer.php");?>