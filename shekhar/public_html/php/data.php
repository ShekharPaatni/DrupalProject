<html>
<head><title>CSV</title>
</head>
<body>
<table border="2px solid black" cellspacing="3px" cellpadding="2px"> 
<?php
$fp=fopen("excel.csv","r")or die("unable to open file");

while(!feof($fp)){
echo "<tr>";
$temp=fgetcsv($fp);
foreach($temp as $check)
{echo "<td>";
echo $check;
echo "</td>";
}
echo "</tr>";
}

?>
</table>
</body>
</html>
