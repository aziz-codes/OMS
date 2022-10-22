<?php
$con=mysqli_connect("localhost","root","","mydatabase") or die("connection failed..");
 
 if(isset($_POST['submit']))
 {
 	try
 	{
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $password=$_POST['password'];

        $query="INSERT INTO mydata VALUES('$name','$email','$contact','$password')";
        $data=mysqli_query($con,$query);

        if($data)
        {
        	echo "your account has been created..";
        }
        else
        	echo "data insertion failed....";

   	}
 	catch(Exception $e)
 	{
 		echo $e;
 	}
 }


  ?>



  <!DOCTYPE html>
  <html>
  <head>
  	<title>Tutorial 1</title>
  </head>
  <body>
  <form method="POST" action="#">
  	<div class="form-input">
  		<input type="text" name="name" placeholder="enter your name">
  		<br><br>
  		<input type="email" name="email" placeholder="enter your email">
  		<br><br>
  		<input type="text" name="contact" placeholder="enter your phone number">
  		<br><br>
  		<input type="password" name="password" placeholder="create password">
  		<br><br>
  		<input type="submit" name="submit" value="create account">
  	</div>
  </form>
  </body>
  </html>