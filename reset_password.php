<?php
session_start();
include "connection.php";
$username=$_SESSION['userid'];
$msg='';

if(isset($_POST['submit']))
{
	$np=$_POST['np'];
	$cp=$_POST['cp'];

	if($np!=$cp)
	{
		$msg='password does not match.';
	}
	else
	{
		$query="UPDATE users SET password='$cp' WHERE username='$username'";
		$data=mysqli_query($con,$query);
		if($data)
		{
			
		$msg='<a href="OMS_Login.php">password reset. return to logi page</a>';
		}
		else
			$msg='cant reset password.';
	}
}




  ?>



  <!DOCTYPE html>
  <html>
  <head>
  	<title>OMS||Reset Password</title>

  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
*{
		  font-family: 'Poppins', sans-serif;
		}
	.form
	{
		position: absolute;
		top: 10%;
		left: 40%;
		border: 1px solid black;
		height: 250px;
		width: 400px;
		background-color: #00cc88;
		text-align: center;
	}
	.form input[type="submit"]
	{
		margin-bottom: 20px;
	}
.form input[type="password"]{
   
       width: 300px;
}
</style>
  </head>
  <body>
  	<form method="POST" action="#">
  <div class="form"><br><br><br>
  	<div class="msg" style="margin: -15px 10px;"><p><?php echo $msg; ?></p></div>
  	<input type="password" class="Form-Control" name="np" placeholder="create new Password"><br><br>
  	<input type="password" class="Form-Control" name="cp" placeholder="create new Password"><br><br>
  	<input type="submit" class="btn btn-primary" name="submit" value="Reset">
  </div>
  </form>
  </body>
  </html>