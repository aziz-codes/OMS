<?php
$con=mysqli_connect("localhost","root","","mydatabase") or die("connection failed..");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$query="INSERT INTO main_table VALUES('$name','$email','$contact')";
	$data=mysqli_query($con,$query);
	if($data)
	{
		echo "data inserted";
	}
	else
		echo "data not inserted ".mysqli_error($con);
}


?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Setting</title>
  </head>
  <body>
  	<form action="#" method="POST">
  <div class="input-form">
  	<input type="name" name="name" placeholder="enter your name"><br>
  	<input type="email" name="email" placeholder="enter your email"><br>
  	<input type="contact" name="contact" placeholder="enter contact"><br>
  	<input type="submit" name="submit" value="save">
  </div>
  </form>
  </body>
  </html>