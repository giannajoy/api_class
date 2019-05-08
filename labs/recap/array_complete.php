<?php

//an array representing the count of student courses
$array = ['bbit','bcom','bbit','mcom','bcom','bcom'];

//to search for elements in this array...

//we use a php function called in_array

//for example..

//echo in_array($array,'one');

//i've mixed up the parameter order..
//it should be..


//the string/element you are looking for..
//then the array
//nothing...
//let's try var_dump

//var_dump(in_array('bbit',$array));

//good stuff.. so, this is expected.. in_array returns false, if the element is not in the array and true if it is..

//and that is how you search(the easiest way) in arrays

//let's say we would like to count the unique courses...

//an interesting way would be to..

// 1. create a new array(associative)
// 2. Add only unique courses
// 3. If course is in array, increment count
// 4. Print out the array

//let's get started

$course_count = [];
//initializing arrays...
//we could also do..
//$course_content = array();

//both are equivalent..

foreach($array as $course){
  //if the course is not in the array
  //i had a typo in the variable name..
  if( array_key_exists($course,$course_count) == false ):
    //we add it
    $course_count[$course] = 1;
    //we need to find another way of searching since we are looking for keys..

    //see..
    //this is the only part being executed..
    //our array is not being updated or what??
    //hmmhh..
  else:
    //we increment the value by one
    //the else is not being called...
    $course_count[$course] = $course_count[$course] + 1;
  endif;
}

//let's see whether it works..
//it doesn't work as expected..

//hhmmmhh. let's debug
var_dump($course_count);

//hooray!!

//we got it..

//you have learnt two functions for searching

//in_array -- works on values
//array_key_exists -- search array keys...
//nice!

//check out the other things you can do on an array..

//-- ordering arrays
//-- Other array functions..

//To be continued .. :)

//Bye! :)
 ?>
