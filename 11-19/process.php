<?php
include 'pdo.php';
$conn = new ConnClass();
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);

// 搜索
if($_GET['flag']=='query'){
	// 查询符合条件的数据，将数据返回到ajax请求的success回调函数中
	// 接收ajax传递的参数
	$keyword=$_GET['keyword'];
	if($mem->get($keyword)){
		// MC中有数据
		$data=$mem->get($keyword);
	}else{
		$sql="select id,name,sell_price from iwebshop_goods where name like '%$keyword%'";
		$data=$conn->selectAll($sql);
		$mem->set($keyword,$data,0,0);		// 从数据库中读取出数据后，马上存入MC中
	}
	// 向前台ajax返回json格式的数据
	echo json_encode($data);		// 使用json_encode函数将PHP数组转换成json格式的字符串
	//var_dump($data);
}

// 批量静态化
if($_GET['flag']=='batch'){
	$str=$_GET['str'];		// 复选框的值  1,3,5,7，
	$str=rtrim($str,',');	// 去掉字符串末尾的“，”

	$sql="select id,name,sell_price from iwebshop_goods where id in ($str)";
	$data=$conn->selectAll($sql);		// $data要在model.html模板文件中使用，需要将此行代码放在include之前


	// 下面写指静态化功能————循环$data，将每个数组元素（表中的行）都静态化
	foreach($data as $key=>$value){
		ob_start();	// 开启缓冲区
		include 'model.html';	// 包含模板文件
		$str=ob_get_contents();		// 获取缓冲区中的内容
		$filename='html/goods_'.$value['id'].'.html';	// html/goods_5.html
		file_put_contents($filename, $str);
		ob_end_clean();
	}

	// 向前台ajax返回数据，以便前台判断是否执行完毕
	echo 1;	
}

// 全部静态化
if($_GET['flag']=='all'){
	// 全部静态化
	$sql="select id,name,sell_price from iwebshop_goods";	// 查询表中全部数据
	$data=$conn->selectAll($sql);		// $data要在model.html模板文件中使用，需要将此行代码放在include之前
	// 向前台ajax返回json格式的数据
	// echo json_encode($data);	

	// 下面写指静态化功能————循环$data，将每个数组元素（表中的行）都静态化
	foreach($data as $key=>$value){
		ob_start();	// 开启缓冲区
		include 'model.html';	// 包含模板文件
		$str=ob_get_contents();		// 获取缓冲区中的内容
		$filename='html/goods_'.$value['id'].'.html';	// html/goods_5.html
		file_put_contents($filename, $str);
		ob_end_clean();
	}

	// 向前台ajax返回数据，以便前台判断是否执行完毕
	echo 1;	
}

// 判断是否存在静态文件且文件未过期，如果是则直接返回静态文件，如果否则生成静态文件
if($_GET['flag']=='static'){
	$id=$_GET['id'];
	$filename='html/goods_'.$id.'.html';
	if(is_file($filename) && time()-filemtime($filename)<50){
	// 文件存在且未过期
		echo 'jingtai';
		include $filename;
	}else{
		echo 'dongtai';
		// 不使用预处理功能
		$sql="select id,name,sell_price from iwebshop_goods where id='$id'";
		$data=$conn->selectOne($sql);	
		$value['name']=$data['name'];
		$value['sell_price']=$data['sell_price'];
		// 文件不存在  或 文件存在但文件过期了，则需要重新生成静态文件
		ob_start();	// 开启缓冲区
		include 'model.html';	// 包含模板文件
		$str=ob_get_contents();		// 获取缓冲区中的内容
		file_put_contents($filename, $str);
		ob_end_flush();
	}
}


