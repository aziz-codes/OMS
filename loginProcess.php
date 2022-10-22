<?php
   include_once("connection.php");
   session_start();
  try {
    
     if(isset($_POST['submit']))
     {
     	 $email = $_POST['email'];
      	$password = $_POST['password'];
        $query="SELECT * FROM user_registration WHERE (email='".$email."' OR username ='".$email."') AND password='".$password."'";
     $result=mysqli_query($con,$query);     
    if(mysqli_num_rows($result)>0)
   {
    include("Supplier.php");
     while($row = $result->fetch_assoc())
     {
      $_SESSION['username']=$row["username"];
     }
       
  }
  else
    echo "no data found..";
  
    }
    throw new Exception("Invallid user details, <br> please check again.");
} 
catch (Exception $e)
 {
     echo ":".$e;
} 
  
 ?>