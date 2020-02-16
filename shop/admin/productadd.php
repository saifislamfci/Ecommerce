﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/brand.php"; ?>
<?php include "../classes/addcat.php"; ?>
<?php include "../classes/product.php"; ?>
<div class="grid_10">
    <?php
   $pd = new product;
   if (isset($_POST['submit']) && $_POST['submit'] == 'Save' ) {
    $product=$pd->addproduct($_POST, $_FILES);

    }


     ?>
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block"> 
        <?php 
        if (isset($product)) {
            echo  $product;
        }

        ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="pdname" placeholder="Enter Product Name..." class="medium" />
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
                            <option value="<?php echo $result['id'];?>"><?php echo $result['cat_name'];?></option>
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
                            <option value="<?php echo $result['id'];?>"><?php echo $result['brandname'];?></option>
                        <?php }}?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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
                            <option value="0">Featured</option>
                            <option value="1">Genaral</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


