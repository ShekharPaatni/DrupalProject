<?php
$x="w3resource";
$cou=0;
$chara='w';
for($i=0;$i<strlen($x);$i++){
if($x[$i]==$chara)
$cou++;
}
echo "The count of the \" $chara \" variable is: $cou";
?>

