<?php 
include "connection.php";
session_start();
$id=$_GET['id'];
 $mydate=getdate(date("U"));
 $check="Delivered on: "."$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
$selectQuery="SELECT * FROM ordertable WHERE id='$id'";
$data1=mysqli_query($con,$selectQuery);
if(mysqli_num_rows($data1)>0)
{
	while($row2=mysqli_fetch_array($data1))
	{
		if($row2['deliver']=="Delivered" || $row2['deliver']==$check){
			echo "you have delivered this product already..";
		}
		else
		{
			$query="UPDATE ordertable SET deliver='$check' WHERE id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
	echo "you have mark product as delivered, make sure to deliver the product to the customer..";
}
else
echo "delivery failed..";
		}
	}
}
 ?>