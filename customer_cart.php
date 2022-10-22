<?php
session_start();
ob_start();
include "connection.php";
if(!isset($_SESSION['customer_id']))
{
 header('location: login_customer.php');
}


  ?>
<!DOCTYPE html>
<html>
<head>
  <title>OMS||My Cart</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
  ul li a
  {
    margin-left: 50px;
    font-family: "Poppins", sens-serif;
    font-weight: bold;
    color: black;
  }
  .card-groups
  {
    display: flex;
    margin: 40px 100px;
    justify-content: space-around;
  }
  .card-groups img
  {
    height: 100px;
    width: 100px; 
  }

  .dropbtn {
  background-color: transparent;
  color: white;
  height: 40px;
  width: 40px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 130px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown img
{
  height: 40px;
  width: 40px;
  border-radius: 50px;
}
.dropdown-content::before
{
  content: '';
  position: absolute;
  top: -20px;
  right: 100px;
  width: 15px;
  height: 25px;
  background-color: black;
  transform: rotate(45deg);
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.display-panel
{
  height: 1000px;
      width: 1000px;
  background-color: transparent;
  position: relative;
  margin: 50px 20px;
  display: inline-flex;
      flex-wrap: wrap;
}
.card-groups
         {
           margin: 5px 10px;          
           box-sizing: border-box;          

           }
        .card-groups img
           {
          height: 100px;
           width: 100px; 
            }
            .card
            {
              margin-left: 35px;
              margin-top: 10px;
            }
            .price
            {
              display: inline-flex;
            }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">
    <img src="images/circle.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <span style="font-weight: bold; font-family: Poppins,sens-serif;">OMS</span>
  </a>
</nav>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav nav-pills card-header-pills">
      
      <li class="nav-item">
        <a class="nav-link " href="Customer_Order.php">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">My Cart</a>
      </li>
      
    </ul>
    <div class="user-profile-drop-down-panel" style="position: absolute;left: 90%;">
<div class="dropdown">
  <div class="dropbtn">
    <img src="images/myAvatar.png" onclick="myFunction();" class="dropbtn">
    <p style="color: black; margin-left: -1px;" name="username"><?php echo $_SESSION['customer_id']; ?></p>

  </div>
  <form action="logout_customer.php" method="POST">
    <div id="myDropdown" class="dropdown-content">
      <a href="customer_setting.php" name="logout">Settings</a>
    <a href="logout_customer.php" name="logout">Logout</a>

  </div>
  </form>
</div>
</div>

  </div>
</nav>
<div class="display-panel">
  <?php  
  $customer_id=$_SESSION['customer_id'];
  $img="";
  if(isset($_SESSION['product_id']))
  {
    $product_id=$_SESSION['product_id'];
  }
                  $query = "SELECT * FROM customer_cart WHERE customer_id='$customer_id'";  
                $result = mysqli_query($con, $query);  

                while($row = mysqli_fetch_array($result))  
                {  

                  ?>
    <form method="POST" action="customer_cart.php?action=add&id=<?php echo $row['product_id'] ?>">
   <div class="card" style="width: 18rem;height: 25rem;">
   
  <img class="card-img-top" src=<?php echo '"data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="150" class="img-thumnail" /' ;?>>
  <div class="card-body">
    <p style="font-weight: bold;"><?php echo $row['name']; ?></p>
    <div class="price">
      <p style="font-weight: bold;">Price </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <p><?php echo $row['price']; ?></p>
    </div>
    <p class="card-text"><?php  echo "Memory: ".$row['RAM']."   ".$row['internal']; ?></p>
    <input type="submit" name="buy" value="Buy" class="btn btn-success">
    <input type="submit" name="Remove" value="Remove" class="btn btn-success">
  </div>

</div>
</form>

<?php 

                }  
                ?>  
</div>
<?php 

if(isset($_POST['Remove']))
{
  $_SESSION['product_id']=$_GET['id'];
$product_id=$_SESSION['product_id'];
$customer_id=$_SESSION['customer_id'];
  try{
    $query="DELETE FROM customer_cart WHERE customer_id='$customer_id'";

    $data=mysqli_query($con,$query);
    if($data)
    {
      header("refresh: 3"); 
    }
    else
      echo "data cannot be delete.".mysqli_error($con);

  }
  catch(Exception $e)
  {
    throw new Exception("Error Processing Request", 1);
    
  }
}
if(isset($_POST['buy']))
{
  $_SESSION['product_id']=$_GET['id'];
  header('location: buy_product.php');
}

 ?>
 <script type="text/javascript">
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
 </script>
</body>
</html>