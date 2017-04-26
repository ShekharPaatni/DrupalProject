<?php
for ($i1 = 1; $i1 <=2; $i1++) {
	echo "Exec outer loop <br>";
	for ($i2 = 1; $i2 <=2; $i2++) {
		echo "Exec middle loop <br>";
			for ($i3 = 1; $i3 <=2; $i3++) {
			echo "$i1 $i2 $i3<br>";
			continue 2;
		}
	}
}
?>
