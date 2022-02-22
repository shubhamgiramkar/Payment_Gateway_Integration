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


* {
  box-sizing: border-box;
}
select,.text {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}


label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.cbox {
   
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}*/

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
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
              <li><a href = "cutomer.php">Our Customers </a></li>
              <li><a href = "history.php">Trasaction History</a></li>
              <li><a href = "transfer.php">Transfer Money</a></li>
              <li><a href = "user.php">New User</a></li>
            </ul>

        </div>

         <i class = "fa fa-bars" onclick= "hide();"></i>

    </nav>


    </section>
    <script src = "main.js"> </script>


    
<h2>Make a Transaction</h2>


<div class="cbox">
  <form action="#" method="post">
   <div class="row">
    <div class="col-25">
      <label for="user">From:</label>
    </div>
    <div class="col-75">
      <select id="user" name="user">
        <option value="australia">Select User</option>
        <?php
          $db = mysqli_connect("localhost", "root", "", "bank");
          $res = mysqli_query($db, "SELECT Name FROM users ");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
      </select></div></div>
     <div class="row">
    <div class="col-25">
      <label for="reciever">To:</label>
    </div>
    <div class="col-75">
      <select id="reciever" name="reciever">
        <option >Select Recipient</option>
        <?php
          $db = mysqli_connect("localhost", "root", "", "bank");
          $res = mysqli_query($db, "SELECT Name FROM users ");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
      </select>
    </div></div>

    <div class="row">
    <div class="col-25">
      <label for="amount">Amount:</label>
    </div>
    <div class="col-75">
      <input class="text" type="number" min="100" id="amount" name="amount" placeholder="Enter Amount" ></input>
    </div></div>
  <br>
  <div class="row">
    <input type="submit" value="Transfer Amount" name="transfer">
  </div>
  </form>
</div>

<?php 
   //include "connect.php";

   if(isset($_POST["transfer"])){
    $user=$_POST["user"];
    $reciver=$_POST["reciever"];
    $u_sql = "SELECT Balance FROM users  WHERE Name='$user' ";
$result = $db->query($u_sql);

while($rows=$result->fetch_assoc())
{
   $ubal=$rows['Balance'];
     
   }

   $r_sql = "SELECT Balance FROM users  WHERE Name='$reciver' ";
   $result = $db->query($r_sql);
  //$db->close();
   while($rows=$result->fetch_assoc())
   {
      $rbal=$rows['Balance'];
        
      }


  

  if($ubal<$_POST['amount'])
  {?>
    <h3 style="color:red;">Balance Not Available In Your Account!!!</h3>
    <br>
    <h4>Your Total Amount is: </h4>
 <?php echo"$ubal";
 }
   
  else if($ubal>=$_POST['amount'])
  {
    $date= date("Y-m-d");
    $amount=$_POST['amount'];
    $userha=$ubal-$amount;
    $recieverha=$rbal+$amount;
   
    $sql="UPDATE users SET Balance='$userha' WHERE Name='$user'";

    $db->query($sql);

    $sql="UPDATE users SET Balance='$recieverha' WHERE Name='$reciver'";

    $db->query($sql);


   
    
    $sql="INSERT INTO history (`user`, `receiver`, `amount`, `date`) VALUES ('$user','$reciver','$amount','$date')";
    $db->query($sql);

    ?>
    <h3 style="color:green;">Transaction successfull!!!</h3>
    <br>
    <h4>Your Available Balance is: </h4>
 <?php
    echo"$userha";
     
   }

  }
   
?>


</body>
</html>