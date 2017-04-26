<?php

require 'Databaseconnectivity.php';
session_start();
  $connection=new DatabaseConnectivity();
$name=$_POST['username'];
$password=$_POST['password'];
if($connection->login($name,$password))
  {
$_SESSION["username"]=$name;
echo json_encode("profilePage.php");
  }
  else{
    echo json_encode("Registration.php");
      }


 ?>
