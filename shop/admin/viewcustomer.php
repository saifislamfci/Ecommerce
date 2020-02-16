
<?php include "../classes/customer.php" ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../lib/database.php';?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  
}
</style>

<?php
$db= new Database;
$ct= new customer;
$getid=mysqli_real_escape_string($db->link,$_GET['csid']);

if (!isset($getid) || $getid == NULL) {
    echo "<script>window.location='inbox.php';</script>";
}
else
{
    $id=$getid;
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer details</h2>
                <?php
                    if (isset($_POST['submit']) && $_POST['submit'] == "OK")
                    {
                         echo "<script> window.location='inbox.php';</script>";

                    }
                ?>
                
<!--             <?php
                $viewcustromer=$ct->viewshow($id);
                if ($viewcustromer) {
                    while ($result=$viewcustromer->fetch_assoc())
                     {
                 ?>  -->
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="tblone">
                      <tr>
                          <td colspan="2" style="text-align: center;color:white;font-weight: bold; background-color: black;"> User Details</td>
                          
                      </tr>
                        <tr> 
                            <td width="30%">Customer Id</td>
                            <td width="70%"><?php echo $result['id']; ?></td>
                        </tr>			
                        <tr>
                            <td>Name</td>
                            <td><?php echo $result['name']; ?></td>
                        </tr>
						<tr> 
                             <td>Mobile</td>
                            <td><?php echo $result['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                        <tr> 
                             <td>zip code</td>
                            <td><?php echo $result['zip']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $result['address']; ?></td>
                        </tr>
                         <tr>
                            <td>City</td>
                            <td><?php echo $result['city']; ?></td>
                        </tr>
                        <tr> 
                             <td>country</td>
                            <td><?php echo $result['country']; ?></td>
                        </tr>
                         <tr >

                            <td colspan ="2" style="text-align: center;"><input type="submit" name="submit" value="OK"></td>
                            
                        </tr>
                    
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>