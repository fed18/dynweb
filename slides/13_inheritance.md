# Arv

---

* elephant (specifik) 
* mammal(däggdjur) (mer allmän) 
* animal (mest allmän)

Allt som `mammal` kan kan även `elephant`

---

### Nyckelordet `extends`

```php
class Animal
{
  public function speak()
  {
    echo "I change shapes just to hide in this place";
  }
}

class Elephant extends Animal
{

}
```

---

### ACCESS

* `public`: default, öppet för alla
* `private`: kan enbart användas av klassen
* `protected`: kan användas av klassen och subklasser

---

### Access modifier: `protected`

* Egenskapen/metoden kan kommas åt den egna klassen samt utav av alla barnklasser
* Men inte av andra klasser som inte ärver av klassen eller utanför klasserna

---

```php
class A {
  public $first = 1;
  protected $second = 2;
  private $third = 3;
}

class B extends A {
  public function whatWillHappen() {
    echo $this->first;
    echo $this->second;
    echo $this->third;
  }
}

```

---

```php
class A {
  public $first = 1;
  protected $second = 2;
  private $third = 3;
}

class B extends A {
  public function whatWillHappen() {
    echo $this->first;  // public! open for everyone!
    echo $this->second; // protected! Still open for B
    echo $this->third;  // private! FATAL ERROR
  }
}
```

---

## **Interfaces**

---

* Ett interface är enbart ett **kontrakt**
* En klass behöver inte vara en subklass men ska ändå uppnå vissa kriterer och ärva vissa drag
* Då vill du använda ett interface

---

```php
interface ICanJump {
  public function jump();
}

class Cat implements ICanJump {
  public function jump() {
    echo "Mjau jump";
   }
}

class Human implements CanJumpInterface {
  public function jump() {
    echo "Ooga ooga jump";
  }
}
```

---

* Ett interface säger inte hur kod ska skrivas
* Ett interface säger bara att vissa egenskaper och metoder **måste** finnas
* Försäkra oss om att vi jobbar utifrån samma struktur
