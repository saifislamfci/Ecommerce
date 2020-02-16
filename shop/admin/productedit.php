<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/brand.php"; ?>
<?php include "../classes/addcat.php"; ?>
<?php include "../classes/product.php"; ?>
<?php include_once '../lib/database.php';?>
<div class="grid_10">
<?php
$db= new Database;
$getid=mysqli_real_escape_string($db->link,$_GET['proid']);
  if (!isset($getid) || $getid == NULL) {
    echo "<script>window.location='productlist.php';</script>";
    }
    else
    {
        $id=$getid;
    }
 ?>

<?php
$pd = new product();
$fm =new Format();
$pro=$pd->geteditproduct($id);
?>
<?php
 if(isset($_POST['submit']) && $_POST['submit'] == "Save")
 {
    $proup=$pd->proupdate($_POST,$_FILES,$id);
 }
?>

  <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
    <?php 
        if (isset($proup)) {
            echo $proup;
        }
    ?>
    
     <?php 
     if ($pro)
        {
        while ($value=$pro->fetch_assoc()) 
        {
     ?>
        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="pdname" value="<?php echo $value['pdname']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
                            <option>Select Category</option>
                            <?php 
                            $cat= new addcat;
                            $allcat=$cat->allcatlist();
                            if ($allcat) {
                                while ($result=$allcat->fetch_assoc()) {
                                    ?>
                            <option
                            <?php
                            if ( $value['catid']== $result['id']) {?>
                               selected="selected"
                           <?php }?>
                             value="<?php echo $result['id'];?>"><?php echo $result['cat_name'];?></option>
                        <?php }}?>

                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                            <option>Select Brand</option>
                            <?php 
                            $brand= new brand;
                            $allbrand=$brand->allbrand();
                            if ($allbrand) {
                                while ($result=$allbrand->fetch_assoc()) {
                                    ?>
                            <option
                            <?php
                            if ( $value['brandid'] == $result['id']) {?>
                               selected="selected"
                           <?php } ?>
                            value="<?php echo $result['id'];?> " > <?php echo $result['brandname'];?> </option>
                        <?php }}?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            
                            <?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>

                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>

                    <td>
                        <?php
                         $imageid= $value['image'];
                         ?>
                         <img src="upload/<?php echo $value['image']; ?>" height="60px" weidth="200px">
                         <br/>
                        <input type="file" name="image" />
                      
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if ( $value['type'] == 0 ) {?>
                            <option selected="selected" value="0">Featured</option>
                            <option  value="1">Genaral</option>
                            <?php } ?>
                            <?php if ( $value['type'] == 1 ) {?>
                            <option  value="0">Featured</option>
                            <option selected="selected" value="1">Genaral</option>
                            <?php } ?>

                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="imageid" Value="<?php echo $imageid; ?>" />
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        <?php  }} ?>
        </div>

     
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


