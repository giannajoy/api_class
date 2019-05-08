<?php
//syntax of a language
// similar to language -- how to correctly write

//semantics - meaning
//e.g of syntax -- comments,how to define variables etc.
//e.g of semantics

$integr = 2;
foreach($integr as $i):
  //you cannot loop an integr
endforeach;

//type juggling
$a = 1;
$b = "2";

echo $a + $b;
//remember 404 (not found) means that the server cannot find
// the file requested..

//For normal php..check that the file is in the specified location
//For laravel..check that the route exists.

//Aha! - the file is in the folder named recap


//Notice how php adds an integer and a string!
//This is called type juggling.. PHP will automatically cast(convert one data type to another)
//depending on the operation.
echo "<p></p>";
echo $a.$b; //in this case PHP converts the integer to a string

//Play around some more with type juggling :)

//Check out all the different operators and work on the exercises in the Recap-1 pdf.

//See...

//Arithmetic operators (Za mao..)
//Assignment operators (They assigns the result of an expression to a variable.)
//Comparison operators (They take two operands and compare them,
     //returning the result of the comparison usually as a Boolean, that is, true or false .)
//Logical operators(apply some logical operation e.g and or etc)
//Increment and decrement operators (-- ,++)

//Remember the difference between
$a++;
++$a;

//and

$b++;
++$b;

//Operator precedence

//Hooray!!

//Once you are done with that..we can move on now..

//Let's talk abit about php variables
//in PHP .. we declare variables using the $ sign so..
$a;$_a;$a_; //are all variables

//however, note that similar to any programming language..
//there are some syntax rules.. how you name variables, and there are certain reserved words
//for example

//What is illegal in a variable name?
//Are php variables case sensitive?
//test this out..

//Let's talk about arrays.

//what is an array?
//It is a  data structure,..let's just say a simple data structure
// It can store multiple data types ie, all the primitive data types and even more complex ones
//Oh, do you remember the primitive data types??

//See....
//We see that more than it being a data structure.. (since php has operations specific to arrays)
//It is also a compound type

//defining arrays
$array_one = ['one','two']; //an array of strings

//if you want to print arrays in php, you use print_r or var_dump
//what's the difference between the two..

//observe...

print_r($array_one);

echo '<br/>';

var_dump($array_one);

//seems like one gives more information.. find out more on
// the difference between print_r and var_dump

//arrays in php can be of difference types (mixed arrays)
$array_two = ['a',1];

print_r($array_two);
var_dump($array_two);

//you can also define arrays using the array keyword

$array_three = array('a','v');

echo "<br/><br/>";
var_dump($array_three);

//types of arrays (by structure)
//1. Indexed arrays
//2. Associative arrays

//An indexed array has its elements defined by indexes
// By index, we mean 0,1,2,3,4...n
// integer indexes
//Another way of defining it, is that in indexed arrays,
// element positions are defined by integer indexes

//for example;
echo "<br/><br/>";
var_dump($array_three);

//in associative arrays however, elements in an array have named indexes (string)

$array_four_associative = array('one' => 'element_one','two' => 'element_two');
echo "<br/><br/>";
var_dump($array_four_associative);

//The second grouping of array type is based on dimension
//The term dimension should not scare you..

//usually what we mean is, the depth of the array
//or the nesting of elements...

//let us demonstrate

//One dimensional array
echo "<br/><br/>";
var_dump($array_three);

//array_three is one dimensional, that is, all elements are in one "row"
//i'm using the term "row" loosely.

//see..

//A 2-d array on the other hand would have a depth of 2...
//An array in another array
//for example

$my_2d_array = [
  'level_one' =>
      ['level_two' => 1]
];

echo "<br/><br/>";
var_dump($my_2d_array);

//notice that the array that has the element, level_two is
//within another array(specifically within the element named
//level_one)

//3-dimensional array
//let's add another level
$my_3d_array = [
  'level_one' =>
      ['level_two' =>
      ['level_three' => 3]]
];

echo "<br/><br/>";
var_dump($my_3d_array);

//I hope you get the idea..
//create multidimensional indexed arrays..
//remember in indexed arrays, we never define the indexes..PHP does that for us

//e.g..
$i_1d_array = [1,3];
$i_2d_array = [[1,2],[3],4];//we would like to access 1...
$i_3d_array = [[[1]]];

//Do you think this is useful?? hihihi...

//Let me give you a use case..

//In the natural world, there are things that exist in a certain structure..
// that arrays try to mimick..remember programming is essentially
// an attempt to model reality in the attempt to solve problems..
//If you model well, then whatever solution you get
//will be useful in the real world

//Imagine now, the world.. which has continents..
//continets have countries..countries have provinces/states.. states have districts..etc.

//This is something(an organization -- I mean structure)
//that exists in real life and arrays basically try to model that..

//Let's move on now.., so how do we access elements in an array?

//Well it depends on
// 1. Dimension of the arrays
// 2. The type(associative or indexed)

//Let's start with one-dimensional arrays
//Essentially, we always access elements in an array based on their index

//for example
//remember array_two?
echo "<br/><br/>";
var_dump($array_two);

//to access element one, we use index 0
//for example..

echo $array_two[0];//gives us the first element

//Aha.. so remember, array indexes start from zero so..
//an array that contains two elements has the indexes
//0 and 1

echo $array_two[1];//the second element

//For associative arrays, we use the named indexes..

//remember the asscciative array we created earlier

echo "<Br/><br/>";
var_dump($array_four_associative);

//to access the element with key(the named indexes are usually refered to as keys)

//key

//to access the element with key one, we do the following;
echo "<br/>";
echo $array_four_associative['one'];
//there was another way..let's see whether it works..
echo '<br/>';
//echo $array_four_associative->one;//this does not work :)
//can we use indexes in associative arrays..like
//echo $array_four_associative[0];//Nop! associative arrays use named indexes or keys..

//Try accessing elements of the other one dimensional
//arrays we created..

//Let's see how to acccess elements in 2-d and 3-d arrays

echo '<br/><br/>';
var_dump($i_2d_array);
//let's say we would like to access 1..
//do you see it..
//See...
//Notice that one is an element in an array that is within Another
//array.. so we need to access the first array, then the element of the second array...
//Think of it as rooms.. the first array is room1..to get there ,
//you need one index or key.. the inside room 1, there is another room( room 2)
//you also need to open that room but remember you are in room1 already..
//and so on and so forth..
//let's see how it works..

$access_room_1 = $i_2d_array[0];
//we are now looking at the first element in "room_1"
//oops, I had added a zero to the variable name hence the null..
echo '<br/>';
var_dump($access_room_1);

//Access room_2//note, the first element in room_1 is an array, now we need to open it..

echo '<br/>';
echo $access_room_1[0];
//hooray..now we have accessed 1...

//Now to do this directly without creating another variable..

//we do the following..
$i_2d_array[0][0];
//what this means is, we access the first element in room_1(array_1) and then the first element in room_2(array_2) which happens to be our 1

//let's print this out..

echo '<br/>';
echo $i_2d_array[0][0];
//Yeah!!

//Access, all the other element now..

//Also, check out cool stuff (operations) you can run on arrays..

//See...

//Bye!
 ?>
