
<?php include "../classes/addcat.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$addcatatory= new addcat;
if ($_SERVER['REQUEST_METHOD']== "POST") {
    $addcat=$_POST['addcat'];
    $checkaddcat=$addcatatory->addcatagory($addcat);

}

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                if (isset($checkaddcat)) {
                    echo  $checkaddcat;
                    } 
                 ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="addcat" class="medium" />
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