<html>
	<head>
    <title>PHP</title>
	</head>
	<body>
	<h1>LOOPS!</h1>
<?php
	// ARRAY
	// A collection of variables
	// Arrays position starts at 0
	$names = ["Jesper", "Inte Jesper", "Anti-Jesper"];

	// LOOPS
	// Repeats code (iterate)
	// start, stop & increase (1)
	// for($i = 0; $i < 10; $i++)
	for($i = 0; $i < count($names); $i = $i + 1){
		// Use $i as the position in the array
		echo $names[$i];
	}

	// WHILE
	// start, stop, increase/decrease
	$age = 10;
	while($age >= 0){
		echo $age . "<br/>";
		// ALWAYS make sure the loop ends
		// Condition MUST be met
		$age = $age - 1;
	}

  ?>
	</body>
</html>