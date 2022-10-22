<?php 
include "connection.php";
session_start();
$username=$_SESSION['username'];
$product_id=$_GET['id'];
$query="DELETE FROM products WHERE supplier_id='$username' AND product_id='$product_id'";
$data=mysqli_query($con,$query);
if($data)
{
	echo "data deleted successfully..";
	header('location: Supplier.php');
}
else
echo "data can't be delete.".mysqli_error($con);

 ?>