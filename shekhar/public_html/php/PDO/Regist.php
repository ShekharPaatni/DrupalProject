<?php 


require 'dbconnection.php'; 


$obj=new dbconnectivity();
//$d = $obj->insert('asdfasdf','sadf','asdf');

$obj1= $obj->insert($_POST['username'],$_POST['password'],$_POST['gender']);
if($obj1=="Name is invalid/empty")
{
	echo "Name is not valid";
		exit;
	
}else if($obj1=="Password is invalid/empty")
	{
	echo "Password is invalid";

	}


?>
