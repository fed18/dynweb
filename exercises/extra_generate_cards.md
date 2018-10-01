# Extra - Skapa kort

## Lästips

* [Arrays @ _W3Schools.com_](https://www.w3schools.com/Php/php_arrays.asp)
* [Arrays @ _PHP.NET_](http://php.net/manual/en/language.types.array.php)
* [`foreach` @ _PHP.NET_](http://php.net/manual/en/control-structures.foreach.php)

## Övning

Nedan finns en array av _associativa arrayer_, d.v.s. arrayer där nyckeln är en sträng istället för en siffra. I en associativ array måste man själv sätta nyckeln, medan i en vanlig array så börjar nyckeln på `0` och ökar sedan med arrayens längd.

Varje associativ array beskriver ett visst innehåll, i detta fall är det kurslitteraturen som vi har till kursen. Varje [**kort**](https://calltoidea.com/lists/) har en title, en länk som är tänk att användas i en knapp eller en `<a>`-tagg. Färgen är tänk att användas på något sätt för kortet. `"tags"` är tänk att fungera som labels på kortet. Man ska även kunna se när kortet har skapats. **Du ska skriva ut varje innehåll i arrayen i ett snyggt formatterat kort i HTML-format med hjälp av PHP**.

_exempel_
```
 __________________________________
|                                  |
|   PHP Pandas        2018-03-12   |
|   [Link]                         | 
|                                  |
|                                  |
|   Tags: PHP, Beginner            |
|__________________________________|
```

### Extra funktionalitet

* Det ska gå att sortera korten baserat på när de har lagts till `ASC`/`DESC`. Detta kan vara två olika listor eller vilket håll som listan ska sorteras på kan vara hårdkodat.
* Det ska finnas flera listor på sidan. Den ena listan ska t.ex. enbart visa upp de kort som har taggen `"youtube"`. D.v.s. man ska kunna på något sätt sortera listan baserat på vilka taggar som finns. Vad din kod sorterar ut på kan vara hårdkodat och behöver inte baseras på vad användaren skriver in. 

```php
$list = [
  [
    "title" => "PHP Pandas",
    "href" => "https://daylerees.com/php-pandas/",
    "color" => "lightsalmon",
    "tags" => ["php", "beginner"],
    "date_added" => "2018-03-12"
  ],
  [
    "title" => "PHP Best Practices",
    "href" => "https://phpbestpractices.org/",
    "color" => "blue",
    "tags" => ["bestpractice", "intermediate"],
    "date_added" => "2018-02-27"
  ],
  [
    "title" => "PHP The Right Way",
    "href" => "http://www.phptherightway.com/",
    "color" => "lightblue",
    "tags" => ["bestpractice", "intermediate"],
    "date_added" => "2017-09-23"
  ],
  [
    "title" => "PHP Documentation",
    "href" => "http://php.net/",
    "color" => "yellow",
    "tags" => ["php", "documentation"],
    "date_added" => "2018-06-11"
  ],
  [
    "title" => "Traversy Media - PHP Front to Back",
    "href" => "https://www.youtube.com/watch?v=oJbfyzaA2QA",
    "color" => "rebeccapurple",
    "tags" => ["php", "youtube", "tutorial"],
    "date_added" => "2017-08-30"
  ],
  [
    "title" => "W3Schools - PHP",
    "href" => "https://www.w3schools.com/php/default.asp",
    "color" => "teal",
    "tags" => ["php", "tutorial"],
    "date_added" => "1989-09-30"
  ]
];
```