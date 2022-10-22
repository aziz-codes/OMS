<?php 
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>||Settings</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
		  font-family: 'Poppins', sans-serif;
		}
	.container
	{
		height: 200%;
		width: 100%;
		background-color: #f7f7f7;
		position: absolute;
		top: 0;
		left: 0%;
		
	}
	.general-inforamtion-panel
	{
		padding-top: 10px;
		position: relative;
		margin: 2% 10%;
		height: auto;
		width: 50%;		
		padding-left: 20px;
		background-color: #fff;
		align-items: center;
		justify-content: center;


	}
	.general-inforamtion-panel input[type="text"],input[type="password"]
	{
	display: inline;
    width: 50%;
    height: 20px;
    padding: .200rem .10rem;
    font-size: 1rem;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: .1rem;
    border: 0.5px solid black;
    margin-bottom: 20px;
    margin-left: 30px;

	}
	.general-inforamtion-panel input[type="submit"]
	{
		background: linear-gradient(rgba(0, 0, 0, 0.5), #009688);
		color: #fff;
		border: none;
		outline: none;
		position: relative;
		margin: 0 70%;
		cursor: pointer;
		transition:  border 2s;
	}
	.general-inforamtion-panel input[type="submit"]:hover
	{
	   border: 1px solid black;	
   	}
   	.pic
   	{
   		height: 50px;
   		width: 50px;
   		background-color: orange;
   		border-radius: 50%;
   		position: absolute;
   		top: 2%;
   		left: 80%;
   		cursor: pointer;
   	}
   	.pic img
   	{
   		height: 50px;
   		width: 50px;
   		border-radius: 50%;
   	}
	</style>
</head>
<body>
<div class="container">
	<form action="updateUser.php" method="POST">
	<div class="general-inforamtion-panel">
		<div class="pic" title="change profile picture">
			<img src="images/myAvatar.png">
		</div>
		<h3>General</h3>
		<p  style="position: absolute;top: 2%;left: 60%;">:</p>
		<p>username</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p style="position: absolute;top: 5.5%; color: #3333ff; left: 20%;"><?php echo $_SESSION['username']; ?></p>
		<br>
		<label for="fname">First Name</label>&nbsp;&nbsp;
		<input type="text" name="fname" placeholder="first name" value= <?php echo $_SESSION['first_name']; ?>>
<br>
		<label for="fname">last Name</label>&nbsp;&nbsp;
		<input type="text" name="lname" placeholder="last name" value= <?php echo $_SESSION['last_name']; ?>>

<br>
		<label for="fname">Email</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="email" placeholder="email" value= <?php echo $_SESSION['email']; ?>>
<br>
<input type="submit" name="saveGeneralInfo" value="Save">



<hr>
<h3>Security</h3>
		<br><label>current password</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="password" name="c_password" placeholder="current password"><br>

		<label>new password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="password" name="new_password" placeholder="new password" ><br>

		<label>confirm password</label>&nbsp;&nbsp;&nbsp;
		<input type="password" name="confirm_password" placeholder="confirm password">
		<br>
		<input type="submit" name="password_submit" value="Save">
		<hr>
		<h3>Shop</h3>
		<br><label>Shop Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="shop_name" placeholder="shop name" value=<?php echo $_SESSION['shop_name'];  ?> ><br>

		<label>Shop Address</label>
		<input type="text" name="shop_address" placeholder="shop address" value=<?php echo $_SESSION['shop_address']; ?>><br>

		<label>City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="city" placeholder="city operating" value= <?php echo $_SESSION['city']; ?>>
		<br>
		<input type="submit" name="update_shop" value="Save">
<hr>

		<h3>Account</h3>
		<br><label>Account Title</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="account_title" placeholder="account title" value=<?php echo $_SESSION['account_title']; ?>><br>
		<label>Account Number</label>
		<input type="text" name="account_number" placeholder="account number" value=<?php echo $_SESSION['account_number']; ?>><br>

		
		<input type="submit" name="update_account" value="Save">
</form>
	</div>

</div>

</body>
</html>