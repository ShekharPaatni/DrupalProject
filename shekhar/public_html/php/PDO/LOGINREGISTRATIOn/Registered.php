<?php

require 'Databaseconnectivity.php';
$name=trim($_POST['username']);
//$name="Shekhar";
$password=trim($_POST['password']);
//$password="sajkhsjkaj";
$gender=$_POST['gender'];
$arr=array();
if(($name=='' || strlen($name)<6))
$arr['nameerror']="Name must not be empty or character must be greater than 6";
else
$arr['nameerror']="";
if(($password=='' || strlen($password)<10))
$arr['passerror']="Password must not be empty must be greater than 10";
else
$arr['passerror']="";

if($arr['passerror']=="" && $arr['nameerror']==""){

  $connection=new DatabaseConnectivity();
    $obj="SELECT * from registration where username=:name";

  $obj1=$connection->fetch($obj,$name);

  if($obj1){
      $obj="INSERT INTO `registration` ( `username` , `password` , `gender` )
VALUES (:name,:pass,:gender)";
      if($connection->regist($obj,$name,$password,$gender)){
        $arr['nameerror']="Thank you for registration :)";
        $arr['passerror']="";
      }

  }else {
    $arr['nameerror']="User Already registered";
    $arr['passerror']="";
  }
}

echo json_encode($arr);
 ?>
