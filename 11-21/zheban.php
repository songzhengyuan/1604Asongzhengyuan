<?php
header("Content-type:text/html;charset=utf-8");
//非递归
$i = 0; 
function binsearch($arr,$num){
 $count = count($arr);
 $lower = 0;
 $high = $count - 1;
 global $i;
 while($lower <= $high){
  $i ++; 
  if($arr[$lower] == $num){
   return $lower;
  }
  if($arr[$high] == $num){
   return $high;
  }
  $middle = intval(($lower + $high) / 2);
  if($num < $arr[$middle]){
   $high = $middle - 1;
  }else if($num > $arr[$middle]){
   $lower = $middle + 1;
  }else{
   return $middle;
  }
 }
 return -1;
}
$arr = array(0,1,16,24,35,47,59,62,73,88,99);
$pos = binsearch($arr,62);
echo "下标";
print($pos);
echo "<br>";
echo $i;


echo "<br><br>";
// 递归
$arr = [1,2,3,4,11,12,124,1245];
function bin_recur_find($arr, $beg, $end, $v) {
	if ($beg <= $end) {
		$idx = floor(($beg + $end)/2);
		if ($v == $arr[$idx]) {
			return $idx;
		} else {
			if ($v < $arr[$idx]) {
				return bin_recur_find($arr, $beg, $idx - 1, $v);
			} else {
				return bin_recur_find($arr, $idx + 1, $end, $v);
			}
		}
	}
	return -1;
}
// 非递归二分查找
function bin_find($arr, $v) {
	$beg = 0;
	$end = count($arr) - 1;
	while ($beg <= $end) {
		$idx = floor(($beg + $end)/2);
		if ($v == $arr[$idx]) {
			return $idx;
		} else {
			if ($v < $arr[$idx]) {
				$end = $idx - 1;
			} else {
				$beg = $idx + 1;
			}
		}
	}
	return -1;
}
 
echo bin_recur_find($arr, 0, count($arr) - 1, 11) . "\n";
echo "<br>";
echo bin_find($arr, 11) . "\n";
