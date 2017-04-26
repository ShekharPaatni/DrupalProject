<?php

static $count=0;
for($i=1;$i<=11;$i++)
	{
		for($j=1;$j<=$i;$j++){

			if($i>4)
			echo "&nbsp;&nbsp;$count";
			$count++;				
				     
			}
		if($i>4)		
		echo "<br>";
	}

?>

