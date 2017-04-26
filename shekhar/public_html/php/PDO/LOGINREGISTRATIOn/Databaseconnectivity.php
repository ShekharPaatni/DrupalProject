<?php
class DatabaseConnectivity{

var $connection=Null;
          function __construct(){
            $this->connection=new PDO("mysql:host=localhost;dbname=php;","root","root") or die("unable to connect");
            return $this->connection;
          }
          //Check the user Exist or not
          function fetch($query,$name){
            $que=$this->connection->prepare($query);
            $que->bindParam(":name",$name);
            $que->execute();
            $que->setFetchMode(PDO::FETCH_ASSOC);
            if($que->rowCount()>0){
              return false;
            }else {
              return true;
            }
                                      }

          //function to insert the registration
          function regist($query,$name,$pass,$gender){
            $que=$this->connection->prepare($query);

            $que->bindParam(':name',$name);
            $que->bindParam(':pass',$pass);
            $que->bindParam(':gender',$gender);
          $que->execute();
            return true;
          }
            //Login  id
            function login($name,$password){
              $que=$this->connection->prepare("SELECT * from registration where username=:name and password=:pass");
              $que->bindParam(":name",$name);
              $que->bindParam(":pass",$password);
              $que->execute();
              $que->setFetchMode(PDO::FETCH_ASSOC);
              if($que->rowCount()>0){
                return true;
              }else{
                return false;
              }

            }
            function fetchValue($name){

              $que=$this->connection->prepare("SELECT * from registration where username=:name");

              $que->bindParam(":name",$name);
              $que->execute();
              $obj=$que->fetch(PDO::FETCH_ASSOC);;
              return $obj['password'];
              //return $que["password"];

            }
            function update($name,$pass){
            
              $que=$this->connection->prepare("UPDATE `registration` SET`password`=:pass WHERE `username`=:name");
                $que->bindParam(':name',$name);
                $que->bindParam(':pass',$pass);
                if($que->execute())

                  return true;
                  else
                  return false;
                }

} ?>
