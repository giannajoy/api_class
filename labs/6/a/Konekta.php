<?php
namespace data;
class Konekta{
	public $conn;
	public $config;

	public function __construct(){

		$this->config =
				$this->getConfig();

		try{
			$this->conn =
				new \mysqli(
				$this->config->host,
				$this->config->username,
				$this->config->password,
				$this->config->db,
				$this->config->port
				);
			//echo 'Connected Successfully!';

		}catch(\Exception $e){
			echo $e->getMessage();
		}

	}

	public function getConfig(){
		$config_file =
			file_get_contents('config.json');

		$config_values =
			json_decode($config_file);

		return $config_values;
	}
}

//$nu = new Konekta();
?>
