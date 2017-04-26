<?php
class dbconnectivity{
var $connection = Null;
	function __construct(){
	$this->connection = new PDO("mysql:host=localhost;dbname=php;","root","root") or die("Unable to connect");
 	return $this->connection;
	}

	public function insert($name,$pass,$gender)
		{
			echo $name;
			die("not accessible");
		$query=$this->connection->prepare("INSERT INTO `registration`(`username`, `password`, `gender`) VALUES(:name,:password,:gender)");
		if($name!="" && preg_match("/[a-zA-z]/",$name))
		{	
			if($pass!="" && preg_match("/[a-zA-Z0-9]/",$pass)){
		$query->bindParam(":name",$name);
		$query->bindParam(":password",$pass);
		$query->bindParam(":gender",$gender);
				
		 var_dump($query->execute());
			}else{
			     return "Password is invalid/empty";

			     }					
			}

			else{
			return "Name is invalid/empty";
		     }
		}
		public function login($name,$pass){
				
			$query=$this->connection->prepare("SELECT from registration where username=:name and password=:pass");
			$query->bindParam(":name",$name);
			$query->bindParam(":pass",$pass);
			$db=$query->execute();
			if($db->rowCount()>0)
			{header('Location: test.php');
				exit; 			
			}
		
		}
}		
?>

