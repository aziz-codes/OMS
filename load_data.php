<?php
include "connection.php";

$query="SELECT * FROM user_registration WHERE password='iam'";
$data=mysqli_query($con,$query);
$output='';
$name="";
if(mysqli_num_rows($data)>0)
{
	$output='<table border="1" width="100%" cellspacing="0" cellpadding="10px">


	<tr>
	<th>username</th>
	<th>email</th>
	</tr>';
	while($row=mysqli_fetch_array($data))
	{

		
		$name= $row['username'];
	}
	

     $output=$name;
}
else
	echo "no data found";

 ?>