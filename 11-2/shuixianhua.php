<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="shuixianhua.php" method="post">
	输入一个数<input type="text" name="name">
	<input type="submit" value="查询">
</form>
</body>
</html>
<?php 
$name=isset($_POST['name'])?$_POST['name']:"";
$hundreds=floor($name/100);
$tens=floor($name/10)%10;
$ones=floor($name%10);
return(bool)(pow($hundreds,3)+pow($tens,3)+pow($ones,3)==$name);
echo $name;
?>