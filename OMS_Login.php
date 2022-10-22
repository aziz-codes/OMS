<?php
include_once("connection.php");
session_start();
if(isset($_SESSION['username']))
{
  header('location: Supplier.php');
}
if(isset($_POST['Submit']))
{
try
{
     $email = $_POST['email'];
    $password = $_POST['password'];
    $query="SELECT * FROM users where (username='$email'|| email='$email') AND password='$password'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0)
    {
      while($row=mysqli_fetch_array($data))
      {
        $_SESSION['email']=$row['email'];
        $_SESSION['username']=$row["username"];
        $_SESSION['first_name']=$row['first_name'];
        $_SESSION['last_name']=$row['last_name'];
        $_SESSION['contact']=$row['phone_number'];
        $_SESSION['shop_name']=$row['shop_name'];
        $_SESSION['shop_address']=$row['shop_address'];
        $_SESSION['city']=$row['city'];
        $_SESSION['account_title']=$row['account_title'];
        $_SESSION['account_number']=$row['account_number'];
      }
      header('Location: Supplier.php');

    }
    else
      echo "invallid username or password";





}//end of try block
catch(Exeption $e)
{
  echo $e;
}//end of exception block




}//emd of isset

  ?>



<!DOCTYPE html>
<html>
   <head>
      <title>OMS| Registration</title>
      <link rel="stylesheet" type="text/css" href="OMS_Login_Design_css.css">
      
      <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@200&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style type="text/css">
     
      </style>
   </head>
   <body>
           <div class="banner">
         <div class="data-box">     
               <div class="socail-icon" id="icon-panel" style="margin-left: -60px;">
               <a href="https://www.facebook.com/azizkhan42"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
               <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
               <i class="fa fa-google-plus-square fa-2x"></i>
               </div>
            <form class="input-group" action="OMS_Login.php" method="POST">
               <input type="text" name="email" placeholder="User ID or Email ID"><br>
               <input type="password" name="password" placeholder="Password ">
               <br><br>
               
              <input type="submit" name="Submit" value="Next">
              <br><br><br><br><br>
              <a href="user_registrationDesign.php">create a new account</a><br>
               <a href="email_check.php" style="margin-left: 70px;color: black;">Foget Password</a>
    </div>
      </div>
      </body>
</html>