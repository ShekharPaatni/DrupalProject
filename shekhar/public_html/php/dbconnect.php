<?php
error_reporting(1);
echo "<pre>";
$con=mysqli_connect("localhost","root","root","php")or die(mysqli_connect_error());
if(!$con)
echo "error";
else
{echo "success";
$res=mysqli_query($con,"SELECT * FROM sample");
echo "<br>".mysqli_num_rows($res);
while($data=mysqli_fetch_row($res)){
echo $data[1];
print_r($data);
}
}
echo "</pre>";
?>
