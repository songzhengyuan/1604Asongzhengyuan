<?php
// class Solution {
//     int NumberOf1Between1AndN_Solution(int 13) {
        $count=0;//计数
     if($n < 0){
         //负数
         return 0;
     }
      for($i=0;$i<=n;$i++){
          $digit=i+"";
          array[] chars=digit.toCharArray();
          for($j=0;$j<$chars.length;$j++){
              if($chars[j]=='1'){
                  $count++;
              }
          }
      }
        return count;
//     }
// }