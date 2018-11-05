<?php
class zhoukao{
  	//1-100的和用for实现
  	public static function hefor($sum,$num){
  		$sum=1;
		$num=0;
		$i=0;
		for($i=0;$i<100;$i++){
			$sum++; 
			$num=$num+$sum;
		}
		return $num;
  	}
	//1-100的和用while实现
	public static function hewhile($sum,$num){
		$sum=1;
		$num=0;
	  	$i=0;
		while($i<100){
			$sum++; 
			$num=$num+$sum;
			$i++;
		}
		return $num;
	}
	//1-100的和用dowhile实现
  	public static function hedowhile($sum,$num){
  		$sum=1;
		$num=0;
		$i=0;
		do{
			$sum++; 
			$num=$num+$sum;
			$i++;
		}while($i<100); 
		return $num;
  	}
  	//阶乘用for实现
  	public static function jiechengfor($a,$b){
  		for ($i=1; $i <= $a; $i++) { 
	        if($a>1){
	          $b*=$i;  
	        }
    	}
    	return $b;
  	}
  	//阶乘用递归实现
  	public static function demo($a,$b){

  		if($a>1){
  			for($i=1;$i<=$a;$i++){
  				$b=$a*($a-1);
  			}
  		}else{
    		$b=$a;
  		}
  		return $b;
  	}

  	public static function huiwen($str){
  		$len=strlen($str);
		$l=1;
		$k=intval($len/2)+1;
		for($j=0;$j<$k;$j++){
			if (substr($str,$j,1)!=substr($str,$len-$j-1,1)){
				$l=0;
				break;
			}
		}
		if ($l==1){
			return "是";
	    }else{
			return -1;
		}
  	}

}
echo zhoukao::hefor(1,100);
echo "<br>";
echo zhoukao::hewhile(1,100);
echo "<br>";
echo zhoukao::hedowhile(1,100);
echo "<br>";
echo zhoukao::jiechengfor(10,1);
echo "<br>";
echo zhoukao::demo(10,1);
echo "<br>";
echo zhoukao::huiwen(123321);