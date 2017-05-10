<?php
	$handle1 = popen('php E:\phpStudy\WWW\ssh\a.php', 'r'); 
	$obj = fgets($handle1);
	
	session_save_path('E:/phpStudy/WWW/ssh');
	//session_start();
	//var_dump($_SESSION);
	var_dump($obj);
	 
	pclose($handle1); 