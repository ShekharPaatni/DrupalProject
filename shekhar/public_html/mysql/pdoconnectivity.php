<?php

class pdoconnection{
  var $conection=null;
  public function __construct(){
    try{
      $this->conection=new PDO("mysql:host=localhost;dbname=advance;","root","root") or die("Unable to connect");
        return $this->conection;
        //var_dump($this->conection);
    }catch(PDOException $e){
      echo $e->getMessage();
    }

  }
  public function avgmax(){
    $query=$this->conection->prepare('SELECT e.name, e.address, e.phone, e.DOB, d.name as department, s.salary
    FROM emp e, Department d, salary s
    WHERE e.dept_id = d.id
    AND e.id = s.emp_id
    AND s.salary > (
    SELECT AVG( salary )
    FROM salary)
    ');
     $query->execute();
     echo "<br>Fetch employee's Name, address, Phone, Dob, Department, salary whose salary is greater than average salary.<br>";
     echo "<br>";
echo "<table border=2px solid black>";

     while($result=$query->fetch(PDO::FETCH_ASSOC))
      {
        echo "<tr>";
        echo "<td>".$result['name']."</td><td>".$result['address']."</td><td>".$result['phone']."</td><td>".$result['DOB']."</td><td>".$result['department']."</td><td>".$result['salary']."</td>";
        echo "</tr>";
      }
        echo "</table>";
  }

  public function current(){
    $query=$this->conection->prepare('SELECT AVG( paid_salary) as Average FROM salary_paid WHERE salary_month=:month');
    $obj=date("M");
    $obj=strtoupper($obj);
    $query->bindParam(':month',$obj);
    $query->execute();
    echo "<br>Fetch Paid average salary for the current month. <br>";
    echo "<br>";
  echo "<table border=2px solid black>";

    while($result=$query->fetch(PDO::FETCH_ASSOC))
     {
        echo "<tr>";
       echo "<td>".$result['Average']."</td>";
       echo "</tr>";
     }
       echo "</table>";
    }

    public function top(){
      $query=$this->conection->prepare('SELECT e.name, e.phone, sp.salary_month, sp.paid_salary
FROM emp e, salary_paid sp
WHERE e.id = sp.emp_id
AND salary_month = :month
ORDER BY sp.paid_salary DESC
LIMIT 0 , 5');
$obj=date("M");
$obj=strtoupper($obj);
$query->bindParam(':month',$obj);
$query->execute();
echo "<br>Fetch the top 5 Employee's Name, Phone, Salary month, Paid salary for the current month<br>";
echo "<br>";
echo "<table border=2px solid black>";

while($result=$query->fetch(PDO::FETCH_ASSOC))
 {
    echo "<tr>";
   echo "<td>".$result['name']."</td><td>".$result['phone']."</td><td>".$result['salary_month']."</td><td>".$result['paid_salary']."</td>";
   echo "</tr>";
 }
   echo "</table>";
}
/**
*
*/
  public function join(){
    $query=$this->conection->prepare('SELECT e.name, e.address, e.phone, e.DOB, d.name as Department, s.salary,sp.salary_month
FROM Department d, emp e, salary s, salary_paid sp
WHERE e.id = s.emp_id
AND sp.emp_id = e.id
AND d.id = e.dept_id
AND e.id not in (SELECT e.id
FROM emp e, salary_paid sp
WHERE e.id = sp.emp_id
AND sp.salary_month =:month)
LIMIT 0 , 30'
);
$last_month = date('M', strtotime('last month'));
$last_month=strtoupper($last_month);
$query->bindParam(':month',$last_month);

$query->execute();
echo "<br>Fetch the employee's name, phone, dob, department name, salary who join last month.<br>";
echo "<br>";
echo "<table border=2px solid black>";

while($result=$query->fetch(PDO::FETCH_ASSOC))
 {
   echo "<tr>";
   echo "<td>".$result['name']."</td><td>".$result['address']."</td><td>".$result['phone']."</td><td>".$result['DOB']."</td><td>".$result['Department']."</td><td>".$result['salary']."</td><td>".$result['salary_month']."</td>";
   echo "</tr>";
 }
   echo "</table>";
}


public function dob(){

    $query=$this->conection->prepare('SELECT name,DOB,phone,address FROM `emp` WHERE
      date_format(DOB,\'%m-%d\') =:dob');

    $dob=date('m-d');
    $query->bindParam(':dob',$dob);
    $query->execute();
    echo "<br>Create a Program in PHP that will fetch and show employee details whose DOB is today?<br>";
    echo "<br>";
    echo "<table border=2px solid black>";

    while($result=$query->fetch(PDO::FETCH_ASSOC))
     {
       echo "<tr>";
       echo "<td>".$result['name']."</td><td>".$result['address']."</td><td>".$result['phone']."</td><td>".$result['DOB']."</td>";
       echo "</tr>";
     }
       echo "</table>";

}


}
 ?>
