<?php
session_start();
try
{
    include 'connection.php';
    $username = $_SESSION['username'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    
    if (isset($_POST['submit']))
    {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cnic = $_POST['cnic'];
    $phone_number = $_POST['number'];
    $gender = $_POST['g'];
    $shopName = $_POST['shopName'];
    $shopAddress = $_POST['shopAddress'];
    $city = $_POST['city'];
    //$home_service = $_POST['home_service'];
    $account_title = "";
    $account_number = "";
        if(isset($_POST['home_service']))
        {
            $home_service = 'Yes';
        }
        else
            $home_service = 'No';

        if(isset($_POST['allow']))
        {
            $account_title = $_POST['payment'];
            $account_number = $_POST['account_number'];
        }
        else
        {
            $account_number = "N/A";
            $account_title = "N/A";
        }

        $query = "INSERT INTO users VALUES('$username','$email','$password','$fname','$lname','$cnic','$phone_number','$gender','$shopName','$shopAddress','$city','$home_service','$account_title','$account_number','')";
        $data = mysqli_query($con,$query);
        if($data)
        {
           echo '<script language="javascript">';
           echo 'alert("You have been successfullyy logged in please return to the home page<br>and login again")';
             echo'</script>';
             unset($_SESSION['username']);
             unset($_SESSION['email']);
             $_SESSION['password'];
             header('location: OMS_Login.php');
        }
        else
        throw new Exception("Error Processing Request". mysqli_error($con));
            

    }

}
catch(Exception $e)
{
    echo "Exception is :".$e;
}
?>
