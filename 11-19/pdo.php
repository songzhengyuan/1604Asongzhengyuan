<?php

//echo  phpinfo();die;
header("content-type:text/html;charset=utf-8"); 
// echo phpinfo();die;
// 在pdo.php文件中实现连接数据库服务器、增删改查功能
//new ConnClass;		// 只有new了这个类，才能执行构造函数，class就是个语法结构，不new的话，他自己不执行
class ConnClass{
	private $pdo;	// 类属性，可以在所有方法中使用
	
	// 1 连接数据库服务器，构造方法，在new此类的时候会自动调用此方法，在此方法中做一些初始化工作
	public function __construct(){
		$this->pdo=new PDO('mysql:host=127.0.0.1;dbname=iwebshop','root','root');
		//var_dump($this->pdo);
	}

	// 2 添加数据
	public function insert($sql){
		$this->pdo->exec($sql);
	}

	// 3 删除数据
	public function delete($sql){
		$this->pdo->exec($sql);
	}

	// 4 修改数据
	public function update($sql){
		$this->pdo->exec($sql);
	}

	// 5 查询单条数据，返回一维数组
	public function selectOne($sql){
		$data=$this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
		return $data;
	}	

	// 6 查询多条数据，返回二维数组
	public function selectAll($sql){
		$data=$this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		return $data;		// 返回数据
	}
}