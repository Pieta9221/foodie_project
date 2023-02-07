<?php
	require 'connection.php';
  $config = new mysqli ($host, $user, $pwd, $database);
  if ($conn->connect_error){
    die("Server not found".connect_error);
  }
  else{
  

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $message = $_REQUEST['message'];

    $adminemail = "mercy_nwaodu@yahoo.com";
    $send = mail($adminemail, $message, "From: ".$email);

    if($send){
      echo "<script> alert('$name, your mail has been successfully sent')</script>";
      
    }
    else{
      echo "<script> alert('$name, your message was not sent!')</script>";
      
    }
  }  

?>