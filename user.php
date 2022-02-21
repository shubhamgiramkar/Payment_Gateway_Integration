<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">
    <title>Basic Banking System </title>
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
  body{
    background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
}


form{width: 50%;
    height: 200%;
   
    text-align: center;
    
    background:#C0C0C0;
   
  justify-content: center;

}
.form:hover{
    box-shadow: #333;
}
/*.img{
   
    
    height:100%;
    width:50%;
}
/*.contact{
    margin-top: 3%;
    display: flex;
}*/
input{
   width:50%;
   height: 40%;
}




input[type=text], input[type=email], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color: #31e9e9;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #51a1e2;
  }
  
 /* .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }*/

</style>

</head>
<body>
    <section class = "about-section">

      <nav>
        <a href = "index.html"> <img src = "images/logo.png" width= "100px;"> </a>
        <div class="navbar" id = "navlinks">
         
         <i class = "fa fa-times" onclick= "show();"></i>

            <ul id = "MenuItems">
              <li><a href = "index.html"> Home </a></li>
              <li><a href = "customer.php">Our Customers </a></li>
              <li><a href = "history.php">Trasaction History</a></li>
              <li><a href = "transfer.php">Transfer Money</a></li>
              <li><a href = "user.php">New User</a></li>
            </ul>

        </div>

         <i class = "fa fa-bars" onclick= "hide();"></i>

    </nav>


    </section>

    

<div class="form">
<h2>Create Account</h2>
  <form action="" method="POST">
    <label for="name">Name</label>
    <input type="text" id="name" name="user" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your Email..">

    
     <label for="mobile">Mobile Number</label>
    <input type="text" id="mobile" name="mobile" placeholder="Your Mobile Number..">

    
     <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" placeholder="Your Gender..">
    
    <label for="address">Address</label>
    <input type="text" id="Address" name="address" placeholder="Your Address..">

    
     <label for="balance">Balance</label>
    <input type="text" id="balance" name="balance" placeholder="Your Balance..">

    
     
    
  
    <input type="submit"  name="register" value="Register Now">
  </form>
</div>
    <script src = "main.js"> </script>

<?php

  include "connect.php";

  if(isset($_POST["register"]))
  {
      $name = $_POST["user"];
      $email = $_POST["email"];
      $mobile = $_POST["mobile"];
      $gender = $_POST["gender"];
      $address = $_POST["address"];
      $balance = $_POST["balance"];


      $insertquery = "INSERT INTO users(Name,Email,Mobile,Gender,Address,Balance) VALUES('$name','$email','$mobile','$gender','$address','$balance')";

      $result =$mysqli->query($insertquery);

      if($result){

          ?>

          <script>
              alert("Data Inserted Properly.");
          </script>

          <?php

      }
      else{

          ?>

          <script>
              alert("Data Not Inserted.");
          </script>

          <?php
          

      }

  }


?>

    
    
    <section class = "footer">
       <div class="container">
           <div class="col-3">
             <div class="f-title">
               <h2> About </h2>
             </div>
             <div class="f-desc">
                <p> We connect all students of all financial backgrounds with experts.
                    <br>
                    Knowledge sharing enables equal opportunity for all.
                </p>
             </div>
           </div>
           <div class="col-3">
            <div class="f-title">
               <h2> Links </h2>
            </div>
            <div class="f-desc">
                <ul>
                    <li><a href = "index.html"> Home </a></li>
                 <li><a href = "customer.php">Our Customers </a></li>
                 <li><a href = "history.php">Trasaction History</a></li>
                 <li><a href = "transfer.php">Transfer Money</a></li>
                 <li><a href = "user.php">New User</a></li>
                  </ul>
            </div>
          </div>
          <div class="col-3">
            <div class="f-title">
               <h2> Contact </h2>
            </div>
            <div class="f-desc">
                <div class="icon">
                    <a href="">
                        <i class="fa fa fa-facebook"></i>
                    </a>
                    <a href="">
                      <i class="fa fa fa-instagram"></i>
                    </a>
                    <a href="">
                      <i class="fa fa fa-youtube"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/shubham-giramkar-0253bb1aa">
                      <i class="fa fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
          </div>
       </div>
       <hr> 
          <p style= "color: green;"> &copy;copyrights2022 TSF. All rights reserved!<br>
           made by @GiramkarShubham. </p>
    </section>

    <script src = "main.js"> </script>
</body>
</html>


</body>
</html>