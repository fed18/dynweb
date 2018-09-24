<html>
	<head>
    <title>PHP</title>
	</head>
	<body>
<?php
	// Single line comment
	$name = "Jesper";
	/* Multiline comment */
  echo "<h1 class='title'>" . $name . "</h1>";
  /**
   * This works as well in most cases, no need for dot to add
   * strings together
   */
  echo "<h1>$name</h1>";
  // Echo without html, will still work in browser
	echo $name;
?>
  <!-- This is HTML country -->
	<h1> Tjena från HTML </h1>
	</body>
</html>