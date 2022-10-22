<?php 
session_start();
$msg="";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OMS||Customer Registration</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
	.form{
		height: 430px;
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
	.msg-panel
	{
		height: 30px;
		width: 270px;
		background-color: transparent;
		position: absolute;
		top: 5%;
		left: 5%;
	}
</style>
</head>
<body>
	<form method="POST" action="#">
<div class="form">
	<div class="msg-panel">
		<?php 
		echo $msg; ?></div>
	<br><br><br>
	 <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Name" style="width: 90%;margin-left: 15px;"required=""><br>
	 <input type="email" class="form-control" id="inputPassword4" name="email" placeholder="Email" style="width: 90%; margin-left: 15px;">
	 <br>
	 <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="create password" style="width: 90%;margin-left: 15px;">
	 <br>
	 <input type="password" class="form-control" id="inputPassword4" name="cpassword" placeholder="confirm password" style="width: 90%;margin-left: 15px;">
	 <br>
	 <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 100px;">Sign up</button><br><br>
	 <a href="login_customer.php" style="margin: 40px 50px;">already have an account?</a>
 </div>
 </form>
 <?php
//inclue the connection file to check the database connection.
 include "connection.php";

if(isset($_POST['submit']))
{
	try
	{
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $c_password=$_POST['cpassword'];

        //check existing email in the table.
        $query="SELECT * FROM customer WHERE email='$email'";
        $check_data=mysqli_query($con,$query);
        if(mysqli_num_rows($check_data)>0)
        {
           $msg="email already exists.";
        }//if email does not exist in the database.
        else
        {
        	if($password!=$c_password)
        	{
        		$msg="password doesnt match";
        	}
        	else
        	{
        		$insert_query="INSERT INTO customer VALUES('$name','$email','$password')";
        		$data=mysqli_query($con,$insert_query);
        		if($data)
        		{
        			$msg="registered successfully..";
        			$_SESSION['customer_id']=$email;
        			header('location: OMS_Home.php');
        			
        		}
        		else
        			$msg="data not inserted...";
        	}
        }
	}
	catch(Exception $e)
	{
		throw new Exception("Error Processing Request", 1);		
	}
}

   ?>
</body>
</html>