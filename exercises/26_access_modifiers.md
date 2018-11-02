## Access modifiers, public/private

* https://daylerees.com/php-pandas-classes/
* https://daylerees.com/php-pandas-scope/

---

1 . Ändra klassen `Book` från föregående övningar så att `title` och `author` är `private` i stället för `public`. Försök att skriva ut värdet på title på samma sätt som i uppgift 1.2. Du kommer att få ett felmeddelande. Vad säger meddelandet? Varför får du felet?

2 . Skapa två metoder till klassen `Book` som kan användas för att ändra egenskapen `title`. Den ena metoden ska heta `getTitle` och ska returnera värdet på den privata egenskapen `title`. Den andra metoden ska heta `setTitle(x)` och ska ändra värdet på title till något som man skickar som argument till funktionen.

3 . Använd klassen `Car` från föregående övningar. Gör alla egenskaper för klassen `Car` privata. Behöver du ändra något för att funktionen `printInfo` ska fungera?

4 . Skriv en metod med namnet `changeCar`. Den ska ta tre parametrar: `model`, `color` och `price`. När man anropar den ska den ändra värdet på de privata egenskaperna.

## Statiska egenskaper

* [PHP.net: Static Keyword](http://php.net/manual/en/language.oop5.static.php)
* https://daylerees.com/php-pandas-statics/

1 . Lätt till en publik statisk variabel i klassen `Car` med namnet `numberOfWheels` som är satt till 4. Vad är en statisk egenskap och hur skiljer den sig från en vanlig egenskap?

2 . Lägg till en publik statisk variabel i klassen `Car` med namnet `numberOfCars` som är 0. Varje gång ett `Car` objekt skapas ska `numberOfCars` räknas upp med 1. Skapa några Car-objekt och kontrollera att variabeln räknas upp korrekt.


## Extra

### Skapa en Todo-list

Testa att implementera en Todo-list med PHP-classes. Du behöver nog inte använda något arv men måste få två klasser att synka med varandra, liknande `SingleBookLibrary`. Använd `private` och `public` på de egenskaper som behöver det.

Du behöver alltså skapa minst två klasser `Tasks`/`Todos` och `Task/Todo`. `Tasks` ska hantera de olika `Task` och spara dessa i en array. Men alla `Task` ska vara en instans av klassen `Task`. 

Man tänka sig följande upplägg på `Task`:

```php
class Task
{
    private $title;
    private $createdAt;
    private $complete = false;
}
```

Samt en annan klass som håller reda på alla Tasks:

```php
class Tasks
{
    private $listOfTasks = [];

    public function add($task){
      // To Implement
    }
}
```

## Lösningsförslag

## Access modifiers, public/private

1 . Privata variabler får enbart kallas på inifrån klassen. Om vi försöker komma åt ett värde i en klass som är `private` får vi ett error. Detta är för att begränsa tillkomsten till variabler så att inte all kod har kännedom om all annan kod i projektet. Vi kapslar in värden så att de blir svårare att komma åt och ändra, så att vi inte ändrar dessa av misstag t.ex.

2 .
Dock om vi har publika funktioner som sätter dessa privata variabler så går det bra. Då blir enda sättet att komma åt värdena via de funktioner vi skapar. Det blir tydligare för den som läser koden att det är via dessa funktioner som värdena får ändras samt om dessa funktioner inte skulle finnas så skulle det nog vara så att värdena aldrig ska ändras. Privata variabler är mer skyddade.
```php
<?php

class Book {
  private $author;
  private $title;

  // getTitle is inside of the class, full access. But it is also public so we can use it outside of the class
  public getTitle(){
    return $this->title;
  }

  public setTitle($title){
    $this->title = $title;
  }
}
```

3 . Nej, funktionerna som finns i klassen `Car` är redan publika och då spelar det ingen roll för funktionerna om variablerna inuti klassen är privata. Om vi dock vill komma åt värdena på bilen utan att kalla på `printInfo` eller `halfPrice` så går det inte då de är privata och kan inte anropas eller skrivas ut utanför klassen. Vi kan sätta funktionerna till `private` också och då kan vi inte längre anropa dessa.
```php
<?php

class Car {
  private $model;
  private $color;
  private $price;
  private $sellDate;

  public function __construct($model, $color, $price, $sellDate = "2017-04-18") {
    $this->model = $model;
    $this->color = $color;
    $this->price = $price;
    $this->sellDate = "2017-03-27";
  }
  public function printInfo() {
    echo "Det här är en $this->color $this->model "
    . "som kostar $this->price kr.<br>";
  }
  public function halfPrice() {
    $this->price = $this->price / 2;
  }
  // This function needs to be public and looks similar to the construct function
  public function changeCar($model, $color, $price) {
    $this->model = $model;
    $this->color = $color;
    $this->price = $price;
  }
}

$car1 = new Car('Tesla', 'silverfärgad', 1000000);
$car1->halfPrice();
$car1->changeCar('Fiat', 'blå', 80000);
$car1->printInfo();

```

### Statiska egenskaper

1. En statisk egenskap är en variabel som faktiskt tillhör själva klassen och inte ett specifikt objekt. I det här fallet så hör egenskapen `numberOfCars` till ritningen och inte till de individuella bilarna som skapas. Medan t.e.x `price` kan vara annorlunda för varje bil men en statisk egenskap är något som aldrig förändras p.g.a. objektet. Detta betyder också att vi inte behöver skapa ett objekt för att komma åt värdet eftersom det är samma för samtliga bilar och vi kan anropa värdet direkt, se nedan;

```php
<?php

class Car {
  private $model;
  private $color;
  private $price;
  private $sellDate;
  public static $numberOfWheels = 4;

  public function __construct($model, $color, $price, $sellDate = "2017-04-18") {
    $this->model = $model;
    $this->color = $color;
    $this->price = $price;
    $this->sellDate = "2017-03-27";
  }
}

// No object created, call the class directly with ::
echo Car::$numberOfWheels;

```

2 . Varje gång vi skapar ett objekt så kallas `__construct__` på. Detta betyder att vi kan öka räknaren inuti `__construct` för att hålla reda på hur många objekt som har skapats och därmed hur många bilar som har skapats.

```php
<?php

class Car {
  private $model;
  private $color;
  private $price;
  private $sellDate;
  public static $numberOfWheels = 4;
  public static $numberOfCars = 0;

  public function __construct($model, $color, $price, $sellDate = "2017-04-18") {
    $this->model = $model;
    $this->color = $color;
    $this->price = $price;
    $this->sellDate = "2017-03-27";
    // Instead of $this we must use 'self'
    self::$numberOfCars++;
  }
}

// No object created, call the class directly with ::
echo Car::$numberOfCars;

```
