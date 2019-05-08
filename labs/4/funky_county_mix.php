<?php
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


/**
 * A function that converts a string of county names to a 2-dimensional array.
 * @param string $county_string
 * @return array
 */
function splitter(string $county_string){

  $county_array = explode(",",$county_string);
  array_walk($county_array,'update_array');
  return $county_array;

}

/**
 *
 * @param $value
 * @param $key
 */
function update_array(&$value,$key){
    $county_details = explode('–',$value);

    //fix for Nyamira and Mandera..
    if(count($county_details) == 2):
        $county_details_fix = explode("-",$county_details[1]);
        unset($county_details[1]);

        $county_details = array_merge($county_details,$county_details_fix);
    endif;
    //update the name as well
    $county_name = $county_details[0];
    $county_nice_name = preg_replace('/[^A-Za-z- ]/','',$county_name);
    //the county name is at index 0
    $county_url = getUrl($county_name);

    $county_details[0] = "<a href='$county_url' target='new'>".$county_nice_name.'</a>';

    $value = $county_details;
}

/**
 * A function that returns a url of kenyan counties
 *
 * @param string $county_name
 * @return string
 *
 * @example getUrl("1.Mombasa.")
 */
function getUrl(string $county_name){
    $nice_name = preg_replace('/[^A-Za-z]/','',$county_name);
    $county_web = "http://".$nice_name.'.go.ke';
    return $county_web;
}

/**
 * A function that prints out a table
 *
 * @param $county_array
 *
 */
function _print_table($county_array){

    echo '<table border=1>';
    echo '<thead><tr><th>Name</th>';
    echo '<th>Governor</th>';
    echo '<th>Party</th></tr>';
    foreach($county_array as $county_details){
        echo '<tr>';

        foreach($county_details as $data):
            echo "<td>$data</td>";
        endforeach;

        echo '</tr>';
    }

    echo '</table>';

}

/**
 * @param array $county_ar
 * @return array
 */
function getPartyDistribution($county_ar){
    return array_count_values(array_column($county_ar,2));
}

//split string to array
$county_ar = splitter($county_data);
//print the table
_print_table($county_ar);
//Show political party distribution
print_r(getPartyDistribution($county_ar));

//now you can style the output nicely :)

//Bye!/
?>