<html>
	<head>
    <title>PHP</title>
	</head>
	<body>
<?php
  $name = 'Jesper';
  echo "<h1> $name </h1>";
  /* We need options! IF-statement
   * Condition (villkor) decides what will happen
   * Can be either true or false and all conditions must be true
   * if we want the code inside of {} to run. In this statement
   * we are doing an exact comparison between a variable containing
   * the value 'Jesper' and the string 'Jesper', this is true
   * that they are the same and therefore we will print 'YES!'
   * */
  if($name === 'Jesper'){
    echo 'YES!';
  } else {
    echo 'What';
  }
  // && - OCH, || - OR
  $age = 18;
  // Save the boolean value 'false' to a variable
  $drivers_license = false;
  /**
   * When using AND (&&) both values must evaluate
   * to true, in this case we will get 'true' && 'false'
   * which will be false. Which means that the if-statement
   * will not run, it will not echo 'Brum Brum', instead it will
   * default to the 'else'-statement. Else is what happens when the
   * IF doesn't run. It has no conditions of its own, it only condition
   * is that the IF is false.
   */
  if($age >= 18 && $drivers_license){
    echo 'Brum brum!';
  } else {
    echo "no no";
  }
?>
	</body>
</html>