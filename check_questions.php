
<?php
session_start();
include "connection.php";
$userid=$_SESSION['userid'];
$msg='';
if(isset($_POST['submit']))
{

  $ans1=$_POST['q1a'];

 
  $ans2=$_POST['q2a'];


  $ans3=$_POST['q3a'];

  $check_query="SELECT * FROM security_questions WHERE q1a='$ans1' AND q3a='$ans3'AND q3a='$ans3' AND username='$userid' ";
  $check=mysqli_query($con,$check_query);
  if(mysqli_num_rows($check)>0)
  {
    header('location: reset_password.php');
  }
  else
  {
    $msg='one or more QA not matching.'.mysqli_error($con);
  }

}



?>








  <!DOCTYPE html>
  <html>
  <head>
  	<title>Security Questions</title>
  	 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  	<style type="text/css">
      *{
      font-family: 'Poppins', sans-serif;
    }
  		.ok
  		{
  			display: block;
        margin: 0 10px;

  		}
  		.ok input[type="text"]
  		{
  			height: auto;
  			width: 30%;

  		}
      .userID
      {
        position: absolute;
        top: 2%;
        left: 40%;
        height: 30px;
        width: 250px;
        background-color: #b3ffb3;
        display: inline-flex;
      }
  	</style>
  </head>
  <body>
<div class="userID">
  <label style="">user id: <?php echo "". $userid; ?></label>
</div>
 
<form method="POST" action="check_questions.php">
   <div class="ok">      
      <h2>Security Questions</h2>
      <h5 style="font-size: 14px;">complete your questions and answer them to reset your password</h5>
      <div class="msg" style="margin: 0 10px;"><p style="color: red;"><?php echo $msg; ?></p></div>
    <h2>01:</h2>
    <input type="text" name="qa" class="Form-Control" placeholder="" value="best friend"><br><br>
    <input type="text" required=""  class="Form-Control" name="q1a" placeholder="your answer" value=""><br></br>
        <h2>02:</h2>
        <input type="text" name="qq"  class="Form-Control" placeholder="" value="favorite movie" ><br><br>
    <input type="text" name="q2a"  class="Form-Control" required="" placeholder="your answer" value=""><br></br>

    <h2>03:</h2>
        <input type="text" name="qqq"  class="Form-Control" placeholder="" value="first pet"><br><br>
    <input type="text" name="q3a"  class="Form-Control" required="" placeholder="your answer" value=""><br></br>
    <input type="submit" name="submit" class="btn btn-success" value="submit" style="margin-left: 12%;">
    </div>
</form>



  </body>
  </html>