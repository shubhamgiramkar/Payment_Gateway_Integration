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
    <script src = "main.js"> </script>


    <?php

include "connect.php";

// SQL query to select data from database
$sql = "SELECT * FROM history  ORDER BY date DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Transaction History</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color:#3D3635;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
    th{
      background-color:#6AFB92;
    }
		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>Transaction History</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
      <th>Sender Name</th>
				<th> Receiver Name</th>
				<th>Transaction Amount</th>
        <th>Date</th>
				    
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
                <td><?php echo $rows['user'];?></td>
				<td><?php echo $rows['receiver'];?></td>
				<td><?php echo $rows['amount'];?></td>
				<td><?php echo $rows['date'];?></td>
                
                <!--<td><?php //echo"<li><a href =>Transfer Now</a></li>";?></td>-->
			<?php	//echo "<td ><a href='Details.php? $_SESSION['Name'] ={$row["Name"]} & message='no' type='button' name='submit'  id='users1' ><span>Expand</span></a></td>";?>
			</tr>
			<?php
				}
			?>
		</table>
	</section>








</body>
</html>