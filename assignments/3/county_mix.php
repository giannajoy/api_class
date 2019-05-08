<?php
//every string containing each county information is separated by a comma
//we also see data being separated by a new line
//We can use the comma to get each individual string containing information about each county
// a string of county data
$county_data = "1. Mombasa. – Hassan Ali Joho – ODM,
2. Kwale. – Salim Mvurya – Jubilee,
3. Kilifi. – Amason Jeffah Kingi – ODM,
4. Tana River. – Dhadho Godhana – ODM,
5. Lamu. – Fahim Yasin Twaha – Jubilee,
6. Taita-Taveta. – Granton Samboja – WDM K,
7. Garissa. – Ali Bunow Korane – Jubilee,
8. Wajir. – mohamed Abdi Mohamud – Jubilee,
9. Mandera. – Ali Ibrahim Roba - Jubilee,
10. Marsabit – Mohamud Mohamed Ali – Jubilee,
11. Isiolo – Mohamed Abdi Kuti – Independent,
12. Meru – Kiraitu Murungi – Jubilee,
13. Tharaka Nithi – Onesmus Muthomi Njuki – Jubilee,
14. Embu – Martin Nyaga Wambora – Jubilee,
15. Kitui – Charitu Ngilu – Narc Kenya,
16. Machakos – Alfred Mutua – MCC,
17. Makueni – Kivutha Kibwana – WDM K.,
18. Nyandarua – Francis Kimemia – Jubilee,
19. Nyeri – Patrick Wahome Gakuru – Jubilee,
20. Kirinyaga. – Ann Waiguru – Jubilee,
21. Murang’a – Mwangi wa iria – Jubilee,
22. Kiambu. – Ferdinand Waititu Babayao – Jubilee,
23. Turkana. – Josphat Nanok – ODM,
24. West Pokot. – John Krop Lonyang’apuo. – KANU,
25. Samburu. – Moses Kasainie Lenolkulal – Jubilee,
26. Trans-Nzoia. – Patrick Khaemba – FORD Kenya,
27. Uasin gishu. – Jackson Mandago – Jubilee,
28. Elgeyo Marakwet. – Alex Tanui Tolgas – Jubilee,
29. Nandi. – Stephen Sang – Jubilee,
30. Baringo – Stanley K Kipris. – Jubilee,
31. Laikipia – Ndiritu Muriithi – Independent,
32. Nakuru. – Lee Kinyanjui – Jubilee,
33. Narok – Samuel Kuntai Ole Tunai – Jubilee,
34. Kajiado. – Joseph Ole Lenku – Jubilee,
35. Kericho. – Prof.Paul Chepkwony Kiprono – Jubilee,
36. Bomet. – Joyce Laboso – Jubilee,
37. Kakamega. – Wyclife Oparanya – ODM,
38. Vihiga. – Wilber Ottichilo – ODM,
39. Bungoma. – Wyclife Wafula Wangamiti – ODM,
40. Busia. – Sospeter Ojaamong – ODM,
41. Siaya. – Cornel Rasanga. – ODM,
42. Kisumu. – Peter Anyang Nyong’o. – ODM,
43. Homabay. – Cyprian Awiti – ODM,
44. Migori. – Zachary Okoth Obado – ODM,
45. Kisii. – James Ongware – ODM,
46. Nyamira. – John Nyangarama Obiena - ODM,
47. Nairobi. – Mike Sonko Mbuvi Kioko – Jubilee";

// You should not modify anything above this line

// Your code starts here
$c_data_r = explode(",",$county_data);
//every item below should create a new row..in the loop
//loopsy..iterate the c_data_array
//but we need a table tag.. outside the loop
//we can put borders on our table
//and a row for titles
echo '<table border=1>';
echo '<thead><tr><th>Name</th>';
echo '<th>Governor</th>';
echo '<th>Party</th></tr>';

$party_distribution = array();

foreach($c_data_r as $county){
  echo '<tr>';
  //get the county data
  $county_details = explode('–',$county);

  //fix for Nyamira and Mandera..
  if(count($county_details) == 2):
    $county_details_fix = explode("-",$county_details[1]);
    unset($county_details[1]);
    $county_details = array_merge($county_details,$county_details_fix);
  endif;

  //let's add table data
  //an empty one for starters..hehe..we need some data in the td..

  //nice..now let's print the actual data..

  //it is stored in the county_details array
  //the county name - we need to put a link here...

  //to do this..let's get the county name first..
  $county_name = $county_details[0];
//  echo $county_name;
  //1. Mombasa.
  //we need to remove 1. and . so that we can have mombasa only then add .go.ke to the string to construct a url

  // let us google. how to remove certain strings from a string..

  //let's apply preg_replace using POSIX syntax
  //we want to match anything that is not an alphabet character

  $nice_name = preg_replace('/[^A-Za-z]/','',$county_name);
  //hhmmhh..it doesn't work...we were missing the // which indicate that it is a pattern
  //new line
  //let us remove numbers from the name
  $display_county_name = preg_replace('/[^A-Za-z- ]/','',$county_name);
  //again.I'm missing the ^ character..
  $nice_name = strtolower($nice_name);

  $county_web = "http://".$nice_name.'.go.ke';
  //and finally we append .go.ke

  //hooraah! it works.. now let's convert it into lowercase
  //echo '<br/>';
  //echo $nice_name;

  //die();
  //let us  make the link open in a new tab
  echo "<td><a href='$county_web' target='new'>".$display_county_name.'</a></td>'; //some string concatenation(joining)
  //the governor name
  echo '<td>'.$county_details[1].'</td>'; //some string concatenation(joining)
  $party_name = $county_details[2];
  //the party name
  echo '<td>'.$party_name.'</td>'; //some string concatenation(joining)

  //Uuwii.no output..perhaps we have an error...
  //let us debug..

  $key_party_name = strtolower($party_name);

  //check if the party is in the array
  //oops..i forgot to pass the array ..let's check the position of the arguments

  if(array_key_exists($key_party_name,$party_distribution)){
    //increment count by one..
    $party_distribution[$key_party_name] = $party_distribution[$key_party_name] + 1;
  }else{
    //add it
    $party_distribution[$key_party_name] = 1;
  }


  echo '</tr>';
}

echo '</table>';

//and that is the end for assignment three...

//Oh wait..there was the bonus..hhmhh.

//: What is the distribution of the political parties?

//for us to do this..we need to create an
//associative array and populate it with unique party names plus a count..

echo "<h3>Party distribution</h3>";
//read on this syntax.. :)
foreach($party_distribution as $key => $value){
  echo "<p>$key - $value slots</p>";
}

//and that's it for the assignment..
//I hope you have learnt a few things :)

/// Bye :)
?>
