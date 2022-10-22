<?php
session_start();
include "connection.php";
$customer=$_SESSION['id'];
echo $customer;
$msg='';
if(isset($_POST['submit']))
{
    $np=$_POST['np'];
    $cnp=$_POST['cnp'];

    if($np!=$cnp)
    {
    	$msg='password doe not match';
    }
    else
    {
    	$query="UPDATE customer SET password='$np' WHERE email='$customer'";
    	$data=mysqli_query($con,$query);
    	if($data)
    	{
    		$msg='password changed.';
    		echo '<a href="Login_Customer.php">return to login page</a>';
    	}
    	else
    		{
    			$msg='error resetting password.';
    			
    			unset($_SESSION['id']);
    		}

}
    }

  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
	.details input[type="password"]
	{
      margin-bottom: 10px;
      width: 25%;
	}
</style>
</head>
<body>
<form action="#" method="POST">
	<div class="details"><br>
		<div class="msg"><p style="color: red;"><?php echo $msg; ?></p></div>

	<input type="password" name="np" class="Form-Control" placeholder="new password">
	<br>
	<input type="password" name="cnp" class="Form-Control" placeholder="retype new password">
	<br>
	<input type="submit" class="btn btn-success" name="submit" value="Reset" style="margin-left: 100px; ">
</div>
</form>
</body>
</html>
