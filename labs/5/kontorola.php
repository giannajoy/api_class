<?php

class kontorola{
public $string = 'test';
public static $string2 = 'test2';

public $users = [
["id"=>1,"name"=>"Mwega Rafiki","email" => "mwega@example.com","admin"=>1,"gender"=>0],
["id"=>2,"name"=>"Martha","email" => "martha@example.com","admin"=>0,"gender"=>1],
["id"=>3,"name"=>"Mary","email" => "mary@example.com","admin"=>0,"gender"=>1],
["id"=>4,"name"=>"Lazarus","email" => "laz@example.com","admin"=>0,"gender"=>0],
["id"=>5,"name"=>"Lasaraleen","email" => "las@example.com","admin"=>0,"gender"=>1],
["id"=>6,"name"=>"Shasta","email" => "shasta@example.com","admin"=>1,"gender"=>0],
["id"=>7,"name"=>"Lucy","email" => "lucy@example.com","admin"=>1,"gender"=>1],
["id"=>8,"name"=>"Tat Hermit","email" => "hermit@example.com","admin"=>0,"gender"=>0],
["id"=>9,"name"=>"Bree","email" => "bree@example.com","admin"=>0,"gender"=>0],
["id"=>10,"name"=>"Kin Loon","email" => "loon@example.com","admin"=>1,"gender"=>0],
["id"=>11,"name"=>"Hwin","email" => "hwin@example.com","admin"=>0,"gender"=>1]
];

  public function getAll(){
    $users = $this->users;
    return $users;
  }
}
//inheritance - 2 classess
//single-iheritance
//traits...
class admin extends kontorola{
  use roles,DBConnect;

  public function update(){
    //make our connection???
    $this->connect();
  }

  public function adminUsers(){
    //access the users
    //variable then we filter
    $obj1 = new kontorola();
    $users = $obj1->getAll();
    $adminUsers = [];

    foreach($users as $u){
      if($u['admin'] == '1')
        $adminUsers[] = $u;
    }
    return $adminUsers;
  }

}
//creating objects..an instance of a class
$obj1 = new kontorola();
$allUsers = $obj1->getAll();
$admins = new admin();
$adminOnly = $admins->adminUsers();
//var_dump($allUsers);echo '<br/><br/>';
// var_dump($adminOnly);
echo $admins->connect();


trait roles{
  public function isAdmin($user){
    return ($user['admin'] == '1')
      ? true : false;
  }
}

trait DBConnect{
  public function connect(){
    return 'connected!';
  }
}

?>
