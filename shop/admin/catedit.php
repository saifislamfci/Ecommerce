
<?php include "../classes/addcat.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../lib/database.php';?>


<?php
$db= new Database;
$getid=mysqli_real_escape_string($db->link,$_GET['catid']);

if (!isset($getid) || $getid == NULL) {
    echo "<script>window.location='catlist.php';</script>";
}
else
{
    $id=$getid;
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <?php
                $addcatatory= new addcat;
                if ($_SERVER['REQUEST_METHOD']== "POST") {
                $upcat=$_POST['addcat'];
                $updatecat=$addcatatory->catupdate($upcat,$id);
                if ($updatecat) {
                echo $updatecat;
                     }
                        }
                        ?>
                <?php
                $getcat=$addcatatory->catshow($id);
                if ($getcat) {
                    while ($result=$getcat->fetch_assoc())
                     {
                 ?> 
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">				
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['cat_name']; ?>" name="addcat" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>