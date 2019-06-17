<?php


class Konekta{
	public $conn;
	public $config;
	public function __construct()
	{
		$this->config = $this->getConfig();
		try {
			$this->conn = new mysqli(
				$this->config->host,
				$this->config->username,
				$this->config->password,
				$this->config->db
				);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function getConfig()
	{
		$config_file= file_get_contents('config.json');
		$config_values= json_decode($config_file);
		return $config_values;
	}

}
//$nu=new Konekta();


class DataTry extends Konekta {
		//constructor
	public function __construct(){
		parent::__construct();
	}
	public function Save($user){
		//var_dump($user);
		//get role id [DB]
		$name = $user['name'];
		$email = $user['email'];
		$gender = $user['gender'];
		$role_name = $user['role_name'];
		//query
		$sql_role = "SELECT id FROM role
		WHERE name='$role_name'";
		//execute
		$stmt = $this->conn->query($sql_role);
		//getResult
		$res = $stmt->fetch_assoc();
		$role_id = $res['id'];
		//save user details[DB]
		$sql_user = "INSERT INTO user
		(name,gender,role_id,email)
		VALUES('$name',$gender,$role_id,'$email')";

		$stmt2 = $this->conn->query($sql_user);

		if($stmt2 === TRUE):
			echo 'Ok :)';
		else:
			echo 'Uuwii :(';
		endif;


		//return success
	}
	public function GetAll(){
		$sql = "SELECT * from user";
		$stmt = $this->conn->query($sql);

		$users = [];
		while ( $result = $stmt->fetch_assoc()){
			$users[] = $result;
		}
		return $users;
	}
}
	$datar= new DataTry();
	$user_details=[
		'name'=>'Imelda',
		'email'=>'imelda@ibm.com',
		'gender'=>'1',
		'role_name'=>'admin'
	];
	$datar->Save($user_details);

 ?>
