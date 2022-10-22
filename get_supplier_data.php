<?php 
//get_supplier_data.php this if file name
include "connection.php";
$output="";
$query="SELECT * FROM products";
$result=mysqli_query($con,$query) or die("Sql Query Failed");
if(mysqli_num_rows($result>0))
{
  $output='<table border="1" width="100%" cellspacing="0" cellpadding="10px">
  <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>RAM</th>
        <th>Internal</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Color</th>
        <th>Description</th>
        <th>Brand</th>
        <th>Status</th>
        <th>Image</th>
       
      </tr>';
      while($row=mysqli_fetch_assoc($result)){
      	$output.="<tr><td>{$row["product_id"]}</td>"
      }
      $output="</table>";
      echo $output;
}
else
{
echo "not no data found";
}

 ?>