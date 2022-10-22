<?php 
session_start();
include "connection.php";
if(isset($_POST['submit']))
{
	try
	{
      $email=$_POST['email'];
	$password=$_POST['password'];

	$query="SELECT * FROM customer WHERE email='$email' AND password='$password'";
	$data=mysqli_query($con,$query);
     if(mysqli_num_rows($data)>0)
     {
     	while($row=mysqli_fetch_array($data))
     	{
     		$_SESSION['customer_id']=$row['email'];
     		header('location: OMS_Home.php');
     	}
     	
     }
     else
     	echo "invallid username or password..";

	}
	catch(Exception $e){
		throw new Exception("Error Processing Request", 1);
	}
	
	

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OMS||Customer Login</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
	.form{
		height: 300px;
		width: 300px;
		background-color: #b3e6cc;
		position: absolute;
		top: 10%;
		left: 35%;
	}
	.form a:hover
	{
		color: #fff;
	}
</style>
</head>
<body>
	<form action="#" method="POST">
<div class="form">
	<br><br>
	 
	 <input type="email" class="form-control" id="inputPassword4" placeholder="Email" style="width: 90%; margin-left: 15px; " required="" name="email">
	 <br>
	 <input type="password" class="form-control" id="inputPassword4" placeholder="password" style="width: 90%;margin-left: 15px;" required="" name="password">
	 <br>
	 <button type="submit" class="btn btn-primary" style="margin-left: 100px;" name="submit">Sign in</button><br><br>
	 <a href="reset_customerid.php" style="margin: 30px 80px;">forget password?</a>
	 <br>
	 <a href="register_customer.php" style="margin: 20px 70px;">create new account?</a>
 </div>
 </form>
</body>
</html>
