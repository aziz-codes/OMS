<?php
session_start();
ob_start();

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
			position: sticky;
      top: 0;
			background-color: black;
			height: 700px;
			width: 300px;
			border: 0px solid grey;
		}
		 a
		{
			text-decoration: none;			
		}
		
		.display-panel{
			background-color: #e6e6e6;
			 height: auto;
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
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="display: none;">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="display: none;">Search</button>
  </form>
  <a href="customer_cart.php"><?php
   if(isset($_SESSION['customer_id'])){
echo $_SESSION['customer_id'];
   }
   else
   	echo "Login/Signup";

    ?></a>
  <div class="list">
  	<a class="nav-item nav-link" href="OMS_Login.php">Switch to Selling</a>
  </div>

</nav>
<div class="side-nav" style="background-color:  #e6e6e6;">
	<form method="POST" action="other_result.php">
		<div class="search-by-brand" style="margin: 0 10px;">
		<h5>Filter by Brand(popular)</h5>
		<a href="samsung_result.php" style="text-decoration: none;" name="sam">Samsung</a>
<br>
		<a href="apple_result.php"style="text-decoration: none;">Apple</a>
<br>
		<a href="huawei_result.php"style="text-decoration: none;">Huawei</a>
<br>
		<a href="nokia_result.php"style="text-decoration: none;">Nokia</a>
<br>
		<a href="oppo_result.php"style="text-decoration: none;">Oppo</a>
<br>
		<a href="#"style="text-decoration: none;">Xiaomi</a>
<br>
		<div class="search-nav" style="display: inline-flex;">
    <input type="text" class="form-control"  name="other" placeholder="Other" required="" style="width: 210px;">
    <input type="submit" name="submit" value="Search" class="btn btn-success" >  
    </div>
	</div>
	</form>
	<br><br>
  <div class="search-method">
    <form method="POST" action="specific_result.php">
      <div>
        <h4>Search By</h4>
    <input type="number" class="form-control" name="RAM" placeholder="RAM" style=""> &nbsp;&nbsp;&nbsp;
    <input type="number" name="Internal" class="form-control" placeholder="Internal" style=""><br>
    <input type="text" class="form-control" name="brand" placeholder="Brand" style=""><br>
    <input type="number" class="form-control" name="price_from" placeholder="Price from" style="">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="number" class="form-control" name="price_to" placeholder="Price to" style="">
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="" value="Search" class="btn btn-success">
      </div>
   </form>
   </div>

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
 	$_SESSION['product_id']=$_GET['id'];
 	if(isset($_SESSION['customer_id']))
 	{
    try
    {
       $product_id=$_SESSION['product_id'];
       $customer_id=$_SESSION['customer_id'];
       $query="SELECT * FROM products WHERE product_id='$product_id'";
       $data=mysqli_query($con,$query);
       while($row=mysqli_fetch_array($data)){
        $id=$row['product_id'];
        $name=$row['product_name'];
        $ram=$row['RAM'];
        $internal=$row['internal'];
        $color=$row['color'];
        $cond=$row['product_condition'];
        $price=$row['price'];
     $image='data:images/jpeg;base64,'.base64_encode($row['image']);
        
       }
       $insert_query="INSERT INTO customer_cart VALUES('$customer_id','$id','$name','$price','$ram','$internal','$color','$cond','$image')";
       $data=mysqli_query($con,$insert_query);
       if($data)
       {
         header('location: customer_cart.php');
       }
       else
       	echo "data not inserted.".mysqli_error($con);
       	
         	
    }//end of try block
    catch(Exception $e)
    {
        throw new Exception("Error Processing Request".$e);
        
    }//end of catch block
 	}
 	else
 	{
 		header('location: login_customer.php');
 	}
 }
 ?>
 <?php  
                
               $query = "SELECT * FROM products WHERE brand='huawei' OR 'Huawei'"; 
                $result = mysqli_query($con, $query);  
               if(mysqli_num_rows($result)>0)
               {
                         while($row = mysqli_fetch_array($result))  
                {  

                  ?>
    <form method="POST" action="OMS_Home.php?action=add&id=<?php echo $row['product_id'] ?>">
   <div class="card" style="width: 18rem;height: 27rem;">
  <img class="card-img-top" src=<?php echo '"data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="150" class="img-thumnail" /' ;?>>
  <div class="card-body">
     
    </a>
    <p style="font-weight: bold;"><?php echo $row['product_name']; ?></p>

    <div class="price">
      <p style="font-weight: bold;">Price </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <p><?php echo $row['price']; ?></p>
    </div>
    <p class="card-text"><?php  echo "Memory: ".$row['RAM']."   ".$row['internal']; ?></p>
    <input type="submit" name="buy" value="Buy" class="btn btn-success">
    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success">
  </div>

</div>
</form>
              

       <?php 
 }
                }  
                else
                {
                  echo "no result found for Huawei";
                }
                ?>  
</div>
</form>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script type="text/javascript">
	var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
</body>
</html>


