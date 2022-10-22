<?php
include "connection.php";
session_start();
	$msg='';
if(isset($_POST['submit']))
{
	$email=$_POST['email'];

	$data=mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
	if(mysqli_num_rows($data)>0)
	{
		while($row=mysqli_fetch_array($data)){
			 $_SESSION['id']=$row['email'];
			}	
       header('location: check_resetid.php');
	}
	else
		$msg='no such email found.please try again.';
}
?>

  <!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<script src="jquery-3.5.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
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
		height: 200px;
		width: 400px;
		background-color: #00cc88;
	     text-align: center;
	}
	.form input[type="submit"]
	{
		margin-bottom: 10px;
	}

</style>
</head>
<body>
	<form method="POST" action="">
<div class="form">
	<div class="messsage-panel">
		<p><?php echo $msg; ?></p>
	</div>
	<br>
	<input type="email" class="form-control"  name="email" placeholder="Enter Your Email" required="" style="" style="margin-left: 30px;"><br><br>
    <input type="submit" name="submit" value="Search" class="btn btn-success" style="margin-bottom: 10px;" > 
</div>
</form>
</body>
</html>