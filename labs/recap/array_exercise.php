<?php
#Question 1
//please do not copy paste code..
//I encourage you to type... when you do so
//You are practising..and becoming better :)

$a = array(0,1,2,3,4);//extract the value 3
//first, this is an indexed array..
//indexes run from 0 to n(the last element)
//therefore, value 3 is the fourth element in the Array
// its position is 3 i.e. 0-1-2-3
//so to access it...we use index 3
//let me format the output well..
echo "<p> Question 1 {{Ans --> a[3]}} : ".$a[3]."</p>";
//take note of the dot operator
//it is used to join string
//Note that if you use it with compound types(like an array)
//it gives an error..

//for example..
//echo $a; //what error do you get from this :)

#Question 2
$a2 = array("zero" => 0,"one" => 1,"two" => 2,"three" => 3,"four" => 4);
//extract the value 3
//remember this is an associative array
//Data is in the form of keys and value
//key-value pairs
//e.g zero=>0, one=>1 etc...

//We access elements in such an array using
//the key..
//so...
echo "<p> Question 2 {{Ans --> a2['three']}} : ".$a2['three']."</p>";
//there seems to be an error...

//let me enable error reporting....so that you can see the issue..

//to do this, we need to edit php.ini..

//let us find out which php.ini is loaded..

//to do this, I usually create a test file
//and then use the function phpinfo() which displays
//all information about the current php version...

//now it appears i'm accessing an undefined index..
//i should be using $a2 which is my associative array..

#Question 3
//room1[]
$a3 = array( //room 1
  array( //position 0
    0,
    1
  ),
  array(2,//position 1 -room 2
    array( //- room 3
      3 //position 0
    )
)
);

//note that this is a multi-dimensional array

//remember the room analogy?
//look at every array as a room in another room..

//it is also an indexed array, so we will use indexes 0 to n

//so we need three accessors

echo "<p> Question 3 {{Ans --> a3[1][1][0]}} : ".$a3[1][1][0]."</p>";
//let's see..

#Question 4

$a4 = array(
  "a" => array(
      "b" => 0,
      "c" => 1
  ),
  "b" => array( //we need to access "b"
      "e" => 2,
      "o" => array( //then "o"
          "b" => 3 //then "b"
      )
  )
);

//accessing the value of 3
//this is an associative multidimensional array

//we access elements using keys..
//it is like there are 3 rooms and we need
//to access every element in each room
//so..

echo "<p> Question 4 {{Ans --> a3['b']['o']['b']}} : ".$a4['b']['o']['b']."</p>";
//we have a problem....it's the variable name
//$a3..it should be $a4

#Question 5
$a5 = "a,b,c,d,e,f";
//creating arrays from strings...

//there are many ways of doing this but the basic idea is the same

//we need to a function that converts string to arrays

//we have explode and str_split

//let's use str_split first

$a5_array1 = str_split($a5);
//if we do this, lets see the result..

//var_dump($a5_array1);

//every element is an array..
//but we need the element only..not the commas..

//explode is the best for this..
//explode splits a string by a string and returns an array..

//for example
$test = "a_b";
//I can split $test by _
$test_array = explode('_',$test);
//the first argument is the string to split by..
//then the string itself
//there is also a third optional parameter..

//the limit..if you want to split to a certain length..

//for example

$test2 = "a_b_c_d_e_f_g";
$test2_array = explode("_",$test2,4);
//stop at length 7
//sorry the limit. specifies the maximum values in the array

//so let's say we want 4 element only..
//it will split the first three, then all the
//rest of the elements will be in the last element..
//see..
//let's see the outputs

//now let's write the solution to number 5

$a5_array = explode(',',$a5);

echo "<p> Question 5 {{Ans --> explode(',',a5)}} : "; var_dump($a5_array); echo "</p>";

#Question 6

//let's print out the arry from question 5.

//echo "<br/><br/>";

//var_dump($a5_array);

//we need a way of converting values to keys..

//we can create a new associative array using a loop
//after which we can check if there is another way..perhaps a function

#let's start...
//however, we define the array out of the loop

$a5_assoc = array();
foreach($a5_array as $value):
  //we will populate an associative array here
  $a5_assoc[$value] = $value;
  //here, we assign the value as both the key and the value
endforeach;

