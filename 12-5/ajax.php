<?php
header("content-type:text/html;charset=utf-8");
mysql_connect('127.0.0.1','root','root');
mysql_select_db("week8");
mysql_query("set names utf8");
$cate=isset($_POST['cate'])?$_POST['cate']:"";
$dangqianye=isset($_GET['dangqianye'])?$_GET['dangqianye']:1;
$changdu=5;
$xiayiye=$dangqianye+1;
$shangyiye=$dangqianye-1;
//先看看总长度然后在进行向上取整求得总共有多少页
$sql_sum="select * from cj where cate like '%$cate%'";
$res_sum=mysql_query($sql_sum);
//求总长度
$zongchangdu=mysql_num_rows($res_sum);
//末页等于总长度除长度向上取整的数
$moye=ceil($zongchangdu/$changdu);
//xiayiyekaishideweizhi代表下一页开始的位置
$xiayiyekaishideweizhi= $shangyiye*$changdu;
$sql="select * from cj where cate like '%$cate%' limit $xiayiyekaishideweizhi,$changdu";
$res=mysql_query($sql);
$arr=array();
while($data=mysql_fetch_assoc($res)){
	$arr[]=$data;
}
?>
<form action="ajax.php" method="post">
		<input type="text" placeholder='请输入你要查找的' name="cate">
		<input type="submit" value="查找">
</form>
<table border="1">
	<tr>
		<td>ID</td>
		<td>标题</td>
		<td>点击数</td>
		<td>内容数</td>
	</tr>
	<?php foreach ($arr as $v) { ?>
		<tr>
			<td><?php echo $v['id']?></td>
			<td><?php echo $v['cate']?></td>
			<td><?php echo $v['click_num']?></td>
			<td><?php echo $v['comment_num']?></td>
		</tr>
	<?php } ?>
</table>
<a href="ajax.php?dangqianye=1">首页</a>

<?php if($dangqianye>1) { ?>
<a href="ajax.php?dangqianye=<?php echo $shangyiye?>">上一页</a>
<?php } ?>

<?php for($i=1;$i<=$moye;$i++) { ?>
<a href="ajax.php?dangqianye=<?php echo $i?>"><?php echo $i?></a>
<?php } ?>

<?php if($dangqianye<$moye) { ?>
<a href="ajax.php?dangqianye=<?php echo $xiayiye?>">下一页</a>
<?php } ?>

<a href="ajax.php?dangqianye=<?php echo $moye?>">末页</a>
