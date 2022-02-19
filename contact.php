<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
      if(isset($_POST["submit1"])){
          
          $username = $_POST["username"];
          $email = $_POST["email"];
          $message = $_POST["messages"];
          
          
          
          
          
         $to = "shubhamgiramkar1212@gmail.com";
         $subject = "Contact with Us";
         
         $message =  "Name : {$username},<br>
                     Email : {$email}
                     <br>
                      Message : {$message}";
        // $message .= "<h1>This is headline.</h1>";
         
         $header = "From:gsdeveloper1212@gmail.com\r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
             echo "$message sent succesfully";
     }
         else {
           echo "$message not sent";
         }}
      ?>
      
   </body>
</html>