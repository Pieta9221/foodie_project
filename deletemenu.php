<?php
session_start();
require 'connection.php';
$config = new mysqli ($host, $user, $pwd, $database);

if(isset($_GET['menuid'])){
  
  $error='';
  $success='';
  $menuid = $_GET['menuid'];
  
  $query  = "DELETE FROM menu WHERE menuid = '$menuid'";
  $result = $config->query($query);
  
  if($result === TRUE){
    header('location:menu.php');
    // $success= "Successfully Deleted";
    
    
  }else{
   header('location:menu.php');
  //  $error =  "Oops! Not Deleted";
    
  }

 
} 
?>