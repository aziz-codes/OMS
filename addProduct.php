<?php
session_start();
  ?>
<!DOCTYPE html>
<html>
   <head>
      <title>OMS||Add Product</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="addProduct.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
.order-panel
{
  position: relative;
  margin: 30px 50px;
}
</style>
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
        <a class="nav-link" href="Supplier.php">Dashboard</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="supplier_order.php">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="addProduct.php">Product</a>
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
    <a href="#about">Settings</a>
    <a href="logout.php" name="logout">Logout</a>
  </div>
  </form>
</div>
</div>

  </div>
</nav>







     <form method="POST" action="new_add.php" enctype="multipart/form-data">
         <div class="container" style="margin: 0;">
         
         <label for="exampleFormControlInput1">Product ID</label>
         <input type="text" name="id" placeholder="Enter Product ID/Model/Serial Number" style="width: 90%;" required=""><br>


         <label for="exampleFormControlInput1">Product Name</label>
         <input type="text" name="name" placeholder="Please Specfiy Full Name" style="width: 90%;" required="" id="product_name" onkeyup="ok();"><br>

         <label for="exampleFormControlInput1">RAM</label>
         <input type="text" name="ram" placeholder="2GB, 3GB , 4GB" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Internal Storage</label>
         <input type="text" name="internal" placeholder="16GB, 32GB" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Colors Available</label>
         <input type="text" name="color" placeholder="Sepecify Colors" style="width: 90%;"><br>

         <label for="exampleFormControlInput1">Price</label>
         <input type="text" name="price" placeholder="Enter Price" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Quantity</label>
         <input type="text" name="stock" placeholder="Stock Available" style="width: 90%;"><br>

         <label for="exampleFormControlInput1">Description</label>
         <input type="text" name="description" placeholder="Add Description(optional)" style="width: 90%;padding-bottom: 80px; word-wrap: break-word;" id="product_description" onkeyup="ok2();"><br>


         <label for="exampleFormControlInput1">Condition</label><br>
         <select style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="condition">
            <option>New</option>
            <option>Used</option>
         </select>
         <br><br>
         <label for="exampleFormControlInput1">Brand</label><br>
         <select id="make" style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="brand">
            <option value="apple">Apple</option>
            <option value="asus">Asus</option>
            <option value="phones-blackberry">BlackBerry</option>
            <option value="calme">Calme</option>
            <option value="acer">Acer</option>
            <option value="club">Club</option>
            <option value="gfive">G'Five</option>
            <option value="google">Google</option>
            <option value="gright">Gright</option>
            <option value="haier">Haier</option>
            <option value="honor">Honor</option>
            <option value="htc">HTC</option>
            <option value="huawei">Huawei</option>
            <option value="inew">iNew</option>
            <option value="infinix">Infinix</option>
            <option value="lava">Lava</option>
            <option value="lenovo">Lenovo</option>
            <option value="lg">LG</option>
            <option value="meizu">Meizu</option>
            <option value="mobilink-jazzx">Mobilink JazzX</option>
            <option value="motorola">Motorola</option>
            <option value="nokia">Nokia</option>
            <option value="one-plus">One Plus</option>
            <option value="oppo">OPPO</option>
            <option value="panasonic">Panasonic</option>
            <option value="qmobile">QMobile</option>
            <option value="realme">Realme</option>
            <option value="rivo">RIVO</option>
            <option value="samsung">Samsung</option>
            <option value="sony">Sony</option>
            <option value="sony-ericsson">Sony Ericsson</option>
            <option value="tecno">Tecno</option>
            <option value="vivo">Vivo</option>
            <option value="voice">VOICE</option>
            <option value="xiaomi">Xiaomi</option>
            <option value="zte">Zte</option>
            <option value="other-mobiles">Other Mobiles</option>
         </select>
         <br><br>
         <label for="exampleFormControlInput1">choose image file</label><br>
         <input type="file" name="upload" /><br> <br><br>
         <input type="submit" name="submit" value="Submit Data" style="margin-left: 
         130px;">
      </div>
    
     </form>
     <div class="demo" style="margin: -90% 700px; position: sticky; top: 10%;">
         <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/a52.jpg" alt="Card image cap" id="image">
  <div class="card-body">
    <h5 class="card-title" id="nameo">product name goes here.</h5>
    <h4>Price</h4>
    <p class="card-text" id="para">Tell something about the product</p>
    
  </div>
</div>

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
  if (!event.target.matches('.dropbtn')){
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
