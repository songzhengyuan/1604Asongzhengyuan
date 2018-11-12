<?php 

$i=0;$j=0;$k=0;$n=0;
for($i=1;$i<5;$i++){
	for($j=1;$j<5;$j++){
		for($k=1;$k<5;$k++){
			if ($i!=$k&&$i!=$j&&$j!=$k){
				$n++;
				printf("%d\n",$i*100+$j*10+$k);
				// echo "<br>";
			}
		}
	}
}
echo "总数".$n;