<?php 
include("connection.php");
$username=$_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$type = $_POST['r_type'];

if(isset($_POST['Submit']))
{
	echo "details<br>".$username."<br>".$type;
}

 ?>