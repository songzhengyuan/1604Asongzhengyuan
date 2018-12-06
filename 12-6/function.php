<?php
function curlRequest($url)
{
	// 初始化一个 cURL 对象  
	$curl = curl_init();  
	// 设置你需要抓取的URL  
	curl_setopt($curl, CURLOPT_URL, $url);  
	// 设置header  
	curl_setopt($curl, CURLOPT_HEADER, 0);  
	// 设置cURL 参数，要求结果(1cloud_con保存到字符串中)还是(0输出到屏幕上)。  
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
	// 运行cURL，请求网页  
	$html = curl_exec($curl);  
	// 关闭URL请求 
	curl_close($curl);
	return $html;
}