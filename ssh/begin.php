<?php
ini_set('max_execution_time', '0');
ini_set("display_errors" , "On");
error_reporting(E_ALL | E_STRICT);

$vps=explode(',',$_POST['name']);
	
	if(empty($vps[0])) exit;
		//foreach($vps as $value){
			//$number=mt_rand(1,10);
			$data=urlencode($vps[0]);
			$url = "server1.php?name=$data";
	　　//初始化
	　　$ch = curl_init();

	　　//设置选项，包括URL
	　　curl_setopt($ch, CURLOPT_URL, $url);
	　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	　　curl_setopt($ch, CURLOPT_HEADER, 0);

	　　//执行并获取HTML文档内容
	　　$output = curl_exec($ch);
			$output_array = json_decode($output,true);
	　　curl_close($ch);

	　　//打印获得的数据
	　　print_r($output_array);
		//}