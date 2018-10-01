<?php

echo "<header><h1 class=\"header-title\">Hello friends!</h1></header>";
echo "<main>";

/**
 * Using date-function to get information about current
 * date,, j is 0-31, z is 0-365
 * http://php.net/manual/en/function.date.php
 */
$day_of_month = (int)date('j'); //0-31
$day_of_year = (int)date('z');  //0 -365
$day = 2;
var_dump($day);
var_dump($day_of_month);


if($day_of_month == 1){
  echo "<p> First day of the month! </p>";
}

$number_of_days = 365;

// Create a constant, doesn't need $$$$$$
define('number_of_days', 365);

$percentage_of_year_passed = ($day_of_year / number_of_days) * 100;
echo "<p>" . round($percentage_of_year_passed) . "% of the year is gone</p>";

$answer_to_everything = 42;

// This is prefered
if($answer_to_everything === 42){
  echo "<p> You know it all! </p>";
}

if($answer_to_everything == 42){
  echo "<p> Do you know it all? </p>";
}

$all_cats = ["Misse", "Tuffsen", "Gruth'neok The Seeker", "Skorpan"];

foreach($all_cats as $single_cat){
  echo "<p>" . $single_cat . "</p>";
}

echo $single_cat; // Why is this working? What value does it print?

echo "<h2> These cats are so nice, here they are again </h2>";

for($i = 0; $i < count($all_cats); $i = $i + 1){
  echo "<p>" . $all_cats[$i] . "</p>";
}

echo $i; // Why is this working? What value does it print?
echo "</main>";