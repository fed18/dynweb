# OOP Calulator

> Gruppövning - 3 personer

* [Classes - PHP Pandas](https://daylerees.com/php-pandas-classes/)
* [How to explain object-oriented programming concepts to a 6-year-old](https://medium.freecodecamp.org/object-oriented-programming-concepts-21bb035f7260)

## Innehåll

Ni ska som grupp skapa en miniräknare som har de grundläggande funktionerna:
* addera
* subtrahera
* dividera
* multiplicera

Miniräknaren ska vara kodad som en **class** i PHP och varje funktion nedan ska vara en **metod** inuti klassen (en metod är en funktion som ligger inuti en klass, annars skiljer den sig inte något från en funktion). Objektet som skapas av klassen ska spara vad den nuvarande summan är och man ska alltid kunna skriva ut och se vad denna är. Summan av alla uträkningar sparas som en egenskap (en variabel som ligger inuti en klass) längst upp i klassen. Varje metod ska enbart ta in ett värde som argument och sedan lägga till detta till summan av alla uträkningar.

```php
function add($number){
  // Yours to implement
}
function subtract($number){
  // Yours to implement
}

function divide($number){
  // Yours to implement
}

function multiply($number){
  // Yours to implement
}
```

## Exempel på användning

Det är tänkt att användningen ska se ut som följande:

```php

$calculator = new Calculator();
$calculator->add(5);
$calculator->subtract(2);

// You don't have to call it $sum, you can name it whatever you want
echo $calculator->sum; // should print '3'

$calculator->multiply(2);

echo $calculator->sum; // should print '6'

$calculator->divide(2);

echo $calculator->sum; // should print '3'
```

## Extraövning

Implementera en minnesfunktion där man kan backa ett steg, d.v.s att man kan ta bort antingen enbart den senaste uträkningen eller att man kan ta bort samtliga uträkningar. Detta är ett exempel på hur man skulle kunna använda denna funktion:

```php
$calculator = new Calculator();
$calculator->add(5);

$calculator->subtract(2);
$calculator->stepBack();
echo $calculator->sum; // should print '5' beacuase we didn't apply the last subtract
