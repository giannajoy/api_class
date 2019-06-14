<?php
namespace data;

require_once 'Konekta.php';

use data\Konekta;

class DataTry extends Konekta{

  public function __construct(){
    parent::__construct();
  }

  public function Save($user){
    $name = $this->conn->
            real_escape_string($user['name']);

    $email = $this->conn->
            real_escape_string($user['email']);
    $gender = $this->conn->
            real_escape_string($user['gender']);
    $role_name = $this->conn->
            real_escape_string($user['role']);
    //get the role_id from the db given a name
    $sql_role = "SELECT id FROM role
    WHERE name='$role_name'";
    $stmt = $this->conn->query($sql_role);
    $role_id = $stmt->fetch_assoc()['id'];
    //write a query to insert data to the users table
    $sql_user = "INSERT into
    user(name,email,gender,role_id)
    VALUES('$name','$email',$gender,$role_id)";

    $exec = $this->conn->query($sql_user);
    if($exec === TRUE):
      echo 'Imeingia! :) <br/>';
    else:
      echo 'Imekataa :( </br/>';
    endif;
    //execute

    //return a positive if all goes well
  }

  public function GetAll(){
    $user = [];

    $sql = 'SELECT * FROM user';
    $stmt = $this->conn->query($sql);
    while($result = $stmt->fetch_assoc())
    {
      $user[] = $result;
    }
    var_dump($user);
  }

}
$bond = new DataTry();
$user1 = [
  'name'=> 'Wesula',
  'email'=>'wesula@deloitte.co.ke',
  'gender' => 0,
  'role'=>'admin'
];
//$bond->Save($user1);
$user2 = [
  'name'=> 'Deepali',
  'email'=>'deepali@oracle.com',
  'gender' => 1,
  'role'=>'admin'
];
$user3 = [
  'name'=> 'Jason',
  'email'=>'jason@upwork.com',
  'gender' => 0,
  'role'=>'admin'
];
//$bond->Save($user2);
//$bond->Save($user3);

$bond->GetAll();
?>
