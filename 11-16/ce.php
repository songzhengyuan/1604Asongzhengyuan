<?PHP
$str = 'abcdefghabcdefg';

echo first($str);

function first($str)
{
    $arr = str_split($str);
    $cnt = array_count_values($arr);
    foreach($cnt as $key=>$val){
        if($val==1){
            return stripos($str,$key);
        }
    }
    return -1;
}