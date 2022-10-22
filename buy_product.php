<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Buy Product</title>
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@200&display=swap" rel="stylesheet">
  <style type="text/css">
    body
    {
      font-family: "Poppins", sens-serif;
    }
    .display-product
    {
     background-color: transparent;
     position: absolute;
     top: 20%;
     left: 40%;
     border: 1px solid black;
   }
   .display-product img{
     height: 350px;
     width: 300px;
   }
   .product-details
   {
   	background-color: transparent;
   	height: auto;
   	display: inline-block;
   	position: absolute;
   	top: 100%;
   	left: 20%;

   }
   .supplier-details
   {
   	height: 500px;
   	width: 400px;
   	background-color: transparent;
   	position: absolute;
   	top: 1%;
   	left: 120%;
    display: inline-grid;
  }

</style>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="OMS_Home_Page.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="user-details">

   <form action="order_details.php" method="POST" >
    <div>
      <div class="form-group col-md-6">

        <label for="inputEmail4">Name</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Name" style="width: 50%;"required="" name="name"><br>
        <label for="inputPassword4">Email</label>
        <input type="email" class="form-control" id="inputPassword4" placeholder="Email" style="width: 50%;"required="" name="email">
        <br>
        <label for="inputEmail4">Contact 1</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Contact" style="width: 50%;required=""" name="contact1"><br>
        <label for="inputEmail4">Contact 2</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Contact" style="width: 50%;" required="" name="contact2"><br>
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"  style="width: 50%;" required="" name="address">
        <br>
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" style="width: 50%;" placeholder="City" required="" name="city">
        <br>
        <label for="inputZip">Zip Code</label>
        <input type="text" class="form-control" id="inputZip" style="width: 50%;" placeholder="Zip Code" required="" name="zipcode">
        <br>

        <input type="checkbox" class="" id="check"  placeholder="Zip Code" required="">
        <label for="check">I acknowledge that the above information is correct.</label>
      </div>    
    </div>
    <button type="submit" name="buybtn" class="btn btn-primary" style="margin-left: 100px;">Confirm Order</button>
  </form>
</div>
<div class="display-product">
	<?php  include "connection.php";
	$productID=$_SESSION['product_id'];
  $query="SELECT * FROM products WHERE product_id='$productID'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0)
  {
   while($row=mysqli_fetch_array($result))
   {
    $user_id=$row['supplier_id'];
    $_SESSION['supplier']=$row['supplier_id'];
    ?>
    <img class="card-img-top" src=<?php echo '"data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="400" width="100" class="img-thumnail" /' ; ?>>
    <div class="product-details">
      <h5>Name</h5><p><?php echo $row['product_name']; $_SESSION['pname']=$row['product_name']; ?></p>
      <h5>RAM</h5><p><?php echo $row['RAM']; ?></p>
      <h5>Internal</h5><p><?php echo $row['internal']; ?></p>
      <h5>Color</h5><p><?php echo  $row['color'];$_SESSION['color']=$row['color']?></p>
      <h5>Condition</h5><p><?php echo $row['product_condition']; $_SESSION['con']=$row['product_condition']; ?></p>
      <h5>Brand</h5><p><?php echo $row['brand']; ?></p>   
      <h5>Price</h5><p><?php echo $row['price']; ?></p> 

    </div>
    <div class="supplier-details" style="">
      <?php
      include "connection.php";
      $productID=$_SESSION['product_id'];
      $query2="SELECT * FROM users WHERE username='$user_id'";
      $result2=mysqli_query($con,$query2);  
      if(mysqli_num_rows($result2)>0)
      {
       while($row2=mysqli_fetch_array($result2))
       {
        ?>
        <div class="details" style="position: absolute; margin: 5px 5px;height: 200px;width: 200px; display: inline-block; margin-bottom: 5px;"><br><br>
         <div class="card" style="width: 18rem;">
          <div class="card-header">
            Supplier Information
          </div>
          <ul class="list-group list-group-flush">

            <li class="list-group-item">
                 <i class="fas fa-user" style="color: blue;"></i>
              <?php echo $row2['first_name']." ".$row2['last_name']; ?></li>


            <li class="list-group-item">
               <i class="fas fa-star" style="color: blue;"></i>
               <?php echo $row2['shop_name']; ?>
            </li>

            <li class="list-group-item">
              <i class="fas fa-map-marker-alt" style="color: blue;"></i>
              <?php echo $row2['shop_address']; ?>
            </li>

             <li class="list-group-item">
              <i class="fas fa-mobile-alt" style="color: blue;"></i>
            <?php echo $row2['phone_number']; ?>
            </li>

          </ul>
        </div>

      </div>
      <?php 

    }
  }

  ?>
</div>

<?php 
}
}

?>
</div>

</body>
</html>