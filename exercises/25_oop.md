# Objektorienterad Programmering

## Books

1 . Skriv en klass med namnet `Book`. Den ska ha två (_publika_) egenskaper: `title` och `author`.

2 . Skapa ett objekt av klassen `Book` och spara det i en variabel med namnet `$book`. Sätt värdet på egenskaperna `title` till _"Främlingen"_ och `author` till _"Albert Camus"_. Testa att du har gjort rätt genom att skriva ut värdet på egenskaperna title och author så här:
```php
echo "Titel: $book->title <br>Författare: $book->author <br>";
```

3 . Skapa ett till objekt av klassen `Book` med `title`: _"Darling River"_ och `author`: _"Sara Stridsberg"_.

4 . Ändra det senaste objektet så att `title` blir _"Drömfakulteten"_.

5 . Skapa en metod i `Book` med namnet `printTitle`. Metoden ska inte ta några parametrar. När den anropas ska den skriva ut bokens titel med `echo`.

6 . Skriv en klass med namnet `SingleBookLibrary`. Den ska ha egenskaper med namnet `book` och `isBorrowed`. Egenskapen `book` ska vara ett objekt av klassen `Book`. Lägg till en metod med namnet `borrow`, som ändrar värdet på `isBorrowed` till `true`. Metoden ska också skriva ut med echo om det gick att låna, eller om boken redan var utlånad.

## Car

1 . Skapa en klass med namnet `Car`. Den ska ha flera egenskaper: `model`, `color` och `price`. Skapa ett objekt av klassen `Car` och ge det lämpliga värden på egenskaperna.

2 . Lägg till en metod i `Car` med namnet `printInfo`. Metoden ska inte ha några parametrar. När metoden anropas ska den skriva ut information om `Car`-objektet. Till exempel, om `model="Volvo"`, `color="red"` och `price=25000` så ska funktionen skriva:
```
"Det här är en röd Volvo som kostar 25000 kr".
```

3 . Skapa en metod i `Car` med namnet `halfPrice`. När metoden anropas ska den ändra värdet på egenskapen price till hälften.

## Konstruktorer

1 . Lägg till en konstruktor till klassen `Book` från förra stycket. Konstruktorn ska ta två argument och använda dem för att sätta värdet på egenskaperna `title` och `author`.

2 . Lägg till en konstruktor till klassen `Car`. Konstruktorn ska ta tre argument och sätta värdet på egenskaperna `model`, `color` och `price`.

3 . Lägg till en egenskap till klassen `Car`, `sellDate`, som motsvarar när bilen såldes. Konstruktorn ska sätta `sellDate` till dagens datum. Exempel: "2017-03-27".
Tips: använd [`PHP.net: Date`](http://php.net/manual/en/function.date.php)


## Lösningsförslag

### Books

1.
```php
<?php

class Book {
  public $author;
  public $title;
}
```

2. 
```php
$book = new Book();
$book->title = "Främlingen";
$book->author = "Albert Camus";
echo "Titel: $book->title <br>Författare: $book->author <br>";
```

3. 
```php
$book = new Book();
$book->title = "Främlingen";
$book->author = "Albert Camus";
echo "Titel: $book->title <br>Författare: $book->author <br>";

$second_book = new Book();
$second_book->title = "Sara Stridsberg";
$second_book->author = "Darling River";
echo "Titel: $second_book->title <br>Författare: $second_book->author <br>";
```

4. 

```php
$second_book = new Book();
$second_book->title = "Sara Stridsberg";
$second_book->author = "Darling River";
echo "Titel: $second_book->title <br>Författare: $second_book->author <br>";
$second_book->title = "Drömfakulteten";
echo "Titel: $second_book->title <br>Författare: $second_book->author <br>";
```

5 .
```php
<?php

class Book {
  public $author;
  public $title;

  public printTitle(){
    // '$this' refers to each individual books title
    echo "<p>Titel: $this->title </p>";
  }
}
```
 
6 .

```php
class SingleBookLibrary {
  public $book;
  public $isBorrowed;

  public function borrow() {
    if( $this->isBorrowed ) {
      echo "Boken är redan utlånad.<br>";
    } else {
      echo "Boken var inte utlånad, det går bra att låna.<br>";
      $this->isBorrowed = true;
    }
  }
}
/** We must create both the book and the library for this to work
 * The library should just hold the values and check if they are correct
 * but we must also create an instance of a new book **/
$library = new SingleBookLibrary();
// Probably isn't borrown on open
$library->isBorrowed = false;

$new_book = new Book();
$book->title = "Främlingen";
$book->author = "Albert Camus";

$library->book = $new_book;

$library->borrow();
$library->borrow();
$library->borrow();
```

### Car


1 . 
```php
class Car {
    public $model;
    public $color;
    public $price;
}

$new_car = new Car();
$new_car->model = "Volvo";
$new_car->color = "Green";
$new_car->price = 500;
```

2 . 

```php
class Car {
    public $model;
    public $color;
    public $price;

    public function printInfo() {
      echo "Det här är en $this->color $this->model "
      . "som kostar $this->price kr.<br>";
    }
}

$new_car = new Car();
$new_car->model = "Volvo";
$new_car->color = "Green";
$new_car->price = 500;

$new_car->printInfo();

```

3 . 

```php
class Car {
    public $model;
    public $color;
    public $price;

    public function printInfo() {
      echo "Det här är en $this->color $this->model "
      . "som kostar $this->price kr.<br>";
    }

    public function halfPrice(){
      $this->price = $this->price / 2;
      echo "Skynda och köp! Enbart $this->price !";
    }
}
```

### Konstruktorer

1 . 
```php
class Book {
  public $title;
  public $author;

  public function __construct($title, $author) {
    $this->title = $title;
    $this->author = $author;
  }

$new_book = new Book("Främlingen", "Albert Camus");

```

2 . 

```php
class Car {
    public $model;
    public $color;
    public $price;
    public $sellDate;
  
    public function __construct($model, $color, $price) {
      $this->model = $model;
      $this->color = $color;
      $this->price = $price;
    }
}

$new_car = new Car("Volvo", "Green", 500);
```

3 . 

```php
class Car {
    public $model;
    public $color;
    public $price;
    public $sellDate;

    public function __construct($model, $color = "Green", $price = 500) {
      $this->model = $model;
      $this->color = $color;
      $this->price = $price;
      $this->sellDate = date();
    }
}

$new_car = new Car("Volvo", "Green");

```