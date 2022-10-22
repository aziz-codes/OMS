<?php
session_start();
include "connection.php";
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>OMS||My Orders</title>
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
  background-color: transparent;
      height: 1000px;
      width: 1000px;
      position: absolute;
      top: 15%;
      left: 5%;
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">
    <img src="images/circle.png" width="30" height="30" class="d-inline-block align-top" alt="" id="home_icon">
    <span style="font-weight: bold; font-family: Poppins,sens-serif;" onclick="home();">OMS</span>
  </a>
</nav>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav nav-pills card-header-pills">
      
      <li class="nav-item">
        <a class="nav-link active" href="#">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="customer_cart.php">My Cart</a>
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
    <a href="customer_setting.php" name="logout">settings</a>
    <a href="logout_customer.php" name="logout">Logout</a>

  </div>
  </form>
</div>
</div>

  </div>
</nav>
<div class="display-panel">
  <h3>Orders.</h3>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact 1</th>
      <th scope="col">Contact 2</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Zip Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Color</th>
      <th scope="col">Condition</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <?php
 
   $customer_email=$_SESSION['customer_id'];
   $query="SELECT * FROM ordertable WHERE email='$customer_email'";
   $data=mysqli_query($con,$query);
if(mysqli_num_rows($data)>0)
   {
     while($row=mysqli_fetch_array($data))
     {
      ?>
       <td><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['contact1']; ?></td>
      <td><?php echo $row['contact2']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['zipcode']; ?></td>
      <td><?php echo $row['productname']; ?></td>
      <td><?php echo $row['color']; ?></td>
      <td><?php echo $row['cond']; ?></td>
      <td><?php echo $row['deliver']; ?></td>
       </tr>
      <?php 
      
     }
   }
else
{
  echo "You hav'nt ordered any thing from OMS yet.";
  ?>
  <a href="OMS_Home.php">checkout now!</a>
  <?php 
} 
?>
</tbody>
</table>

</div>
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