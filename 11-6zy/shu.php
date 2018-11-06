<?php
function nu($n,$m) {
    $number = 0;
    for($i=$n;$i<=$m;$i++) {
        $a = substr_count((string)$i,"1");
        if($a!==false) {
            $number = $number+$a;
        }
        //echo $i."\n";
    }
    echo $number;
}
nu(1,13);


function one($a,$b)
{
    $c = range($a,$b);
    $c = implode($c);
    $arr = str_split($c);
    return array_count_values($arr)[1];
}
echo one(1,13);