<?php
session_start();
$customer_id=$_SESSION['customer_id'];
include "connection.php";
$msg='';
$msg2='';
if(isset($_POST['submit']))
{
	$cp=$_POST['cp'];
	$np=$_POST['np'];
	$cnp=$_POST['cnp'];
	$data=mysqli_query($con,"SELECT * FROM customer WHERE email='$customer_id' AND password='$cp'");
	if(mysqli_num_rows($data))
	{
      if($np!=$cnp)
      {
      	$msg='password not match';
      }
      else
      {
      	$query2="UPDATE customer SET password='$cnp' WHERE email='$customer_id'";
      	$data2=mysqli_query($con,$query2);
      	if($data2)
      	{
      		$msg='password changed';
      	}
      	else
      		$msg='password does nt changed.';
      }
	}
	else
		$msg='current password incorrect.';
}

if(isset($_POST['submit2']))
{
	$id=$_POST['id'];
	$check="SELECT * FROM customer_reset_table WHERE user_id='$customer_id'";
	$mydata=mysqli_query($con,$check);
	if(mysqli_num_rows($mydata)>0)
	{
		$msg2='your id has been already created.';
	}
	else
	{
		$insert=mysqli_query($con,"INSERT INTO customer_reset_table VALUES('$customer_id','$id')");
	if($insert)
	{
		$msg2='id has been created.';
	}
	else
		$msg2='id cant be created.';
	}
}
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Settings</title>
  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
	*
	{
		  font-family: "Poppins", sens-serif;
	}
	.customer_details
	{
		position: absolute;
		top: 4%;
		left: 1%;
	}
	.details
	{
     margin: 20px 50px;
	}
	.change-password input[type="password"]
	{
      margin-bottom: 15px;
	}
</style>
  </head>
  <body>
  <div class="customer_details">
  	<p><?php echo "id: ". $customer_id; ?></p>
  	<?php
 $query="SELECT * FROM customer WHERE email='$customer_id'";
 $data=mysqli_query($con,$query);
 if(mysqli_num_rows($data)>0)
 {
 	while($row=mysqli_fetch_array($data))
 	{
 		?>
<div class="details">
	<label for="name">Name: </label>
	<label><?php echo $row['name']; ?></label>
<br>
	<label for="email">Email: </label>
	<label><?php echo $row['email']; ?></label>
<h5 style="position: absolute; left: 0;">update password</h5>
<form action="#" method="POST">
	<div class="change-password"><br>
		<div class="msg"><p style="color: red;"><?php echo $msg; ?></p></div>
	<input type="password" name="cp" class="Form-Control" placeholder="current password">
	<br>
	<input type="password" name="np" class="Form-Control" placeholder="new password">
	<br>
	<input type="password" name="cnp" class="Form-Control" placeholder="retype new password">
	<br>
	<input type="submit" class="btn btn-success" name="submit" value="Reset" style="margin-left: 40px; ">
</div>
<br><br><br>
<div class="customer-login-id">

	<h5>create a user id.</h5>
	<label>it will help you resetting your password.</label><br>
	<div><p style="color: green;"><?php echo $msg2; ?></p></div>
	<input type="text" name="id" placeholder="reset id" class="Form-Control"><br>
	<input type="submit" class="btn btn-success" name="submit2" value="Create" style="margin:10px 40px; ">
</div>
</form>
</div>


 		<?php 
 	}
 }


  	  ?>
  </div>
  </body>
  </html>