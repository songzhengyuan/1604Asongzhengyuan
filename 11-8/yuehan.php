<?php
function killMonkey($monkeys , $m , $current = 0){
     $number = count($monkeys);
     $num = 1;
     if(count($monkeys) == 1){
         echo $monkeys[0]."成为了胜利者";
         return;
     }
     else{
         while($num++ < $m-1){
             $current++ ;
             $current = $current%$number;
         }
         echo $monkeys[$current]."删掉了<br/>";
         array_splice($monkeys , $current , 1);
         killMonkey($monkeys , $m , $current);
     }
 }
 $monkeys = array(1 , 2 , 3 , 4 , 5 , 6); //monkeys的编号
 $m = 3; //数到第几只猴子被踢出
 killMonkey($monkeys , $m);








echo "<br>";

 function yuesefu($n,$m) {  
     $r=0;  
     for($i=2; $i<=$n; $i++) {
         $r=($r+($m-1))%$i;  
     }
     return $r+1;  
 }  
 echo yuesefu(10,3)."是最后一个";