<?php 
 ini_set('max_execution_time', '0');
    //$fp=fsockopen('localhost',8000,$errno,$errstr,5);
    //if(!$fp){
        //echo "$errstr ($errno)<br />\n";
    //}
    //fputs($fp,"GET /ssh_cli.php?param=1\r\n"); #请求的资源 URL 一定要写对
    //fclose($fp);

	$handle1 = popen('php E:\phpStudy\WWW\ssh\ssh_cli1.php', 'r'); 
	$handle2 = popen('php E:\phpStudy\WWW\ssh\ssh_cli2.php', 'r'); 
	$handle3 = popen('php E:\phpStudy\WWW\ssh\ssh_cli3.php', 'r'); 
	$handle4 = popen('php E:\phpStudy\WWW\ssh\ssh_cli4.php', 'r'); 
	$handle5 = popen('php E:\phpStudy\WWW\ssh\ssh_cli5.php', 'r'); 
	$handle6 = popen('php E:\phpStudy\WWW\ssh\ssh_cli6.php', 'r'); 
	$handle7 = popen('php E:\phpStudy\WWW\ssh\ssh_cli7.php', 'r'); 
	$handle8 = popen('php E:\phpStudy\WWW\ssh\ssh_cli8.php', 'r'); 
	$handle9 = popen('php E:\phpStudy\WWW\ssh\ssh_cli9.php', 'r'); 
	$handle10 = popen('php E:\phpStudy\WWW\ssh\ssh_cli10.php', 'r'); 
		 
	//echo "'$handle1'; " . gettype($handle1) . "\n"; 
	//echo "'$handle2'; " . gettype($handle2) . "\n"; 
	//echo "'$handle3'; " . gettype($handle3) . "\n"; 
	//echo "'$handle4'; " . gettype($handle4) . "\n"; 
	//echo "'$handle5'; " . gettype($handle5) . "\n"; 
	//echo "'$handle6'; " . gettype($handle6) . "\n"; 
	//echo "'$handle7'; " . gettype($handle7) . "\n"; 
	//echo "'$handle8'; " . gettype($handle8) . "\n"; 
	//echo "'$handle9'; " . gettype($handle9) . "\n"; 
	//echo "'$handle10'; " . gettype($handle10) . "\n"; 
		  
	//sleep(20); 
	while(!feof($handle1) || !feof($handle2) || !feof($handle3) || !feof($handle4) || !feof($handle5) ){ 
	$array[] = fgets($handle1); 
	$array[] = fgets($handle2); 
	$array[] = fgets($handle3); 
	$array[] = fgets($handle4); 
	$array[] = fgets($handle5); 
	$array[] = fgets($handle6); 
	$array[] = fgets($handle7); 
	$array[] = fgets($handle8); 
	$array[] = fgets($handle9); 
	$array[] = fgets($handle10); 
	} 
	 var_dump($array);
	 
	pclose($handle1); 
	pclose($handle2); 
	pclose($handle3); 
	pclose($handle4); 
	pclose($handle5); 
	pclose($handle6); 
	pclose($handle7); 
	pclose($handle8); 
	pclose($handle9); 
	pclose($handle10); 