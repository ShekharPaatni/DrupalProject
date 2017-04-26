<?php
$db=new PDO("mysql:host=localhost;dbname=php;","root","root");
$query=$db->prepare("delete from csvtable where item=:item");
$query->bindParam(':item',$_POST['item']);
$query->execute();
?>
