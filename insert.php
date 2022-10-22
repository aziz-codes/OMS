<?php 
//include connection code here.
include 'connection.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nic = $_POST['cnic'];
$number = $_POST['number'];
$gender = $_POST['gender'];
echo "details are <br>:name :".$fname."<br>gender: ".$gender;
if(isset($_POST['Submit']))
{
	echo "hello";
}

 ?>
