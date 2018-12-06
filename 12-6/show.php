<?php
header("Content-type: text/html; charset=utf-8"); 
$where = " where 1=1";
$bookname = '';
if(isset($_GET['bookname'])){
	$bookname = $_GET['bookname'];
	$where .= " and bookname like '%$bookname%' ";
}
$cate = '';
if(isset($_GET['cate'])){
	$cate = $_GET['cate'];
	$where .= " and cate like '%$cate%' ";
}

$db = new PDO("mysql:host=localhost;dbname=week6",'root','root');
$db->query('set names utf8');
$sql = "select * from cj" .$where;

$data = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="show.php" method="get">
		名：<input type="text" name="cate" value="<?php echo $cate ;?>">
		<button>搜索</button>
	</form>
	<table>
		<tr>
			<th>id</th><th>名</th><th>网址</th>
		</tr>
		<?php  foreach ($data as $k => $v) { ?>
			<tr>
				<td><?php echo $v['id']  ?></td>
				<td><?php echo $v['cate'] ?></td>
				<td>
					<a href="<?php echo $v['href']  ?>">
						<?php echo $v['href'] ?>
					</a>
				</td> 
				<!-- <td>
					<?php echo $v['newword']  ?>
				</td>
				<td><?php echo $v['author']  ?></td>
				<td>
					<?php echo $v['wordcount']  ?>
				</td>
				<td>
					<?php echo $v['updatetime']  ?>
				</td> -->
			</tr>
		<?php } ?>
	</table>
</body>
</html>