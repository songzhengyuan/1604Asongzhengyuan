<?php 
header("Content-type:text/html;charset=utf-8");
//解法一
// function NumberOf1($n){
//  $count = 0;
//   $flag = 1;
//   while ($flag != 0) {
//    if (($n & $flag) != 0) {
//     $count++;
//    }
//    $flag = $flag << 1;
//   }
//   return $count;
// }


// 解法二
// function NumberOf1($n){
//  $count = 0;
//  if($n < 0){ // 处理负数
//    $n = $n&0x7FFFFFFF;
//    ++$count;
//  }
//  while($n != 0){
//   $count++;
//   $n = $n & ($n-1);
//  }
//  return $count;
// }

// 解法三
echo NumberOf1(10);
function NumberOf1($n){
	return substr_count(decbin($n),"1");
}


//测试
// $num=10;
// echo $num."的二进制是".decbin($num)."<br/>";
// echo $num."共有".NumberOf1($num)."个1";