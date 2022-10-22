<?php
session_start();
$user_id=$_SESSION['username'];
include "connection.php";
$check=mysqli_query($con,"SELECT * FROM security_questions WHERE username='$user_id'");
	if(mysqli_num_rows($check)>0)
	{
		echo "you have already submitted your answers.";
		while($row=mysqli_fetch_array($check))
		{
			$bf=$row['q1a'];
			$fm=$row['q2a'];
			$pn=$row['q3a'];
		}
	}
	else
	   {
         
if(isset($_POST['submit']))
{
	try
	{
	$q=$_POST['q1'];
	$ansa=$_POST['q1a'];

	$qq=$_POST['q2'];
	$ansb=$_POST['q2a'];

	$qqq=$_POST['q3'];
	$ansc=$_POST['q3a'];

$check=mysqli_query($con,"SELECT * FROM security_questions WHERE username='$user_id'");
	if(mysqli_num_rows($check)>0)
	{
		echo "you have already submitted your answers.";
	}
	else
	{

		

	 $insert_query="INSERT INTO security_questions VALUES('$user_id','$q','$ansa','$qq','$ansb','$qqq','$ansc')";

	$data=mysqli_query($con,$insert_query);
	if($data)
	{
		header('location:Supplier.php');
	}
	else
	{
		echo "answer did not submitted".mysqli_error($con);
	}
		
       }
	}//end of try
	catch(Exception $e)
	{
    echo $e;
	}
}





	   }
















  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Security Questions</title>
  	 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  	<style type="text/css">
  		.ok
  		{
  			display: block;
  		}
  		.ok input[type="text"]
  		{
  			height: auto;
  			width: 30%;

  		}
  	</style>
  </head>
  <body>

  <form action="#" method="POST">
  	<div class="ok">
  		
  	<div style="padding-bottom: 0;margin-bottom: 1px;">
  		<h2>Security Questions</h2>
  	<h4  style="margin-top: -10px;">these will help you resetting your password</h4>
  	<ol style="list-style-type: lower-roman;">
  		<li>be specific while answering any question.</li>
  		<li>make sure you won't forget what you answer.</li>
  		<li>if you set questions at your own make sure to remember their answers.</li>
  	</ol>
  	</div>



  	<h2>01:</h2>
  	<input type="text" name="q1" class="Form-Control" placeholder="" value="best friend"><br><br>
  	<input type="text" required=""  class="Form-Control" name="q1a" placeholder="your answer" value=""><br></br>
  	  	<h2>02:</h2>
  	  	<input type="text" name="q2"  class="Form-Control" placeholder="" value="favorite movie" ><br><br>
  	<input type="text" name="q2a"  class="Form-Control" required="" placeholder="your answer" value=""><br></br>

  	<h2>03:</h2>
  	  	<input type="text" name="q3"  class="Form-Control" placeholder="" value="first pet"><br><br>
  	<input type="text" name="q3a"  class="Form-Control" required="" placeholder="your answer" value=""><br></br>
  	<input type="submit" name="submit" class="btn btn-success" value="submit" style="margin-left: 15%;">
  	</div>




  </form>


  </body>
  </html>