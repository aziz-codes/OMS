<?php
session_start();
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>||Supplier Information</title>
  <link rel="stylesheet" type="text/css" href="OMS_Supplier_Data.css">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<div class="banner">
         <div class="data-box">         
            
            <form action="register_supplier.php" method="POST" >
              <div class="input-group" id="Login">
               <h2 style="margin: 0 -10px; font-family: poppins;"><span style="color: #009688; font-family: poppins;" id="go">General</span> Information</h2><br><br>
               <input type="text" name="fname" placeholder="First Name" style="font-weight: bold;">
               <input type="text" name="lname" placeholder="Last Name" style="font-weight: bold;">
               <input type="text" name="cnic" placeholder="Enter Your CNIC" accept="number" style="font-weight: bold;">
               <input type="text" name="number" placeholder="Phone Number" style="font-weight: bold;"><br>
               <div class="gender">
                <label for="gender" style="font-weight: bold;">choose your gender:</label><br>
               <input type="radio" name="g" id="male" value="male">
               <label for="male" style="font-weight: bold;">Male</label>
                <br>
               <input type="radio" name="g" id="female" value="female">
               <label for="male" style="font-weight: bold;">Female</label>
                 <br>
               <input type="radio" name="g" id="other" value="other">
               <label for="other" style="font-weight: bold;">Other</label>               
               </div>               
               <button type="button" name="submit" class="next_button" onclick="register()">Next</button>
              
                </div>

                  <div class="input-group" id="Register" >
               <h2 style="margin: 0 -10px;  padding-bottom: 40px; flex-wrap: wrap;"><span style="color: #009688; font-family: poppins;">Shop</span> Information</h2>
               <input type="text" name="shopName" placeholder="Shop Name" required="" style="font-weight: bold;">
               <input type="text" name="shopAddress" placeholder="Shop Address" required="" style="font-weight: bold;"><br>
               <input type="text" name="city" placeholder="City(operating)" required="" style="font-weight: bold;"><br><br>
               
               <input type="checkbox" name="home_service" id="check" style="margin-left: -20px;">
               <label for="check" style="font-weight: bold;">Offer home delivery service.</label>
               <p style="font-size: 10px; font-weight: bold; color: black;opacity: 1; background-color: transparent;">mark checked if you provide home delivery service,<br>
               otherwise leave it unchecked.</p>
       
               <input type="checkbox" name="allow" id="check2" style="margin-left: -20px;" onclick="show()" >
               <label  style="font-weight: bold;">Allow online payments.</label>
               <p p style="font-size: 10px; color: black; font-weight: bold;">mark checked if you allow people,<br>
               make online paymnets.(easypaisa, jazz cash etc.)</p>
              
               <div class="paymentDetails" id="mo">
               <input type="radio" name="payment" id="easypaisa" onclick="check()" value="easypaisa">
               <label for="easypaisa" style="font-weight: bold;">EasyPaisa</label>
               <br>
               <input type="radio" name="payment" id="jazzcash" onclick="check()" value="jazzcash">
               <label for="jazzcash" style="font-weight: bold;">JazzCash</label>
               <br>
               <input type="text" name="account_number" placeholder="Enter Account Number" style="font-weight: bold;">
                </div>               
               <button type="button" class="toogle-btn" onclick="login()">Back</button>               
               <input type="submit" name="submit" value="Register" class="toogle-btn" style="margin-left: 10px;">
               </div>

           </div>
       </div>
            </form>


            <script type="text/javascript">
         var x = document.getElementById("Login");
         var y = document.getElementById("Register");
         var z = document.getElementById("btn");
         var a = document.getElementById("square");
         var panel = document.getElementById("mo");
         var checkBox = document.getElementById("check2");
        a.style.display = "none";
        panel.style.display = "none";
        count = 0;
         
         function show() {
            
             if (checkBox.checked == true){
             panel.style.display = "block";
             panel.style.transition = "3s";
              } 
              else {
             panel.style.display = "none";
               }
        }   

        //checking chekbox code goes here.
       function myFunction() {
        document.getElementById("jazzcash").disabled = true;
        }     


         function register()
         {
               x.style.left = "-400px";
               y.style.left = "50px";
               z.style.left = "110px";
               
         } 
         function login()
         {
              x.style.left = "50px";
               y.style.left = "450px";
               z.style.left = "0px"; 
         }

//Loader Animation Function starts here...
//loaded animation function
      
         var counter = 3;
         function LoadAnimation() {
            a.style.display = "block";
            setInterval(function(){
              
              counter--;
              if(counter == 0)
              {
               a.style.display="none";
               window.open("Supplier_Data.html");
              }
            },1000)
         }
      </script>
          


        <! -- PHP code starts here for this web page -->

</body>
</html>