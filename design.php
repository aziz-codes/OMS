<?php
include_once 'connection.php';
$result = mysqli_query($con,"SELECT * FROM info WHERE username = 'aziz42'");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table style="border: 2px solid black;">
  
  <tr>
    <td>Name</td>
    <td>Username</td>
    <td>Image</td>
    
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["image"]; ?></td>

</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>