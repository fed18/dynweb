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
//Indexed array
$all_cats = ["Misse", "Tuffsen", "Gruth'neok The Seeker", "Skorpan"];
$all_cats[0]; //"Misse"
$all_cats[1]; //"Tuffsen"
$all_cats[2]; //"Gruth'neok"
$all_cats[3]; //"Skorpan"

// Associative array (In JavaScript: Object)
// Every key in $all_cats is a number: 0, 1
// Every key in a cat is a string: "name", "color", "age"
$all_cats = [
  [
    "name" => "Misse",
    "color" => "Brown",
    "age" => 10
  ],
  [
    "name" => "Skorpan",
    "color" => "Brown",
    "age" => 10
  ]
];
// Cannot be accessed by index, must be accessed by name
// echo $misse["name"];   //  "Skorpan"
// echo $misse["color"]; //   "Brown"

/**
 * Standard echoing gets tedious and can be hard
 * to debug, we get not syntax highlighting inside
 * of the HTML either. The other loop is prefered
 * if we have HTML-heavy scripts
 */
foreach($all_cats as $single_cat){
  echo "<div class='card'>";
  echo "<p>" . $single_cat["name"] . "</p>";
  echo "<p>" . $single_cat["color"] . "</p>";
  echo "</div>";
}

/* Alternative control statement syntax. Foreach
 * is opened by ':' instead of '{' and is closed
 * by writing 'endforeach;' instead of '}'. Everything
 * inside of the foreach will be looped regardless
 * of HTML or PHP syntax
 */
foreach($all_cats as $single_cat): ?> <!-- Close php tag --> 
  <div class="card">
    <!-- Open php-tag when variable is needed -->
    <p><?= $single_cat["name"]; ?></p>
    <p><?php echo $single_cat["color"]; ?></p>
  </div>
<?php endforeach; ?>

</body>
</html>
