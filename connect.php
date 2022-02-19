<?php

   $username = $_POST['username'];
   $email = $_POST['email'];
   $message = $_POST['messages'];

   if(!empty($username) || !empty($email) || !empty($message)){
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "project";

     // create connection

     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
     }
     else{
        $SELECT = "SELECT email From project Where email = ? Limit 1";
        $INSERT = "INSERT Into project (username, email, messages) values(?,?,?)";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('sss',$username, $email, $message);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if(rnum==0){
           $stmt->close();

           $stmt = $conn->prepare($INSERT);
           $stmt->bind_param("sss", $username, $email,$message);
           $stmt->execute();
           echo "New record inserted sucessfully";
        }
        else{
           echo "Someone already contact using this email";
        }
     }
     $stmt->close();
     $conn->close();

   }
   else{
      echo "All Fields are Requried";
      die();
   }

?>