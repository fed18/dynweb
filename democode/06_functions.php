<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP</title>
	<style>

		body {
			margin: 2rem 0 0 0;
			width: 100vw;
		}
		.card {
			font-family: sans-serif;
			padding: 1rem;
			box-shadow: 2px 2px 12px 0 rgba(0, 0, 80, 0.2);
			color: rgba(0, 0, 80, 1);
			width: 50%;
			margin: 0 auto 2rem auto;
			border-radius: .5rem;	
		}
	</style>
</head>
<body>

<?php

/**
 * Function declaration, this function will produce
 * either a heading with the supplied content, or
 * it will print 'Nej nej nej!!' if the name is 'Jesper'
 */
function heading($content, $name){
  /** Function may only return 1 thing, we can have
   *  multiple returns if only one is triggered, when
   *  we have a if-statement there is only one possible
   *  outcome
   * */
  if($name === "Jesper"){
    return "Nej nej nej!!!!";
  } else {
    return "<h1> $content $name </h1>";
  }
}
// Function call
$heading = heading("Another", "Jesper");
echo $heading;
// Function call again
echo heading("Bloggy");

/**
 * If we put our code into a function we can decide when
 * this code will run. The code will only run when we call
 * sum(), a function declaration will not run by itself
 */
function sum(){
  $sum = 0;
  for($i = 0; $i < 10; $i++){
    $sum = $sum + $i;
  }
  return $sum;
  /* No mans land, nothing can happen after return
   * because return means end of function and everything
   * inside of the function cease to exist
   */ 
}

/**
 * sum() only returns a value it doesn't save it or print
 * it to the user, we must save the value in a variabel
 * or as below, echo the result of the function to the user
 */
$sum = sum();
echo sum() * sum();

?>

</body>
</html>