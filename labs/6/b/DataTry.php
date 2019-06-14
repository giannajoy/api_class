<?php
namespace data;

//include file with class
require_once 'Konekta.php';

class DataTry extends Konekta{

	public function __construct(){
		parent::__construct();
	}
	//get all users
	public function GetAll(){
		$stmt = $this->conn->query('SELECT * FROM user');
		$users = [];
		while($result = $stmt->fetch_assoc()){
			$users[] = $result;
		}
		return $users;
	}
	//get all users with their roles
	public function GetAllWithRoles(){
		$stmt = $this->conn->query('SELECT * FROM user INNER JOIN role ON role.id=user.role_id');
		$users = [];
		while($result = $stmt->fetch_assoc()){
			$users[] = $result;
		}
		return $users;
	}
	//get users of a certain role
	public function GetUserByRole($role){
		$stmt = $this->conn->query("SELECT * FROM user INNER JOIN role ON role.id=user.role_id WHERE role.name='$role'");
		$users = [];
		while($result = $stmt->fetch_assoc()){
			$users[] = $result;
		}
		return $users;
	}
	//generic select
	public function GetUserBy($field,$value){


	}
	//insert a new user
	public function Save($user){
		/*
		* ['user' =>          	['name','email','gender']
		*  'role' => ['admin']
		* ]
		*/
		//get the role_id from the roles table
		$role_name = $user['role'];
		$sql0 = "SELECT id FROM role
		WHERE name = '$role_name'";
		//execute and get id
		$stmt = $this->conn->query($sql0);
		$res = $stmt->fetch_assoc();
		$role_id = $res['id'];

		$name = $user['user'][0];
		$email = $user['user'][1];
		$gender = $user['user'][2];
		$sql1 = "INSERT INTO user(name,email,role_id,gender)
		VALUES('$name','$email',$role_id,$gender)";

		//execute and return success if ok
		$qr = $this->conn->query($sql1);
		if($qr === TRUE){
			echo 'Inserted';
		}else{
			echo 'Imegonga ukuta!';
		}
	}
	//update existing user
	public function Update($user){

	}
	//remove a user
	public function Delete($user_id){

	}
}

$datar = new DataTry();
$data1 = [
'user' => ['Systim Tomcat','systim.tomcat@strath.edu',1],
'role' => 'admin'
];
$data2 = [
'user' => ['Mary Jerry','mary.jerry@strath.edu',0],
'role' => 'user'
];
$data3 = [
'user' => ['Gitau Omondi','Gitau.Omondi@strath.edu',1],
'role' => 'user'
];
$data4 = [
'user' => ['John Andrew','John.Andrew@strath.edu',1],
'role' => 'admin'
];

//invoke the save method
//$datar->Save($data1);
//$datar->Save($data2);
//$datar->Save($data3);
//$datar->Save($data4);


$users = $datar->GetAll();
var_dump($users);
$user_roles = $datar->GetAllWithRoles();
var_dump($user_roles);
$user_users = $datar->GetUserByRole('user');
var_dump($user_users);




?>
