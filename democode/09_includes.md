# Includes

`index.php`
```php
<?php
session_start();
/**
 * INCLUDES / REQUIRES
 * An advanced CTRL + C - CTRL + V
 */
// If no file is found: produces warning


include 'head.php';
include_once 'functions.php';
include_once 'functions.php';
// Add belongs to the same scope as index.php
add(10, 10);
include_once 'head.php';
// If no file is found: produces error
require 'head.php';
require_once 'head.php';

$cities = ["Stockholm", "Norr om gävle?", "Andra städer"];

foreach($cities as $city){
	include 'card.php';		
}

include_once 'scope.php';
include_once 'footer.php';
?>
```

---

`head.php`
```php
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
```

`functions.php`

```php
<?php 

function add($a, $b){
  return $a + $b;
}

?>
```

---

`scope.php`
```php
<?php

/* Superglobals, avoid global variables
 * 
 * !SCOPE: the extent of the area or subject matter 
 * that something deals with or to which it is relevant.
 */
$paycheck = 100000000; // This exists right here in index.php
$_POST; // this has values if the request is sent by form
$_GET; // This has values if the request has info in URL
$_SESSION; // This has values if the session is started

// This is global scope
$a = 10;

function printValue(){
	// This is local function scope
	//global $a;
	$a = 20;
	echo $a;
}

echo $a; // 10
echo "<br>";

printValue(); // 20
echo "<br>";

echo $a; // 10

?>
```

---

`card.php`
```php
<div class="card"><?= $city ?></div>
```