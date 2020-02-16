<?php include ("inc/header.php");?>
<?php 
    $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
 ?>
<style>
    .payment{ width: 50%;min-height: 200px;margin: 0px auto;border: 1px solid #ddd; text-align: center; padding: 50px; }
    .payment h2 { margin-bottom: 59px; border-bottom: 1px solid #ddd;padding-bottom: 10px}
    .payment a {background: red;font-size: 22px;padding: 6px;padding-left: 19px;padding-right: 22px;border: 1px solid #cc5454;color: white;font-weight:bold; border-radius: 9px;}
    .Previous {margin: 0px auto;display: block;text-align: center;margin-top: 15px;}
    .Previous a{ text-decoration: none;background: #9a9494;color: white;padding: 5px; border: 1px solid #6b6565;}
</style>

 <div class="main">
    <div class="content">
        <div class="payment">
            <h2>Choose Payment Option</h2>
            <a href="oflinepayment.php">Ofline Payment</a>
            <a href="onlinepayment.php">Online Payment</a>
        </div>
        <div class="Previous" ><a href="cart.php">Previous</a></div>	
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>