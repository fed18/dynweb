# Felsökning

> Öva på att felsöka felaktig kod, både syntaxfel samt logiska fel. D.v.s. att felen kan vara både feltänkta kodrader samt kodrader som inte följer språkets uppsatta regler för att köras. Jobba gärna tillsammans.

* **Syntax**
  - _the arrangement of words and phrases to create well-formed sentences in a language_
  - _In computer science, the syntax of a computer language is the set of rules that defines the combinations of symbols that are considered to be a correctly structured document or fragment in that language._
* **Logical error**
  - _In computer programming, a logic error is a bug in a program that causes it to operate incorrectly, but not to terminate abnormally (or crash). A logic error produces unintended or undesired output or other behaviour, although it may not immediately be recognized as such._


## Länktips

* [**How To Google Your Errors** @ _dev.to_](https://dev.to/swyx/how-to-google-your-errors-2l6o)
* [**Google Search Operators** @ _ahrefs.com_](https://ahrefs.com/blog/google-advanced-search-operators/)
* [Stackoverflow.com](https://stackoverflow.com/)
* [Google Advanced Search](https://www.google.com/advanced_search)

## Checklista: Lära sig ett nytt verktyg/språk/bibliotek/ramverk

> Hur jag oftast tar mig till nytt tekniskt innehåll.

* Läs dokumentationen/manualen för verktyget/språket: _x_ (_RTFM_)
* Förstå dokumentationen **halvt** men var förvirrad. Dokumentationer är oftast tyvärr bristande och väldigt tekniska vilket gör det de svåra att förstå.
* Sök: _"x + examples"_
* Läs de 3-5 första sökresultaten
* Sök: _"x + tutorial"_
* Läs de 3-5 första sökresultaten
* Sök : _"why use x" / "when to use x"_
* Läs de 3-5 första sökresultaten
* Återgå till att läsa dokumentationen/manualet för verktyget igen


## Övning

1. Felsök koden nedan och få den att fungera. Den innehåller ett antal fel, både logiska fel och rena syntax-fel. Skriv upp vad ni tog för steg för att få koden att fungera, steg för steg. Samt vad ni använde för källor, vad ni sökte efter på google etc.


```php
<? php

echo "<header><h1 class="header-title">Hello friends!</h1></header>";
echo "<main>"

/**
 * Using date-function to get information about current
 * date,, j is 0-31, z is 0-365
 * http://php.net/manual/en/function.date.php
 */
$day_of_month = date('j'); //0-31
$day_of_year = date('z');  //0 -365

if(day_of_month = 1){
  echo "<p> First day of the month! <p>";
}

$percentage_of_year_passed = $day_of_year / 365;
echo "<p>" . $percentage_of_year_passed . "% of the year is gone</p>";

$answer_to_everything = "42";

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

for($i = 0; i < count($all_cats); $i = 1){
  echo "<p>" . $cats[$i] . "</p>";
}

echo $i; // Why is this working? What value does it print?

?>
```

