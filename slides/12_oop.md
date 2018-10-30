## **Objektorienterad programmering**

---

* OOP bygger på att man skapar `classes` som fungerar som mallar för hur något ska se ut och fungera
* Utifrån dessa mallar så skapar vi **objekt** som är implementationen av mallen
* En ritning (`class`) beskriver hur t.ex. ett hus ska se ut men det är enbart när vi bygger huset som huset börjar existera

---

* En **funktion** grupperar och namnger en grupp av kod som "hör ihop"
* En **klass** grupperar och namnger variabler och funktioner som "hör ihop"
* Vad som "hör ihop" eller inte är OOPs stora problem

---

### En klass - en mall för ett objekt

```php
class Taco {
  public $bread;
  public $isVegan;
}
```

* `public` är hur "öppen" variablen är för resten av koden (åtkomst) och vi kommer återkomma till detta. Allting kommer till en början vara `public`

---

### Ett objekt - en variabel skapad av mallen

```php
// A class is called like a funktion but with the new keyword before
$nice_taco = new Taco();

$nice_taco->bread = "Soft tortilla";
$nice_taco->isVegan = true;

// Every taco has the same structure
$bad_taco = new Taco();

$bad_taco->bread = "Hard boat";
$bad_taco->isVegan = false;
```

---

* Ett nytt objekt skapas alltid av nyckelordet `new`
* En klass har använder alltid **PascalCase**: StorBokstavGenomHelaGrejen
* Funktioner som ligger inuti en klass kallas **metoder** (methods)
* Variabler som ligger inuti en klass kallas **egenskaper** (properties)
* Metoder och egenskaper använder **camelCase**

---

```php
class Taco {
  public $bread;
  public $isVegan;

  public function yoIsThisVegan(){
    echo $this->isVegan;
  }
}

$nice_taco = new Taco();
$nice_taco->isVegan = true;
$nice_taco->yoIsThisVegan(); // echos 'true'

```

---

* `$this` syftar på det individuella objektets egna värden när vi försöker komma åt dessa **inuti** klassen
* Eftersom vi kan ha miljoner tacos så måste varje taco hålla reda på sina egna värden.
* PHP håller själv redan på vad `$this` syftar på inuti ett skapat objekt, **varje objekt är unikt**.

---

* Gör gruppövningen `24_calculator.md`

---

## **Konstruktor**

---

* En konstruktor körs när objektet skapas, även om du inte definierar än
* En konstruktor tillåter en att köra kod och lägga till värden direkt när man skapar objektet utifrån klassen

---

```php
class Taco{
  public $bread;
  public $isVegan;
  
  public function __construct($bread, $isVegan)
  {
    $this->bread = $bread;
    $this->isVegan = $isVegan;
  }
}

$nice_taco = new Taco("Soft Tortilla", false);

```

---

* Värden som skickas in mellan paranteserna på `Taco` blir de parametrar som tas emot i `construct()`
* I det här fallet blir `"Soft Tortilla"` till `$bread` som sedan lagras i `$this->bread`, d.v.s. lagras i objektets `this`

---

## Default values

```php
class Taco{
  public $bread;
  public $isVegan;
  public $isEdible;
  
  public function __construct($bread, $isVegan = true)
  {
    $this->bread = $bread;
    $this->isVegan = $isVegan; 
    $this->isEdible = true;
  }
}

$nice_taco = new Taco("Soft Tortilla");

```