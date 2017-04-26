<?php
//$x=file_get_contents("https://www.flipkart.com/samsung-galaxy-on5-gold-8-gb/p/itmedhx3uy3qsfks?pid=MOBECCA5FHQD43KA&srno=b_1_1&otracker=nmenu_sub_Electronics_0_Samsung&lid=LSTMOBECCA5FHQD43KAIOIURP");
//echo "<pre>";
//echo $x;
//$my=htmlspecialchars($x);
//echo "<pre>".$my."</pre>";
//preg_match_all("/<ul data-reactid=\"(.*)\">(.*)<\/a>/",$x,$res);
//echo $my."<br>";
//print_r($res);
//$len=implode($res[0]);
//echo $len;
//echo "</pre>";
$x=array('5','7',"hsdjkajs");
echo $x."<br>";
$y=array('key'=>'value','key1'=>'value1');
print_r($y);
echo "<br><br><br>";

$z=array();

$z[]=(object)array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array(array()))))))))))))))))))))))));
print_r(array_change_key_case($y,CASE_UPPER));
echo "<br>";
for($i=0;$i<count($x);$i++){
  echo "<br>".$x[$i];
}
$k=0;
$j=count($x);
while($j>0){
  echo "<br>".$x[$k];
  $k++;
  $j--;
}
foreach($y as $key=>$value){
  echo "<br>".$value;
}
echo "<br><br><br>";
$s=['150','250'];
echo in_array(150,$s);

?>
