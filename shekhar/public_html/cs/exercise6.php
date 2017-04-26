<?php
$num1 = 0;
$num2 = 0;
$fs = 0;
do {
$currentNum = $num1 + $num2;
echo "F{$fs} = {$currentNum}\n";
if ($fs == 0 || $fs == 1) {
$num2 = 1;
} else {
$tmp = $num2;
$num2 = $num2 + $num1;
$num1 = $tmp;
}
$fs++;
} while ($fs < 10);
?>

