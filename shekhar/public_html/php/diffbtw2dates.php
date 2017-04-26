<?php

$str=strtotime("01-01-2017");
$str1=time();
$da=abs($str-$str1);
$days=floor($da/(3600*24));
$dat=date("d",$str);
$day=date("D",$str);
$month=date("m",$str);
$year=date("Y",$str);
echo $year;

while($days>0){
switch($month)
{
case 01: if($day==Sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
					 	$day=changeday($day);
						$dat++;

				if($dat>31)
					{
						$dat=$dat-31;
						
						$month=02;
					}
			$days--;				
			}
			else if($dat>31){
					$dat=$dat-31;
					
					if($day==Sat)
					echo "<br>".$day."&nbsp;&nbsp;".$dat."<br>";
					$month=02;

					$days--;	
							
					}else{
					 	$day=changeday($day);
						$dat++;
						
							$days--;					      
						}
						break;

case 02: if($year%4==0){
		if($day==Sat && $dat<30){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;
			      if($dat>29)
				{
					$dat-=29;
					$month=03;
				}
				$days--;
				}else if($dat>29)
						{
						$dat-=29;
						if($day==Sat)
						echo "<br>".$day."&nbsp;&nbsp;".$dat."<br>";
						$month=03;
						$days--;						
						}else{
							$day=changeday($day);
							$dat++;
							$days--;
							}
						break;

				}else{

					if($day==Sat && $dat<29){
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
							$day=changeday($day);
							$dat++;
						      if($dat>28)
							{
						$dat-=28;
						$month=03;
							}
						$days--;
						}else if($dat>28)
						{
						$dat-=28;
						if($day==Sat)
						echo "<br>".$day."&nbsp;&nbsp;".$dat."<br>";
						$month=03;
						$days--;
						}else{
							$day=changeday($day);
							$dat++;
							$days--;
							}
						break;



}
					
case 03: if($day==sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			$day=changeday($day);
			$dat++;   
				if($dat>31)
				{
					$dat-=31;
					$month=04;
				}$days--;
				}else if($dat>31)
						{
						$dat-=31;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=04;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;




case 04:	if($day==sat && $dat<31){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>30)
				{
					$dat-=30;
					$month=05;
				}$days--;
				}else if($dat>30)
						{
						$dat-=30;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=05;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;


case 05:	if($day==sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>31)
				{
					$dat-=31;
					$month=06;
				}$days--;
				}else if($dat>31)
						{
						$dat-=31;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=06;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;



case 06:	if($day==Sat && $dat<31){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>30)
				{
					$dat-=30;
					$month=07;
				}$days--;
				}else if($dat>30)
						{
						$dat-=30;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=07;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;
case 07:  if($day==Sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>31)
				{
					$dat-=31;
					$month=08;
				}$days--;
				}else if($dat>31)
						{
						$dat-=31;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=08;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;


case 08: if($day==Sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>31)
				{
					$dat-=31;
					$month=09;
				}$days--;
				}else if($dat>31)
						{
						$dat-=31;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=09;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;
case 09: 	if($day==Sat && $dat<31){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>30)
				{
					$dat-=30;
					$month=10;
				}$days--;
				}else if($dat>30)
						{
						$dat-=30;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=10;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;

case 10: 	if($day==Sat && $dat<32){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>31)
				{
					$dat-=31;
					$month=11;
				}$days--;
				}else if($dat>31)
						{
						$dat-=31;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=11;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;

case 11: if($day==Sat && $dat<31){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			
			$day=changeday($day);
			$dat++;   
				if($dat>30)
				{
					$dat-=30;
					$month=12;
				}$days--;
				}else if($dat>30)
						{
						$dat-=30;
						if($day==Sat)
						echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
						$month=12;$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;



case 12: if($day==Sat && $dat<31){
			echo "<br>".$dat."&nbsp;&nbsp;&nbsp;".$day."<br>";
			$day=changeday($day);
			$dat++;   
				if($dat>30)
				{
					$dat-=30;
					$month=01;
					$year++;
				}$days--;
				}else if($dat>30)
						{
						$dat-=30;
						if($day==Sat)
						
						$month=01;
						$year++;
						echo $year;
						$days--;
						}else{
							$day=changeday($day);
							$dat++;$days--;
							}
						break;

}
}

function changeday($day){
if($day==Mon)
$day=Tue;
else if($day==Tue)
$day=Wed;
else if($day==Wed)
$day=Thu;
else if($day==Thu)
$day=Fri;
else if($day==Fri)
$day=Sat;
else if($day==Sat)
$day=Sun;
else
$day=Mon;
return $day;


}
?>
