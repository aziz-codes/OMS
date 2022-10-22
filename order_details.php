<?php
include "connection.php";
session_start();
if(isset($_POST['buybtn']))
{
	try
	{    
      $mydate=getdate(date("U"));
    
		 $product_name=$_SESSION['pname'];
		 $supplier_id=$_SESSION['supplier'];
		 $cond=$_SESSION['con'];
		 $color=$_SESSION['color'];
         $name=$_POST['name'];
         $email=$_POST['email'];
         $contact1=$_POST['contact1'];
         $contact2=$_POST['contact2'];
         $address=$_POST['address'];
         $city=$_POST['city'];
         $zipcode=$_POST['zipcode'];
         $id= uniqid();
         $deliver="Pending: "."$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

         $query="INSERT INTO ordertable VALUES('$id','$name','$email','$contact1','$contact2','$address','$city','$zipcode','$product_name','$color','$cond','$supplier_id','$deliver')";
         $data=mysqli_query($con,$query);
         if($data)
         {
         	echo "your order has been placed...";
         	echo "wait for confirmation message from the supplier.";
         }
         else
         	{
               echo mysqli_error($con);
               echo "".$id;
            }
         	
	}
	catch(Exception $e)
	{
		throw new Exception("Error Processing Request".$e);
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
<a href="OMS_Home.php">return to home page</a>
</body>
</html>