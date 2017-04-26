<?php

require 'Databaseconnectivity.php';
session_start();
  $connection=new DatabaseConnectivity();

if($connection->update($_SESSION['username'],$_POST['password']))
echo json_encode("Data Has been updated");
else
echo json_encode("Data cannot be updated");
?>
