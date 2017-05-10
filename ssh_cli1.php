<?php
//set_time_limit(300);
ini_set('max_execution_time', '0');
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//header('Content-Type:text/html;charset=utf-8 ');

	
/** 
 * 使用PHP检测能否ping通IP或域名 
 * @param type $address 
 * @return boolean 
 */  
function pingAddress($address) {  
	if($rosue=fopen('sus.txt','a+')){
		$string=fgets($rosue);
		if(strlen($string)>5){
			$string=rtrim($string,',');
			$array=explode(',',$string);
			if(in_array($address,$array)) return false;
		}
	}
	
	$status = -1;  
	if (strcasecmp(PHP_OS, 'WINNT') === 0) {  
		// Windows 服务器下  
		$pingresult = exec("ping -n 1 {$address}", $outcome, $status);  
	} elseif (strcasecmp(PHP_OS, 'Linux') === 0) {  
		// Linux 服务器下  
		$pingresult = exec("ping -c 1 {$address}", $outcome, $status);  
	}  
	if (0 == $status) {  
		$status = true;  
	} else {  
		$status = false;  
	}
	unset($string);
	fclose($rosue);
	return $status;  
}


//引入ssh文件，ping到可用IP，链接并写入字符窜
include('ssh.php');
	$str='';
	for($j=1;$j<=10;$j++){
		$num1=mt_rand(1,255);
		$num2=mt_rand(1,255);
		$num3=mt_rand(1,255);
		$num4=mt_rand(1,255);
		$url=$num1.'.'.$num2.'.'.$num3.'.'.$num4;
//			$url='192.168.1.43';
		$check=pingAddress($url);
		if($check){
			if($rou1=fopen('sus.txt','a+')){
				$data=$url.',';
				fwrite($rou1,$data);
				fclose($rou1);
			}
			$ssh=new FizzSSH($url);
			if($ssh->connection){
				if($rou2=fopen('log.txt','a+')){
					$data=$url.',';
					fwrite($rou2,$data);
					fclose($rou2);
				}
	
//				$array[$url]=$ssh->connection;
//				$str.=$url.',';
			}
		}else{
			if($rou3=fopen('error.txt','a+')){
				$data=$url.',';
				fwrite($rou3,$data);
				fclose($rou3);
			}
		}
	}
	if($rosue=fopen('log.txt','r')){
		$string=fgets($rosue);
		echo $string;
	}