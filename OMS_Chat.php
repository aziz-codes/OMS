<?php
session_start();
include "connection.php";
if(!isset($_SESSION['customer_id']))
echo "you have'nt created an account, a random id has been assigned for you.";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="chat_application.css">
	 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<form method="POST" action="#">
<div class="message-panel">
	<div class="top-panel">
		<label>From</label>
		<p style="margin-left: 40px;"><?php echo "Guest"?></p>
		<label>To:<?php echo "  ".$_GET['supplier']; ?></label>

		<hr>
	</div>
<div class="input-group" style="position: sticky;top: 90%;">
  <input type="text" class="form-control" placeholder="enter message" aria-label="Recipient's username" aria-describedby="basic-addon2" name="message">
  <div class="input-group-append" >
  <input type="submit" class="btn btn-success" name="btn" value="Send">
  </div>
</div>
<?php 
//to display all message/...
if(isset($_POST['btn']))
{
	  $supplier=$_GET['supplier'];
	  $msg="You: ".$_POST['message'];
if(isset($_SESSION['customer_id']))
{
	//select all chats from the table...
}
else
{
   $query="INSERT INTO chat VALUES('$supplier','You: Guest','h','$msg')";
   $data=mysqli_query($con,$query);
   if($data)
   {
   	$query2="SELECT * FROM chat WHERE supplier='$supplier' AND customer='You: Guest'";
   	$result=mysqli_query($con,$query2);
   	if(mysqli_num_rows($result)>0)
   	{
     while($row=mysqli_fetch_array($result))
     {
     	echo $row['customer_message'];
     	?>
     	<br>
     	<?php 
     	echo $row['supplier_message'];
     }



   	}
   }
   
}

}//end of isset




?>
</div>
</form>
<?php
if(isset($_POST['btn']))
{

}
  ?>
</body>
</html>