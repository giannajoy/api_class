<!-- Let's start off -->
<html>

  <!-- Remember we need to indent our code for readability -->
  <head>
    <!--Let's add a nice font for our title-->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <!-- Include our css files -->
    <link rel="stylesheet" href="greeter.css" />
    <!-- Add page title -->
    <title>PHP Recap</title>
  </head>

  <body>
    <h2>Greeter </h2>
    <!-- Let's add a form for submitting our age to PHP-->
    <form id="age-frm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <!-- Label -->
      <span class="lbl">Age : </span>
      <!-- Input -->
      <input type="number" id="age" name="age" required/>

      <!--Button -->
      <button name="salimia" value='yes'>Salimia Me</button>
    </form>
    <!-- Let's add our javascript -->
    <script type="text/javascript">

      //let's select the age input field
      document.getElementById('age').onchange = function(){
        //quite nice
      }

      //Remember we specified age to be of type number.
      //A user will never enter anything other than a number
      // Except e... why is this??
      //Check out the hint

    </script>
  </body>

</html>

<!-- OUR PHP CODE -->
<?php
//let's check for the button click
//we are checking that the salimia variable exists(isset) and that it has
// a value of yes
if(isset($_GET['salimia']) && $_GET['salimia'] == 'yes'){

  //let's get the Age
  $age = $_GET['age'];
  //echo gettype($age);
  //we need to make sure age is set before the form is submitted
  //call the function
  $age_message = salimiana($age);

  //note the function returns the various messages but to print it out
  # we need to use echo
  #remeber string concatenation (joining string)
  #we use the dot operator
  #in php string can be declared using "" or ''
  #you need to be careful with nesting though
  #this mode styles are called in-line styling, they override any styles in the head or included in css files
  echo '<br/><marquee style="color:blue;font-size:20px;">'.$age_message.'</marquee>';
}

//defining functions in php
//in PHP 7 you can also type hint i.e specify the variable type
//we will demo this later..for now remove it. -- the type
function salimiana($age){

  //control statements
  if( $age <= 12):
    return 'Child';
  elseif($age >= 13 && $age <= 19):
    return 'Teenie';
  elseif($age >=20 && $age < 30):
    return 'Yout';
  else:
    return 'Mzito';
  endif;

  //check out the if, else syntax :)

  //Now try out the Bonus ;)

  #Bye!

}

?>
