<?php session_start(); ?>
<?php 
require_once('header.php');
require_once('process.php');
?>
<!-- Message -->
<?php 
if (isset($_SESSION['message'])): 
?>

<div class="alert alert-success alert-<?=$_SESSION['msg_type']?>">
<?php
   echo $_SESSION['message'];
   unset($_SESSION['message'])
?>
</div>
<?php endif ?><!-- End Message -->


<!-- Connection -->
<?php
   $conn= new mysqli('localhost','root','','storage management') or die(mysqli_error($conn));
   $result =$conn->query("SELECT * FROM products") or die($conn->error);
   //pre_r($result);
   //pre_r($result->fetch_assoc());  //fetch data
?>
<?php
   function pre_r($array){
   echo '<pre>';
   print_r($array);
   echo'</pre>';
}
?><!-- End Connection -->

<style>
    body{
        background-image: url(assets/img/slide/slide-1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        position: center;
        background-attachment: fixed;
        color: white;
    }
</style>

<!--Card -->
<div class="row">
<form action="process.php" method="POST">
<div class="card1">
  <div class="card-body">
    <h4 style="margin-bottom: 20px;  text-align: center;" class="card-title">Storage Management</h4>
    <input type="hidden" name="id" value="<?php echo $id; ?>"><!--ERROR / to update in form-->
    <p style=" margin-bottom: 3px;margin-top: 10px;" class="card-text">ID</p>
    <input value="<?php echo $id;?>" type="number" style="width: 100%;" name="item" class="form-control"  aria-describedby="basic-addon1" disabled>
    <p style=" margin-bottom: 3px;margin-top: 10px;" class="card-text">Item</p>
    <input value="<?php echo $item;?>" type="text" style="width: 100%;" name="item" class="form-control"  aria-describedby="basic-addon1" required>
    <p style=" margin-bottom: 3px;margin-top: 10px;" class="card-text">Price</p>
    <input value="<?php echo $price;?>" type="number" style="width: 100%;" name="price" class="form-control"  aria-describedby="basic-addon1" required>
    <p style=" margin-bottom: 3px;margin-top: 10px;" class="card-text">Storage</p>
    <input value="<?php echo $storage;?>" type="number" style="width: 100%;" name="storage" class="form-control"  aria-describedby="basic-addon1" required>
    <p style=" margin-bottom: 3px;margin-top: 10px;" class="card-text">Description</p>
    <input value="<?php echo $description;?>" type="text" style="width: 100%;" name="description" class="form-control"  aria-describedby="basic-addon1" required>

<div class="text-center">
  <?php if ($update == true):
  ?><!--change save to update-->
    <button name="update" style="width:30%;font-weight: bolder; width:100px; margin-top:20px;" type="submit" class="btn btn-primary btn-lg">Update</button>
<?php else:?><!--change it back-->
  <button name="save" style="width:30%;font-weight: bolder; width:100px; margin-top:20px;" type="submit" class="btn btn-primary btn-lg">Save</button>
<?php endif; ?>
</div><!-- Button -->
  </div>
</div>
</form>
</div><!-- End Card -->

<!-- Table -->
<div class="card2">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Item</th>
      <th scope="col">Price</th>
      <th scope="col">Strorage</th>
      <th scope="col">Description</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
   <tbody>
     <?php while ($row = $result->fetch_assoc())://fetching data from results to row?> 
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['item']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['storage']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td>
        <a style="width: 75px;" href="form.php?edit=<?php echo $row['id'];?>"
        class="btn btn-success">Edit</a>
        <a style="width: 75px;" href="process.php?delete=<?php echo $row['id'];?>"
        class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php endwhile;?>
  </tbody>
</table>
</div><!-- End Table -->

<?php
require_once('footer.php');
?>