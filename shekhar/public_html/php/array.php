<?php
echo "<pre>";
$arr=[1,2,3,78,45,54,64,21,41,52,11,21,33,22,555,44,11,88,36,21,85,45,12,45,52,74];
foreach($arr as $temp)
echo $temp."&nbsp";
echo "<br>";
echo "Unique value<br><br>";
$arra=array_unique($arr);
foreach($arra as $temp)
echo $temp."&nbsp";
echo "<br><br>Reverse Sort<br><br>";
$rev=array_reverse($arr);
foreach($rev as $temp)
echo $temp."&nbsp";
echo "<br><br>Last Item of the array<br><br>";

echo $arr[count($arr)-1];
echo "<br><br>First Item of the array<br><br>";
echo $arr[0];
echo "<br><br>Second Item of the array<br><br>";
echo $arr[1];
echo "<br><br>Highest Item of the array<br><br>";
echo $rev[0];
echo "<br><br>Lowest Item of the array<br><br>";
echo $rev[count($arr)-1];
echo "<br><br>sum of all Item of the array excluding highest<br><br>";
echo array_sum($arr)-$rev[0];
echo "</pre>";
?>
