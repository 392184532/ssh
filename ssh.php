<?php

    class FizzSSH
	{
		public $connection='';
		//private $config = [
			//'host'      => '',
			//'port'      => '',
			//'username'  => '',
			//'password'  => ''
		//];
		
		public function __construct($host,$port='22'){
			//$this->config['host']=$host;
			//$this->config['port']=$port;
			//$this->config['username']=$username;
			//$this->config['password']=$password;
			
			// 连接服务器
			@$this->connection=ssh2_connect($host, $port);
		}
		
		public function cli($connection,$password,$username='root'){
			// 身份验证
			//if($this->connection){
				@$bool=ssh2_auth_password($connection, $username, $password);
				return $bool;
			//}else{
				//return false;
			//}
			
		}

		/**
		 * 执行操作
		 * @param string $cmd 执行的命令
		 * @param array $config 连接配置文件, 具体参考上边的 $config 公共变量
		 * @return mixed
		 */
		public function run($cmd='ls')
		{
			
			//if (empty($config)) {
				//$config = $this->config;
			//}
			
			// 执行命令
			@$ret=ssh2_exec($this->connection, $cmd);

			// 获取结果
			@stream_set_blocking($ret, true);

			// 返回结果
			@$data=stream_get_contents($ret);
			$data=empty($data)?'':$data;
			return $data;
		}
	}
	
	//$ssh=new FizzSSH('192.168.207.129','123456');
	//$ssh->cli();
	//$rou=$ssh->run('ls');
	//var_dump($rou);