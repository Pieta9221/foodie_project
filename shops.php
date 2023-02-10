<?php
	require 'connection.php';
  $config = new mysqli ($host, $user, $pwd, $database);
  if ($config->connect_error){
    die("Server not found".connect_error);
  }
  else{
  

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];

    $adminemail = "ilechukwufran6ix@gmail.com";
    $send = mail($adminemail, $name,  $message, "From: ".$email);

    if($send){
      echo "<script> alert('$name, your mail has been successfully sent')</script>";
      include("index.php");
      
    }
    else{
      echo "<script> alert('$name, your message was not sent!')</script>";
      include("index.php");
      
    }
  }  

?>