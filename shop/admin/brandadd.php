
<?php include "../classes/brand.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

    $addbrands= new brand;
if ($_SERVER['REQUEST_METHOD']== "POST") {
    $addbrand=$_POST['addbrand'];
    $brand=$addbrands->addbrand($addbrand);
}

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <?php
                if (isset($brand)) {
                    echo  $brand;
                    } 
                 ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." name="addbrand" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>