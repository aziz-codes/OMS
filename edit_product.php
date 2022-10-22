<?php
session_start();
include "connection.php";
  ?>
<!DOCTYPE html>
<html>
   <head>
      <title>OMS||Edit Product</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="addProduct.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <style type="text/css">
  ul li a
  {
    margin-left: 50px;
    font-family: "Poppins", sens-serif;
    font-weight: bold;
    color: black;
  }
  .card-groups
  {
    display: flex;
    margin: 40px 100px;
    justify-content: space-around;
  }
  .card-groups img
  {
    height: 100px;
    width: 100px; 
  }

  .dropbtn {
  background-color: transparent;
  color: white;
  height: 40px;
  width: 40px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 130px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown img
{
  height: 40px;
  width: 40px;
  border-radius: 50px;
}
.dropdown-content::before
{
  content: '';
  position: absolute;
  top: -20px;
  right: 100px;
  width: 15px;
  height: 25px;
  background-color: black;
  transform: rotate(45deg);
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.order-panel
{
  position: relative;
  margin: 30px 50px;
}
</style>
<?php //code to update product details....
if(isset($_POST['submit']))
{
  try{


       $user_id = $_SESSION['username'];
        $product_id = $_GET['id'];
        $product_name = $_POST['name'];
        $ram = $_POST['ram'];
        $internal = $_POST['internal'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description=$_POST['description'];
        $product_condition = $_POST['condition'];
        $product_brand = $_POST['brand'];
         if ($_FILES['upload']['size'] != 0 ) {
        $filedata= $con->real_escape_string(file_get_contents($_FILES['upload']
        ['tmp_name']));

//update query

        $update_query="UPDATE products SET product_name='$product_name',RAM='$ram',internal='$internal',color='$color',price='$price',quantity='$stock',description='$description',product_condition='$product_condition',brand='$product_brand',image='$filedata' WHERE supplier_id='$user_id' AND product_id='$product_id'";

        $result=mysqli_query($con,$update_query);
      if($result)
      {
        header('location:Supplier.php');
      }
      else
        echo "an error occured while updating your data...";


      }
      else
        echo "invallid file..";
        }
        catch(Exception $e)
        {
          throw new Exception("Error Processing Request", 1);
          echo "::::".$e;
        }



}//end of issset block...


 ?>


<?php
$product=$_GET['id'];
$supplier_id=$_SESSION['username'];
$query="SELECT * FROM products WHERE product_id='$product' AND supplier_id='$supplier_id'";
$data=mysqli_query($con,$query);
if(mysqli_num_rows($data)>0)
{
while($row=mysqli_fetch_array($data))
{
?>

     <form method="POST" action="#" enctype="multipart/form-data">
         <div class="container" style="margin: 0;">
         
         <label for="exampleFormControlInput1">Product ID</label>
         <input type="text" name="id" placeholder="Enter Product ID/Model/Serial Number" style="width: 90%;" required="" disabled="" value="<?php echo $row['product_id']; ?>"><br>


         <label for="exampleFormControlInput1">Product Name</label>
         <input type="text" name="name" placeholder="Please Specfiy Full Name" style="width: 90%;" required="" id="product_name" value="<?php echo $row['product_name']; ?>"><br>

         <label for="exampleFormControlInput1">RAM</label>
         <input type="text" name="ram" placeholder="2GB, 3GB , 4GB" style="width: 90%;" required="" value="<?php echo $row['RAM']; ?>"><br>

         <label for="exampleFormControlInput1">Internal Storage</label>
         <input type="text" name="internal" placeholder="16GB, 32GB" style="width: 90%;" required="" value="<?php echo $row['internal']; ?>"><br>

         <label for="exampleFormControlInput1">Colors Available</label>
         <input type="text" name="color" placeholder="Sepecify Colors" style="width: 90%;" value="<?php echo $row['color']; ?>"><br>

         <label for="exampleFormControlInput1">Price</label>
         <input type="text" name="price" placeholder="Enter Price" style="width: 90%;" required="" value="<?php echo $row['price']; ?>"><br>

         <label for="exampleFormControlInput1">Quantity</label>
         <input type="text" name="stock" placeholder="Stock Available" style="width: 90%;" value="<?php echo $row['quantity']; ?>"><br>

         <label for="exampleFormControlInput1">Description</label>
         <input type="text" name="description" placeholder="Add Description(optional)" style="width: 90%;padding-bottom: 80px; word-wrap: break-word;" id="product_description" value="<?php echo $row['description']; ?>"><br>


         <label for="exampleFormControlInput1">Condition</label><br>
         <select style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="condition">
            <option>New</option>
            <option>Used</option>
         </select>
         <br><br>
         <label for="exampleFormControlInput1">Brand</label><br>
         <select id="make" style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="brand">
          <option selected=""><?php echo $row['brand']; ?></option>
            <option value="apple">Apple</option>
            <option value="asus">Asus</option>
            <option value="phones-blackberry">BlackBerry</option>
            <option value="calme">Calme</option>
            <option value="acer">Acer</option>
            <option value="club">Club</option>
            <option value="gfive">G'Five</option>
            <option value="google">Google</option>
            <option value="gright">Gright</option>
            <option value="haier">Haier</option>
            <option value="honor">Honor</option>
            <option value="htc">HTC</option>
            <option value="huawei">Huawei</option>
            <option value="inew">iNew</option>
            <option value="infinix">Infinix</option>
            <option value="lava">Lava</option>
            <option value="lenovo">Lenovo</option>
            <option value="lg">LG</option>
            <option value="meizu">Meizu</option>
            <option value="mobilink-jazzx">Mobilink JazzX</option>
            <option value="motorola">Motorola</option>
            <option value="nokia">Nokia</option>
            <option value="one-plus">One Plus</option>
            <option value="oppo">OPPO</option>
            <option value="panasonic">Panasonic</option>
            <option value="qmobile">QMobile</option>
            <option value="realme">Realme</option>
            <option value="rivo">RIVO</option>
            <option value="samsung">Samsung</option>
            <option value="sony">Sony</option>
            <option value="sony-ericsson">Sony Ericsson</option>
            <option value="tecno">Tecno</option>
            <option value="vivo">Vivo</option>
            <option value="voice">VOICE</option>
            <option value="xiaomi">Xiaomi</option>
            <option value="zte">Zte</option>
            <option value="other-mobiles">Other Mobiles</option>
         </select>
         <br><br>
         <label for="exampleFormControlInput1">choose image file</label><br>
         <input type="file" name="upload" /><br> <br><br>
         <input type="submit" name="submit" value="Update Data" style="margin-left: 
         130px;">
      </div>
    
     </form>


<<?php
}//end of while






}//end of if condition



  ?>
     <script type="text/javascript">
  var panel = document.getElementById("panel");
   var ok = document.getElementById("message");
  

   //user profile script has been pasted....
   function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
   </body>
</html>
