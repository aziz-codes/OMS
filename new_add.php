<?php
include 'connection.php';
session_start();
if (isset($_POST['submit']))
{
    try
    {
        $user_id = $_SESSION['username'];
        $product_id = $_POST['id'];
        $product_name = $_POST['name'];
        $product_ram = $_POST['ram'];
        $product_intenal = $_POST['internal'];
        $product_color = $_POST['color'];
        $product_price = $_POST['price'];
        $stock = $_POST['stock'];
        $description=$_POST['description'];
        $product_condition = $_POST['condition'];
        $product_brand = $_POST['brand'];
        //to get image

        if ($_FILES['upload']['size'] != 0 ) {
        $filedata= $con->real_escape_string(file_get_contents($_FILES['upload']
  ['tmp_name']));
       $query = "INSERT INTO products VALUES('$user_id','$product_id','$product_name','$product_ram','$product_intenal','$product_color','$product_price','$stock','$description','$product_condition','$product_brand','$filedata')";
        $data = mysqli_query($con,$query);
        if($data)
        {
         header('location: Supplier.php');
        }
        else
         throw new Exception("Error Processing Request", 1);
         

        }
         else {
   echo 'error: empty file';
 }                  
    }
    catch(Exception $e)
    {
        echo "exception is " . $e;
    }
}

?>