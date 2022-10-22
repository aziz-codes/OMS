
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Test</title>
  </head>
  <body>
  <form action="test.php" method="POST">
  	
  	<input type="text" name="name" placeholder="Enter Name"><br>
  	<input type="text" name="username" placeholder="crate username"><br>
  	<input type="file" name="file" value="select profile image"><br>
  	<input type="submit" name="submit" value="Submit"> 
  </form>

  <?php
  include "connection.php";

  if(isset($_POST['submit']))
  {
  	 $name=$_POST['name'];
  $username = $_POST['username'];
  $image = $_POST['file'];
    $q = "INSERT INTO info VALUES('$name','$username','$image')";
    $data=mySqli_query($con,$q);
    if($data)
    {
    	header("Location: design.php"); // jump to other page.....
    }
    else
    	echo "an error occured..";
  }
  ?>
  </body>
  </html>