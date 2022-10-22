<?php 
$servername="localhost";
$username="root";
$password="";
$db="OMS_Database";

$con=mysqli_connect($servername,$username,$password,$db);
   if($con)
   {
    
   }
   else
   	{
   		echo '<script language = "javascript">';
   		echo 'alert("connection to the database failed...")';
   		echo "</script>";
   	}
 ?>