<?php 
header("Content-type: text/html; charset=utf-8"); 
require 'vendor/autoload.php';
use QL\QueryList;
require 'function.php';
$url = "www.ifeng.com";
$html = curlRequest($url);
$rules = array(
	'cate'=>array('#headLineDefault a','text'),

	'href'=>array('#headLineDefault a','href'),
);
$data = QueryList::Query($html,$rules)->data;
$db = new PDO("mysql:host=localhost;dbname=week6", 'root', 'root');
$db->query('set names utf8');

foreach ($data as $k => $v) {
	if(isset( $v['cate'])){
		$cate = $v['cate'];
		$href = $v['href'];
		$sql = "insert into cj (cate,href) values ('$cate','$href')";
		$db->exec($sql);
	}	
}


echo "采集入库成功";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="show.php">
		<input type="submit" value="去展示">
	</form>
</body>
</html>