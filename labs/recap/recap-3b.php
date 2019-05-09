<?php
//basic syntax
// - Structure,
//Characters(Allowed)
//- symbols (chinese vs english)

//Error handling
// - Semantic error
// Emma hat kamau.
// -- heart hurt hat hut
//meaning..
// - Syntax..
// name = 'a name';
$name;

//rules - underscores,letter and numbers
$_name;
$name_;
$name1 = "Tim";
//int,string,double,float,bool,......

$name = "Joel Ng'ethe";

// - declaring /defining string
// '', ""
echo $name;

$name = 'Joel Nge\'the';
$salamu = "She said,\"Sasa\"";

//variable substitution
$salary = 1200;

$message =
'Kamau\'s salary is $salary';

//assignment 3
//..operations - join...
$message =
'kamau salary : '.$salary;

echo $message;

//splitting...
/**
name, id
Leah 2
Mercy 3
Andrew 4
Andrew 5
*/

//select name from users group_by name;
$string_name = "Leah,Mercy,Andrew,Abi";
//split..

//splitting a string by another string..
$pieces = explode(",",$string_name);

var_dump($pieces);

//structure..kinda...sort of..

//set of data...set

// compound type / data structure..(data and operations)

// Category - dimension
// One dimensional
// n dimensional
$array = [1,2,3,4];
$array = [[[2]],[[3]],[3],[4]];

// structure

// indexed - implicitly...clearly stated(opposite)
$indexed = ['21','50',32];
echo '<br/>';
echo '<br/>';
var_dump($indexed);
// associative - key-value

$associative = ['kamotho' => 21,'Wanjohi' => 50,'Otoyo' => 32];
$associative['kamotho'];
echo '<br/>';
var_dump($associative);



















 ?>