//that's it... ;)
//let's use the one with words...

echo "<p> Question 6 {{Ans --> See code..}} : "; var_dump($a5_assoc); echo "</p>";

//let's check whether there is an inbuilt php function to do this..

//there is no inbuilt function..

#Question 7

$keys = array(
  'field1' => 'first',
  'field2' => 'second',
  'field3' => 'third'
);

$values = array(
  'field1value' => 'dinosaur',
  'field2value' => 'pig',
  'field3value' => 'platypus'
);

//check out the expected output.

//the values in the array named $keys are the keys
//the values in the array named $values are the values
//we need to create a for loop and create a new array
//an associative one...
//let's use another type of loop

$array_length_values = count($values);

//note the function count()
//returns the length of the array named $values

//a length of 3..

//however if you notice the forloop below..
//we initialize $i to zero..
//then we increment zero by 1
//and continue to do so if $i is less than four..

//namely...0..1..2..and..3
//you see..
//because of how indexes are in arrays
//they start from zero..but counting starts from one..

$keyValues = array();//our new array..
for($i = 1; $i <= $array_length_values;$i++){
   $newKey = "field".$i;//1..2.only..let's include 3...
   $newValue = "field".$i."value";
//let's debug...
//it appears php is not getting the values well for the values array
  //we specify a key..
  //note the key is taken from the keys array
  $key = $keys[$newKey];
//ish... the problem is i'm using the wrong key name for keys..
  //we specify a value
  //the value is taken from the values array
  $value = $values[$newValue];

  //populating our new array
  $keyValues[$key] = $value;
  //we are done now...
}

//will this work..
//let's think about it and try to work out what happens in the loop..

//when i is zero..
//the first iteration..
//is zero less than 4..yes..

//newKey will have the value field0..
//newValue will have the value field0value

//then we access $key['field0'] to get first..but wait..
//the key field0 does not exist.. it starts from 0..
//we need to change the initialization from 0 to 1..
//now we start with field1..and field1value...
//let's talk about the third line..

//let us print out our result..

echo "<p> Question 7 {{Ans --> See code..}} : "; var_dump($keyValues); echo "</p>";

//we have a problem...
//some indexes do not exist..

//notice third does not exist.. that is because of the stop condition..


#Question 8

//in this question, we deal with a multi=dimensional array..

$transactions = array(
  array(
    'debit'=> 2,
    'credit' => 3
  ),
  array(
    'debit' => 15,
    'credit' => 14
  )
);

//let's create  a loop to access each transaction
//transaction does not exist...hmmh.
$index = 0;
foreach($transactions as $t):

  $debit = $t['debit'];
  $credit = $t['credit'];

  //let's get the absolute value
  $abs_value = abs($debit - $credit);
  //let's add the value to our array
  //$t['amount'] = $abs_value;
  //will this work..let's see...

  $transactions[$index]['amount'] = $abs_value;

  //this should work now ;)


//add a new key to this array..
//assign the $abs_value
   //this will access the first array..
  //it is the same as the current transaction here..

  //on the second iteration/loop.then $index will be 1 since we are incrementing it below.
  //hence the second element...

  //no error so far..
  //let's check the original array..

  //we can use the position of the arrays to access them then put the 'amount key'

  //first we need an index to access each element in the outer array

  //increment the index
  $index++;
endforeach;


//it has not changed..we need a way of adding the amount to the original array..


//hooray.
echo "<p> Question 8 {{Ans --> See code..}} : "; var_dump($transactions); echo "</p>";

#Question 9

$a9 = array(0,1,2,3,4,5,6);

//the long way first..
$sum = 0;
foreach( $a9 as $value ){
  //$sum = $sum + $value;

  //wait.. note you can use the shorthand assignment here

  $sum += $value;
  //this is the same as
  //$sum = $sum + $value;
}

echo "<p> Question 9 - opt1 {{Ans --> See code..}} : $sum </p>";

//the short way

//we use an inbuilt php function array_sum

$a9_sum = array_sum($a9);
echo "<p> Question 9 - opt2 {{Ans --> See code..}} : $a9_sum </p>";

//now go through the exercise again and see whether everything makes sense..

//spend time where things are not clear
//and give special attention to such..

//happy labour day! :)

// Bye! :)
?>
