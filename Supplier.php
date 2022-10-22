 <?php
session_start();
ob_start();

?>

 <!DOCTYPE html>
<html>
<head>
  <title>Supplier|Dashboard</title>
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
.tab-data input[type="submit"]:hover
{
  background-color: #007bff;
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
        <a class="nav-link active" href="#">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="supplier_order.php">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addProduct.php">Product</a>
      </li>
      
    </ul>
    <div class="user-profile-drop-down-panel" style="position: absolute;left: 90%;">
<div class="dropdown">
  <div class="dropbtn">
    <img src="images/myAvatar.png" onclick="myFunction();" class="dropbtn">
    <p style="color: black; margin-left: -15px;" name="username"><?php echo $_SESSION['username']; ?></p>
  </div>
  <form action="Supplier.php" method="POST">
    <div id="myDropdown" class="dropdown-content">
    <a href="user_profile_settings.php">Profile</a>
    <a href="security_questions.php">Security</a>
    <a href="logout.php" name="logout">Logout</a>
  </div>
  </form>
</div>
</div>

  </div>
</nav>


 <div class="tab-data">
<h4>My Products</h4>
  <table id="tble" style="width: 100%; margin-top: 40px;" class="table table-hover">
      <thead>
     <tr>
      <th scope="col">#</th>
<th>Product ID</th>
<th>Product Name</th>
<th>RAM</th>
<th>Internal</th>
<th>Color</th>
<th>Price</th>
<th>Quantity</th>
<th>Condition</th>
<th>Brand</th>
<th>Edit</th>
<th>Delete</th>
</tr> 
</thead>
<tbody>
<?php 
   $user_id = $_SESSION['username'];
   $order_id=0;
 include "connection.php";
 $query="SELECT * FROM products where supplier_id='$user_id'";
 $data=mysqli_query($con,$query);
 if(mysqli_num_rows($data)>0)
 {
  while($row=mysqli_fetch_array($data))
  {
    $order_id++;
    ?>
       <form  method="POST" action="Supplier.php">
<tr>
  <th scope="row"><?php echo $order_id; ?></th>
  <td><?php echo $row['product_id']; ?></td>
   <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['RAM']; ?></td>
     <td><?php echo $row['internal']; ?></td>
      <td><?php echo $row['color']; ?></td>
       <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
         <td><?php echo $row['product_condition']; ?></td>
          <td><?php echo $row['brand']; ?></td>
          <th>
            <a class="nav-link" href="edit_product.php?action=add&id=<?php echo $row['product_id'] ?>">Edit</a>
          </th>
            <th> 
              <a class="nav-link" href="delete_product.php?action=add&id=<?php echo $row['product_id'] ?>">Delete</a>
              </th>
</tr>
<?php
  }
 }
 ?>  
  </tbody>
</table>
</form>
</div>
<script type="text/javascript">
  var panel = document.getElementById("panel");
   var ok = document.getElementById("message");
  

   //user profile script has been pasted....
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
</body>
</html>