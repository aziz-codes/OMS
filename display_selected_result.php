<?php
session_start();
if(isset($_SESSION['customer_id']))
{
   $_SESSION['customer_id']=$_SESSION['customer_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OMS|| Home</title>
	<script src="jquery-3.5.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		.side-nav
		{
			position: relative;
			margin: 0% 0%;
			background-color: black;
			height: 600px;
			width: 300px;
			border: 0px solid grey;
		}
		 a
		{
			text-decoration: none;			
		}
		
		.display-panel{
			background-color: #e6e6e6;
			height: 1000px;
			width: 1000px;
			position: absolute;
			top: 14%;
			left: 25%;
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
	<link rel="stylesheet" type="text/css" href="OMS_Home_Page.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
   <a href="login_customer.php" style="color: #fff;margin: 5px 10px;"><?php
    if(isset($_SESSION['customer_id']))
    {
    	echo $_SESSION['customer_id'];
    }
    else
    	echo "Logged in as Guest";
    ?></a>
  <div class="list">
  	<a class="nav-item nav-link" href="OMS_Login.php">Switch to Selling</a>
  </div>

</nav>
<div class="side-nav" style="background-color:  #e6e6e6;">
	<h5 style="padding: 5px 0; background-color: #fff;">Filter by price:</h5>
	<p>set your price range upto:</p>
	<p id="f">OK</p>
	<input type="range" name="" id="id3" max="200000" min="5000" ondrag="print(this.value);">
	<button>Filter</button>
<br><br>

	<form method="POST" action="OMS_Home.php">
		<div class="search-by-brand" style="margin: 0 10px;">
		<h5>Filter by Brand(popular)</h5>
		<a href="" style="text-decoration: none;" name="sam">Samsung</a>
<br>
		<a href=""style="text-decoration: none;">Apple</a>
<br>
		<a href=""style="text-decoration: none;">Huawei</a>
<br>
		<a href=""style="text-decoration: none;">Nokia</a>
<br>
		<a href=""style="text-decoration: none;">Oppo</a>
<br>
		<a href=""style="text-decoration: none;">Xiomi</a>
<br>
		<input type="text" name="" placeholder="Other"><button>search</button>
	</div>
	</form>
	
		<h4>Edit Form</h4>
	</div>
</div>
	<div class="display-panel">

<?php 
include "connection.php";
if(isset($_POST['buy']))
{
	$_SESSION['product_id']=$_GET['id'];
	header('location: buy_product.php');

}
if(isset($_POST['add_to_cart']))
 {
 	if(isset($_SESSION['customer_id']))
 	{
    header('location: customer_card.php');
 	}
 	else
 	{
 		header('location: register_customer.php');
 	}
 }
 ?>
 <?php  
                $query = "SELECT * FROM products ";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  

                	?>
    <form method="POST" action="OMS_Home.php?action=add&id=<?php echo $row['product_id'] ?>">
   <div class="card" style="width: 18rem;height: 25rem;">
  <img class="card-img-top" src=<?php echo '"data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="150" class="img-thumnail" /' ; ?>>
  <div class="card-body">
    <p style="font-weight: bold;"><?php echo $row['product_name']; ?></p>
    <div class="price">
    	<p style="font-weight: bold;">Price </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<p><?php echo $row['price']; ?></p>
    </div>
    <p class="card-text"><?php  echo "Specs: ".$row['RAM']."   ".$row['internal']; ?></p>
    <input type="submit" name="buy" value="Buy" class="btn btn-success">
    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success">
  </div>
</div>
</form>

<?php 

                }  
                ?>  
</div>
<div id="modal" style="height: 200px;width: 300px;background:rgba(0,0,0,0.7); grey;position: absolute;top: 30%;left: 50%;text-align: center;display: none;z-index: 100;">
	<h4>Edit Form</h4>
</div>
</form>

</div>



<script type="text/javascript" src="Jquery/jquery.js">
	if(window.history.replaceState)
	{
		window.history.replaceState(null,null,window.location.href);
	}
</script>
</body>
</html>


