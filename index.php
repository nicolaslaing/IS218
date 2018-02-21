<?php
	$date =  date('Y-m-d', time());
	echo "The value of \$date: ".$date."<br>";
	$tar = "2017/05/24";
	echo "The value of \$tar: ".$tar."<br>";
	$year = array("2012", "396", "300","2000", "1100", "1089");
	echo "The value of \$year: ";
	print_r($year);

//----------------------
	$date = str_replace('-', '/', $date);
	echo "<br/><br/>2) \$date with '-' replaced: " . $date;
//----------------------
	echo "<br/>3) \$date compared to \$tar: ";
	$num = strcmp($date, $tar);
	if($num == 0){
		echo "Opps";
	}
	elseif($num < 0){
		echo "The Past";
	}
	else{
		echo "The Future";
	}
//----------------------
	echo "<br/>4) Positions of '/' in \$date: ";
	$pos = array();
	$off = 0;
	while(($last = strpos($date, '/', $off)) !== false){
		$off = $last + 1;
		$pos[] = $last;
	}	
	foreach ($pos as $value){
		echo $value . " ";
	}
//----------------------
	echo "<br/>5) Number of words in \$date: ";
	$dateArr1 = count(explode("/", $date));
	echo $dateArr1;
//----------------------
	echo "<br/>6) Length of \$date string: " . strlen ($date);
//----------------------
	echo "<br/>7) ASCII value of first char in \$date string: " . ord(substr($date, 0, 1));
//----------------------
	echo "<br/>8) Last two chars in \$date: " . substr($date, -2);
//----------------------
	echo "<br/>9) Date Array: ";
	$dateArr2 = explode('/', $date);
	print_r($dateArr2);
//----------------------
	echo "<br/>10) Leap Years<br/>";
	foreach ($year as $val){
		while($val){
			switch($val % 100){
				case !0:
					if($val % 4 == 0){
						echo "$val: True | ";
					}
					else{
						echo "$val: False | ";
					}
					break;
				case 0:
					if($val % 400 == 0){
						echo "$val: True | ";
					}
					else{
						echo "$val: False | ";
					}
					break;
			}
			break;
		}
	}
?>