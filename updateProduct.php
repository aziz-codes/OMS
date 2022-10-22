

<!DOCTYPE html>
<html>
   <head>
      <title>Product</title>
      <link rel="stylesheet" type="text/css" href="addProduct.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <body>
     <form action="#" method="POST">
         <div class="container">
         <h1 style="margin: auto 20%; font-weight: bold;">Product Details</h1>

         <label for="exampleFormControlInput1">Product ID</label>
         <input type="text" name="id" placeholder="Enter Product ID/Model/Serial Number" style="width: 90%;" required=""><br>


         <label for="exampleFormControlInput1">Product Name</label>
         <input type="text" name="name" placeholder="Please Specfiy Full Name" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">RAM</label>
         <input type="text" name="ram" placeholder="2GB, 3GB , 4GB" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Internal Storage</label>
         <input type="text" name="internal" placeholder="16GB, 32GB" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Colors Available</label>
         <input type="text" name="color" placeholder="Sepecify Colors" style="width: 90%;"><br>

         <label for="exampleFormControlInput1">Price</label>
         <input type="text" name="price" placeholder="Enter Price" style="width: 90%;" required=""><br>

         <label for="exampleFormControlInput1">Quantity</label>
         <input type="text" name="stock" placeholder="Stock Available" style="width: 90%;"><br>

         <label for="exampleFormControlInput1">Description</label>
         <input type="text" name="description" placeholder="Add Description(optional)" style="width: 90%;padding-bottom: 80px; word-wrap: break-word;"><br>


         <label for="exampleFormControlInput1">Condition</label><br>
         <select style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="condition">
            <option>New</option>
            <option>Used</option>
         </select>
         <br><br>
         <label for="exampleFormControlInput1">Brand</label><br>
         <select id="make" style="width: 100%;height:35px;border: 1px solid #007bff; font-weight: bold; font-family: Poppins" name="brand">
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
         <input type="file" name="image" value="select image" accept="image/x-png,image/gif,image/jpeg" /><br><br>
         <input type="submit" name="submit" value="Submit Data" style="margin-left: 
         130px;">
      </div>
    
     </form>
   </body>
</html>