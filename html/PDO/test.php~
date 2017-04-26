<?php
$databasePDO=new PDO("mysql:host=localhost;dbname=php;","root","root") or die("Unable to connec with database");
$query=$databasePDO->prepare("update csvtable set name=:name,salary=:salary,mobile=:mobile,email_id=:email where item=:item");



$query->bindParam(':item',$_POST['item']);
$query->bindParam(':name',$_POST['name']);
$query->bindParam(':salary',$_POST['salary']);
$query->bindParam(':mobile',$_POST['mobile']);
$query->bindParam(':email',$_POST['email']);
try{

$query->execute();
}
catch (PDOException $e) {
  echo $e->getMessage;
}


?>
