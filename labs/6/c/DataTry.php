<?php
namespace data;

//include file with class
require_once 'Konekta.php';

class DataTry extends Konekta{
	//constructor
	public function __construct(){

	}
	public function Save($user){
		var_dump($user);
		//get the role_id [DB]

		//save user details[DB]

		//return success
	}

	public function GetAll(){

	}

}
$datar = new DataTry();
$user_details = [
	'name' => 'Imelda',
	'email' => 'imelda@ibm.com',
	'gender' => 1,
	'role_name' => 'admin'
];
$datar->Save($user_details);

?>
