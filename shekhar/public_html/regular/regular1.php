<?php
$x=file_get_contents("http://www.amazon.in/Aqua-Pearl-Mobile-battery-White/dp/B0102BFCU4/ref=sr_1_1?s=electronics&ie=UTF8&qid=1489749309&sr=1-1-spons&keywords=mobile&psc=1");
// echo "<pre>";
//echo $x;
$my=htmlspecialchars($x);
echo "<pre>".$my."</pre>";
//preg_match_all("/<div class=\"(.*)\">(.*)<\/div>/",$x,$res);
//echo $my."<br>";
//print_r($res[0]);
//echo "</pre>";
?>
