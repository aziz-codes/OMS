<?php 
include 'connection.php';
session_start();
$msg = "";
if(isset($_POST['Submit']))
{
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $confirm_password = $_POST['confirm_password'];
       $msg = "Des";

       if($password==$confirm_password)
       {
        // $msg = "password does not match.";
           $checkQuery = "SELECT * FROM user_registration WHERE username = '".$username."'";
         $data = mysqli_query($con,$checkQuery);
         if(mysqli_num_rows($data)>=1)
         {
              $msg = "    username has been already taken.";
              
         }
         else
         {
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            header('location: Supplier_Data.php');
        }
    
   }
   else
      $msg = "    password does not match.";
/*
else
{
   echo '<script language="javascript">';
   echo 'alert("password doesnt match..")';
   echo'</script>';
   include("user_register.php");
}
*/
}




 ?>




<!DOCTYPE html>
<html>
   <head>
    <style type="text/css">
      .message
      {
        width: 1.5%;
        height: 30px;
        background-color: red;
        color: white;
        position: absolute;
        left: 10;
        top: 15%;
        float:  left;
        clear: left;
        transition: 1s;
      }
    </style>
      <title>OMS| Registration</title>
      <link rel="stylesheet" type="text/css" href="user_registrationDesign_css.css">
      <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@200&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
         <div class="banner">
         <div class="data-box">
            <form action="#" method="post" class="input-group" id="Register">   
            <div class="box-input">
               <div class="message" id="message" onclick="ok();"></div>
              <div class="message-panel" style="background-color: transparent;font-size: 12px;position: absolute; top: 15.5%;
              left: 10.5%;">
                 <p style="transition: 1s;"> <?php echo $msg; ?> </p>
                
              </div>
               <input type="text" name="username" placeholder="Enter username" required="">
               <input type="text" name="email" placeholder="Enter Your Email" required="">
               <input type="password" name="password" placeholder="Create Password" required="">
               <input type="password" name="confirm_password" placeholder="Confirm Password " required="">
               <br><br>
               
            </div>
               
                <button type="submit" name="Submit" id="ok" class="btn">Next&#8594;</button>
            </form>
         </div>
      </div>
     <script type="text/javascript">
       //var message = document.getELementById('message');
      function ok() {
         message.style.width="50%";
       }
     </script>
   </body>
</html>