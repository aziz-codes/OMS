<?php
session_start();
include 'connection.php';
$user_id = $_SESSION['username'];
if(isset($_POST['saveGeneralInfo']))
{
try
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $query="UPDATE users SET first_name='$fname',last_name='$lname',email='$email' WHERE username='$user_id'";
  $data=mysqli_query($con,$query);
  if($data)
  {
   echo "data updated successfully..";
   header('location: user_profile_settings.php');
   $_SESSION['email']=$email;
   $_SESSION['first_name']=$fname;
   $_SESSION['last_name']=$lname;
  }
  else
  	echo "data not updated..";
  	throw new Exception("Error Processing Request", 1);

}
catch(Exception $e)
{
  echo "exception is ".$e;
}
}
if(isset($_POST['password_submit']))
{
	$c_password=$_POST['c_password'];
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];
	$query="SELECT * FROM users WHERE password='c_password' AND username='$username'";
	$data=mysqli_query($con,$query);
	if($data)
	{
		if($new_password==$confirm_password)
		{
			//update user password...
			$update_password_query="UPDATE users SET password='$confirm_password' WHERE username='$user_id'";
			$update_data=mysqli_query($con,$update_password_query);
			if($update_data)
			{
				echo "your password has been changed...";
			}
			else
				echo "there was an error occured while changing your password..please try again.";
		}
		else
			echo "password does'nt match...";
	}//end of if data not found in database...
	else
		echo "incorrect password..";
}
if(isset($_POST['update_shop']))
{
	$shop_name=$_POST['shop_name'];
	$shop_address=$_POST['shop_address'];
	$city=$_POST['city'];

	//query to update shop information:
	$update_shop_query="UPDATE users SET shop_name='$shop_name',shop_address='$shop_address',city='$city' WHERE username='$user_id'";

	//check if query is successfully executed or not..
	$update_shop_check=mysqli_query($con,$update_shop_query);
	if($update_shop_check)
	{
		echo "shop information updated..";
		$_SESSION['shop_name']=$shop_name;
		$_SESSION['shop_address']=$shop_address;
		$_SESSION['city']=$city;
	}
	else
		echo "an error occured...";
}


// <---------------account updation code----------->

if(isset($_POST['update_account']))
{
	$account_title=$_POST['account_title'];
	$account_number=$_POST['account_number'];

	//update account query......

	$update_account_query="UPDATE users SET account_title='$account_title',account_number='$account_number' WHERE username='$user_id'";
	$check_account_info=mysqli_query($con,$update_account_query);
	if($check_account_info)
	{
		echo "account information updated successfully.";
		$_SESSION['account_title']=$account_title;
		$_SESSION['account_number']=$account_number;
	}
	else
		echo "an error occured while updating your data...";
}

  ?>