<?php 

echo 'moon';
die();
require 'dbconnection.php'; 


$obj=new dbconnectivity();
$d = $obj->insert('asdfasdf','sadf','asdf');
print_r($d);
die();
//print_r($obj1= $obj->insert($_POST['username'],$_POST['password'],$_POST['gender']));
if($obj1=="Name is invalid/empty")
{
	echo "<span id='msg'>Name is not valid<span>";
		exit;
	
}else if($obj1=="Password is invalid/empty")
	{
	

	}


}

?>
