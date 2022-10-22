
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">

    Upload File:
    <input type="file" name="upload" /><br> 
    <input type="submit" name="submit" value="Submit"/>

    <input type="submit" name="display" value="display data">
</form>
<?php 
include "connection.php";
if(isset($_POST['submit'])  ) {

if ($_FILES['upload']['size'] != 0 ) {

  $filedata= $con->real_escape_string(file_get_contents($_FILES['upload']
  ['tmp_name']));

  $query = "INSERT INTO image VALUES('$filedata')" ;

  if ($con->query($query) == TRUE) {
   echo "<br><br> New record created successfully";
  } else {
   echo "Error:<br>" . $con->error;
  }

 } 

 else {
   echo 'error: empty file';
 }
}

if(isset($_POST['display']))
{
$query="SELECT * FROM image";
$data=mysqli_query($con,$query);
while($row=mysqli_fetch_array($data))
{
	?>
	<div class="div" style="width: 200px;height: 300px; background-color: orange;">
		<?php
       echo '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" height="50" width="100" />';
		  ?>
	</div>
	<?php 
}
 
}
?>
</body>
</html>