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


    table {
      border-collapse: collapse;
      width: 100%;
      color: black;

      font-size: 25px;
      text-align: left;
    }

    th {
      background: #863544;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    #sideNav {
      width: 250px;
      height: 100vh;
      position: fixed;
      right: -250px;
      top: 0;
      background: #863544;
      z-index: 2;
      transition: .5s;
    }

    nav ul li {
      list-style: none;
      margin: 50px 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: #fff;
    }

    #menuBtn {
      width: 50px;
      position: fixed;
      right: 65px;
      top: 35px;
      z-index: 2;
      cursor: pointer;
    }


    .card {
      /* Add shadows to create the "card" effect */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      text-align: -webkit-center;
    }
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    /* Add some padding inside the card container */
    .container {
      padding: 20px 16px;
      margin: 40px;
      background: antiquewhite;
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
              <li><a href = "customer.php">Our Customers </a></li>
              <li><a href = "history.php">Trasaction History</a></li>
              <li><a href = "Details.php">Transfer Money</a></li>
              <li><a href = "user.php">New User</a></li>
            </ul>

        </div>

         <i class = "fa fa-bars" onclick= "hide();"></i>

    </nav>


    </section>
    <script src = "main.js"> </script>








    <table>
    <tr>
      <th>Account Number</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Balance</th>

    </tr>


    <?php
    session_start();
    include "connect.php";
    //error_reporting(0);


    $_SESSION['Name'] = $_GET['Name'];
    $_SESSION['sender'] = $_SESSION['Name'];


    ?>
    <?php
    if (isset($_SESSION['submit'])) {
      $user = $_SESSION['Name'];

      $sql = "SELECT * FROM users WHERE Name='$user'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";

        echo "<td>" . $row["Acc_Number"] . "</td><td>" . $row["Name"] . "</td>
              <td>" . $row["Email Id"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Balance"] . "</td>";

        echo "</tr>";
      }
    }
    ?>
    <div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;
}">
      <h3>Make a Transaction</h3>
    </div>
    <div class="card container">
      <?php
      if ($_GET['message'] == 'success') {
        echo "<h3><p style='color:green;' class='messagehide'>Transaction was completed successfully</p></h3>";
      }
      if ($_GET['message'] == 'transactionDenied') {
        echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
      }
      ?>
      <form action="transfer.php" method="POST">
        <!-- Make Transcation -->

        <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
        <select name="reciever" id="dropdown" class="textbox" required>
          <option>Select Recipient</option>
          <?php
          $db = mysqli_connect("localhost", "root", "", "ritika");
          $res = mysqli_query($db, "SELECT * FROM users WHERE name!='$user'");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
        </select>
        <br><br>
        <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
        <br><br>


        <b>Amount :&#8377;</b>
        <input name="amount" type="number" min="100" class="textbox" required>
        <br><br>
        <a href="transfer.php"><button id="transfer" name="transfer" ;>Transfer</button></a>
      </form>
    </div>

    <div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;
}">
      <h3>Customer Details</h3>
    </div>

