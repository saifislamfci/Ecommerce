<?php include ("inc/header.php");?>
<?php 
    $login=Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
 ?>
<style>
    .success{ width: 50%;min-height: 200px;margin: 0px auto;border: 1px solid #ddd; text-align: center; padding: 50px; }
    .success h2 { margin-bottom: 59px; border-bottom: 1px solid #ddd;padding-bottom: 10px}
</style>

 <div class="main">
    <div class="content">
        <?php
        $cusid=Session::get("cusid");
        $ordermony=$cart->ordermony($cusid);
        if ($ordermony) {
            $sum=0;
            while ($result=$ordermony->fetch_assoc()) 
            {
                $price        = $result['price'];
                $quentity     = $result['quentity'];
                $total_price   = $price * $quentity;
                $sum= $sum + $total_price;
                
            }
        }

        ?>
        <div class="success">
            <h2>Order completed</h2>
            <p>Total payable amount:<span style="color: green;font-weight: bold;">$ <?php
             if(isset($sum))
             {
               echo $sum;
            }else
            {
                echo "empty";
            }
            ?></span></p>
            <p>Thanks for percheare.Received your order Successfully.We will contect you Asap with delivery details.Here is order details..</p><a href="orderdetails.php">visit Here..</a>
           
        </div>	
    </div>
 </div>
</div>
  <?php include ("inc/footer.php");?>