<?php
ini_set('max_execution_time', '0');
$vps=explode(',',$_POST['name']);
	//引入ssh文件，ping到可用IP，链接并写入数组
	include('ssh.php');
	//$array=[];
	//foreach($vps as $value){
		//$ssh=new FizzSSH($value);
			//if($ssh->connection){
				//$array[]=$ssh->connection;
			//}
	//}
	//unset($value);
	
	
	
	//定义密码
	//$round=mt_rand(100000,999999);
	//$na=count($vps);
	//if($na > 1) $hod=str_replace('.','',$vps[0]);
	//$hod=!empty($hod)?$hod:mt_rand(100000,999999);
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
		//if($nahuo > 1){
			foreach($vps as $value){
				$ssh=new FizzSSH($value);
				if($obj=$ssh->connection){
					foreach($arr as $val2){
						echo $value,'=>',$val2,'<br/>';
						$h=$ssh->cli($obj,$val2);
						if($h){
							var_dump($ssh->run());
							echo $value,$val2,'<hr/>';
							break(1);
						}
					}
				}
			}
		//}elseif($nahuo = 1){
			//if(!empty($array[0])){
				//foreach($arr as $val2){
					//$h=$ssh->cli($array[0],$val2);
					//if($h){
						//var_dump($ssh->run());
						//echo $val2;
						//break(1);
					//}
				//}
			//}	
		//}else{
			//echo '';
		//}