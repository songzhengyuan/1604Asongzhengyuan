<?php
// 列表页，从表中读取数据，展示在table中

include 'pdo.php';	// 引入pdo.php文件

$conn=new ConnClass();		// 实例化类，$conn是ConnClass类的对象，使用$conn可以调用ConnClass类中的各个方法
$sql="select id,name,sell_price from iwebshop_goods limit 20";		
$data=$conn->selectAll($sql);		// 调用ConnClass类的selectAll方法，查询数据，查询到的数据保存到$data数组中（二维数组）

// echo '<pre>';
// print_r($data);
header("content-type:text/html;charset=utf-8");
mysql_connect('127.0.0.1','root','root');	
mysql_select_db("iwebshop");
mysql_query("set names utf8");
$dangqianye=isset($_GET['dangqianye'])?$_GET['dangqianye']:1;
$changdu=5;
$xiayiye=$dangqianye+1;
$shangyiye=$dangqianye-1;	
//先看看总长度然后在进行向上取整求得总共有多少页
$sql_sum="select * from iwebshop_goods";
$res_sum=mysql_query($sql_sum);
//qiu总长度
$zongchangdu=mysql_num_rows($res_sum);
//末页等于总长度除长度向上取整的数
$moye=ceil($zongchangdu/$changdu);
//xiayiyekaishideweizhi代表下一页开始的位置
$xiayiyekaishideweizhi= $shangyiye*$changdu;
$sql="select * from iwebshop_goods limit $xiayiyekaishideweizhi,$changdu";
$res=mysql_query($sql);
$arr=array();
// while($data=mysql_fetch_assoc($res)){
// 	$arr[]=$data;
// }

?>

<html>
<head>
	<title></title>
	<!-- 引用jQuery，使用其中的ajax功能 -->
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
</head>
<body>
	<h2>商品列表</h2>
	<div>
		<input type='text' name='keyword' id='keyword'>
		<input type='button' value='搜索' id='search'>
		<input type='button' value='批量静态化' id='batchStatic'>
		<input type='button' value='全部静态化' id='allStatic'>
	</div>

	<table border='1'>
		<thead>
		<tr>
			<th><input type='checkbox' id='revert'></th>	<!-- 全选/反选 复选框-->
			<th>序号</th>
			<th>商品名称</th>
			<th>售价</th>
			<th>操作</th>
		</tr>
		</thead>
		<!-- 循环产生表格主体数据 -->
		<tbody>
		<?php foreach($data as $key=>$value):?>
			<tr>
				<td><input type='checkbox' class='chk1' data-id="<?=$value['id']?>"></td>	<!-- 每个列表前的复选框 -->
				<td><?=$key+1?></td>
				<td><a href="process.php?flag=static&id=<?=$value['id']?>"><?=$value['name'];?></a></td>
				<td><?=$value['sell_price'];?></td>
				<td><a href=''>编辑</a> | <a href=''>删除</a> | <a href=''>静态化</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>

<script>
	// $(function(){})是页面加载事件，当页面加载完毕后，这里面的代码会执行
	$(function(){
		// 当单击搜索按钮时，则.....，我们要写搜索按钮的单击事件
		$('#search').click(function(){
			var keyword=$('#keyword').val();		// 获取搜索文本框中的值
			// 发送ajax请求，请求后台的php程序，根据搜索条件查询表中数据
			$.ajax({
				// 请求的后台地址
				url:'process.php?flag=query',
				// 请求方式 get 还是 post
				type:'get',
				// 返回值类型 json
				dataType:'json',
				// 向后台PHP传递的数据，是不是搜索的关键词
				data:{'keyword':keyword},
				// 当后台处理完毕后，在success中接收PHP返回的数据，变量data就是后台返回的查询结果
				success:function(data){
					var str='';
					
					// 使用$.each循环（遍历）数组，构造字符串
					$.each(data,function(i,v){
						str+="<tr><td><input type='checkbox' class='chk1' data-id="+v['id']+"></td>";
						str+="<td>"+(i+1)+"</td><td>"+v['name']+"</td><td>"+v['sell_price']+"</td>";
						str+="<td><a href=''>编辑</a> | <a href=''>删除</a> | <a href=''>静态化</a></td></tr>";
					});
					// 将str填充到<tbody>元素中
					$('tbody').html(str);
				}
			});
		});

		// 全选/反选 复选框的单击事件
		$('#revert').click(function(){
			
			// 反选
			$(".chk1").each(function () {
            	this.checked = !this.checked;
         	})
		});

		// 批量静态化，将选择的多个列表静态化
		$('#batchStatic').on('click',function(){
			var str='';
			// 获取被选择文本框的id
			// 遍历所有chk1
			$('.chk1').each(function(){
				// 如果某个复选框处于选中状态
				if(this.checked){
					str+=$(this).attr('data-id')+',';	// 获取选中复选框的data-id属性的值（id值），并用“，”连接
				}
			});
			// 发送ajax请求到后台
			$.ajax({
				url:'process.php?flag=batch',
				type:'get',
				dataType:'json',
				data:{'str':str},
				success:function(data){
					if(data){
						alert('批量静态化成功!')
					}
				}
			});
		});

		// 全部静态化，将选择的多个列表静态化
		$('#allStatic').on('click',function(){			
			// 发送ajax请求到后台
			$.ajax({
				url:'process.php?flag=all',
				type:'get',
				dataType:'json',
				success:function(data){
					if(data){
						alert('全部静态化成功!')
					}
				}
			});
		});		
	});
</script>
<a href="index.php?dangqianye=1">首页</a>

<?php if($dangqianye>1) { ?>
<a href="index.php?dangqianye=<?php echo $shangyiye?>">上一页</a>
<?php } ?>

<?php for($i=1;$i<=$moye;$i++) { ?>
<a href="index.php?dangqianye=<?php echo $i?>"><?php echo $i?></a>
<?php } ?>

<?php if($dangqianye<$moye) { ?>
<a href="index.php?dangqianye=<?php echo $xiayiye?>">下一页</a>
<?php } ?>

<a href="index.php?dangqianye=<?php echo $moye?>">末页</a>