<?php
namespace data;

class Konekta{
	public $conn;
	public $config;
	
	public function __construct(){
		$this->config = $this->getConfig();
		
		try{
			
			$this->conn = new \mysqli(
				$this->config->host,
				$this->config->uname,
				$this->config->pwd,
				$this->config->db,
				$this->config->port
			);
			
			//echo 'Connected successfully!';
			
		}catch(\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function getConfig(){
		//read the file
		$config_file = file_get_contents('config.json');
		//decode the json string
		$config_values = json_decode($config_file);
		
		//return the object
		return $config_values;
		
	}
	
}

//$test = new Konekta();