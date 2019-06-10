<?php

class kontorola{
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

public function list_users($fields,$p_array = []){
$array = [];
$users_array = $this->users;

if(count($p_array) > 0)
	$users_array = $p_array;

$len = count($fields);
for($i=0;$i < $len;$i++){
	$f = $fields[$i];
	if($i == 0 ):
		$array[] = array_column($users_array,$f);
	else:
		$new_field =  array_column($users_array,$f);
		for($j = 0; $j < count($array[0]);$j++){
			$elem = $array[0][$j];
			$elem = $elem . ','.$new_field[$j];
			$array[0][$j] = $elem;
		}
	endif;

	return $array;
}

}
public function filter($param,$value,$count = false,$list_users_p){
$array = [];
	foreach($this->users as $u){
		if($count == false){
			if($u[$param] == $value)
				$array[] = $u;
		}else{
			$arr = explode(' ',$u[$param]);
			if(count($arr) == $value)
				$array[] = $u;
		}
	}
	if(count($list_users_p) > 0)
		$array = $this->list_users($list_users_p,$array);
	return $array;
}


}

class admin{

}

$usr = new kontorola();
//users and names
//this prints out the first arg only..fix it.. :)
$details1 = $usr->list_users(['id','name']);
var_dump($details1);

//female users
$details2 = $usr->filter('gender',1,false,['name']);
var_dump($details2);

//users with 2 names
$details3 = $usr->filter('name',2,true,[]);
var_dump($details3);
?>
