# Formulär, `GET`, `POST` & `SESSION`

Superglobalerna `$_POST` och `$_GET` håller sitt värde tills dess att vi laddar om sidan, men om vi vill hålla ett värde längre än så behöver vi något annat. Då tar vi stöd i sessioner.

* [**session_start()** @ _PHP.net_](http://php.net/manual/en/function.session-start.php)

Det är viktigt att känna till att `session_start();` måste finnas absolut högst upp i filen och **ingeting** förutom öppningstaggen för php får komma innan annars spårar PHP ur.

Det finns flera sätt att spara information om användaren, session är den enklaste. Alla sätt att spara information om användaren involverar både att spara i browsern och att spara någonting på server och att de måste kommunicera detta med varandra:

* Session	
  * Data sparas mellan php-filer/webbsidor. Data försvinner när användaren stänger webbläsaren eller vid en viss tid.
* Cookies / LocalStorage (JS) / Web storage (HTML5)
  * Data sparas på användarens dator. Vi har inte full kontroll över datan.
* Databas
  * Data sparas på en server som vi har kontroll över. Data kvarstår över tid.

## Lagra och hämta data i session

Som du kanske sett på php.net kan vi själva bestämma vad vi vill lagra i sessions-variabeln. Exempelvis kan vi skapa en användarrelaterad avdelning:

```php+HTML
<?php
// Always start the session, otherwise $_SESSION isn't available
session_start();

//$_SESSION is an ordinary associative array, we can store anything
$_SESSION["username"] = $_POST["userName"];
$_SESSION["userLevel"] = 42;

?>
```

```php+HTML
<?php
// In a completely different file, start session and echo the value
session_start();

echo $_SESSION["userLevel"] // "42"

?>
```



## Övningar

### Login

Skapa en html-sida med ett formulär (inloggning, lösenord) som skickar informationen till en valideringssida (skriven i php). Kontrollera att lösenord är av en viss längd, att nödvändiga fält är ifyllda och att det returneras ett meddelande om framgång eller motgång, samt ev övrig info som användaren behöver. Använd gärna css för att med färg markera om inloggningen gick bra eller dåligt.

**Om inloggningen gick bra så ska användarens användarnamn sparas i en session och vi ska kunna komma åt användarnamnet på vilken sida vi än befinner oss.**

### Paginering

Vi behöver inte ha något särskilt innehåll att visa, utan bara bygga upp ett skelett som består av tio _“sidor”_. Detta kommer egentligen vara en och samma sida (`index.php`) men den kommer att agera som att det är 10 olika sidor för att innehållet kommer att ändras.

Till detta behöver vi använda `$_GET` för att skicka med ett värde vid varje sidladdning.

Längst ner på sidan brukar pagineringen finnas, i form av länkar. Vi kan nöja oss med att visa fyra länkar “direkt”, dvs en på var sida om befintlig sida, samt en previous och next. Det bör se ut ungefär så här om vi är på sidan 6.

`Previous 4 5 6 7 8 Next`