<?php
function GetSum($m,$n)//递归
{
	if ($m == 1 || $n == 1)
		return 2;
	$total = GetSum($m - 1, $n) + GetSum($m, $n - 1);
	return $total;
}
$m = 3;
$n = 3;
print_r(GetSum($m,$n));



echo CountSteps(3,3);
function CountSteps($x,$y){
	if($x==0 && $y==0){
		return 0;
	}else if($x==0 || $y==0){
		return 1;
	}
	return CountSteps($x,$y-1)+CountSteps($x-1,$y);
}