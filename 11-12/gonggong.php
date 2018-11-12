<?php 
    function getRelativePath($path1, $path2){
        // 参数判断
        if(!isset($path1) || !isset($path2)){
            return '请检查参数';
        }
        $path1_arr = explode('/', $path1);
        $path2_arr = explode('/', $path2);
        $count = count($path1_arr);
        $res_path = '';
        $pos = 0; // 异同部分开始的位置
        foreach ($path1_arr as $key => $value) {
            if($value != $path2_arr[$key]){
                $pos = $key;
                break;
            }
        }
        // 需要返回的层级数
        $len = $count - $pos -1;
        // 拼接相对前缀
        for($i = $len; $len > 0; $len--){
            $res_path .= '../';
        }
        // 求剩余路径
        $tail = implode('/', array_slice($path2_arr, $pos));
        return $res_path . $tail;
    }
    echo getRelativePath('/a/b/c/d/test.php', '/a/b/d/c/test.php');
?>