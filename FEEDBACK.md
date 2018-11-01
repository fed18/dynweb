# Generell feedback gällande inlämningsuppgifter

## Indentering

Tänk på att ha ett bra flöde i koden och att indenteringen är rätt. Det ska vara som att läsa en bra bok. Observera indenteringen vid varje kodblock nedan. Varje ny `if`-sats eller `foreach`-loop skapar en ny nivå av indentering. Ha inte heller alldeles för luftigt mellan de olika kodblocken.

```php
$list_of_strings = ["Hej", "Hej igen", "Hej ytterligare en gång"];
foreach($list_strings as $string) {
  if(strlen($string) < 5) {
    echo $string;
  }
}
```

Detsamma gäller när vi blandar ren HTML med PHP, försök att följa vattenfallet:

```php
$list_of_strings = ["Hej", "Hej igen", "Hej ytterligare en gång"];
foreach($list_strings as $string): 
   if(strlen($string) < 5): ?>
     <div>
       <p> <?= $string ?> </p>
     </div
   <?php endif; ?>
<?php endforeach; ?>
```

Om det blir mycket HTML-kod så plocka gärna ut HTML-koden i en `include/require`

```html
<!-- card.php -->
<div>
  <p> <?= $string ?> </p>
</div
```

```php
$list_of_strings = ["Hej", "Hej igen", "Hej ytterligare en gång"];
foreach($list_strings as $string) {
   if(strlen($string) < 5) {
      include 'card.php`
   }
}
```

## Variabelnamn och funktionsnamn

Var inte rädd för att skriva ut långa och beskrivande variabelnamn och undvik att förkorta saker. Det kan vara tydligt för dig men det är alltid fler personer som ska läsa koden och då är det bättre att vara tydlig än kort. Undvik också att använda siffror och tecken som inte betyder något. Detta är rätt subjektivt dock, jag gillar att göra det på detta sätt. Nedan behöver absolut inte vara det bästa sättet att göra detta på men jag tycker det ger lite mer överblick över vad som händer.

```php
$st1 = $pdo->prepare("SELECT * FROM users");
$st1->execute();
$users = $st1->fetchAll();
$st2 = $pdo->prepare("SELECT * FROM posts");
$st2->execute();
$posts = $st2->fetchAll();

//Compare with

$select_all_users_statement = $pdo->prepare("SELECT * FROM users");
$select_all_users_statement->execute();
$all_users = $select_all_users_statement->fetchAll();
$select_all_posts_statement = $pdo->prepare("SELECT * FROM posts");
$select_all_post_statement->execute();
$all_posts = $select_all_posts_statement->fetchAll();
```

## Casing

Förhåll dig till samma casing (`snake_case`, `camelCase`) genomgående. Egentligen säger *code standards* för PHP att samtliga funktioner ska vara `snake_case`. ([PSR-1-basic-coding-standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md) samt [PSR-2-coding-style-guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)). Detta kommer dock variera beroende på programmeringsspråk, inte minst när vi kommer till JavaScript. Det viktiga är att du använder samma casing konsekvent.

## Kommentarer

Om du har skrivit en funktion som förklarar rätt bra vad funktionen gör eller skrivit en variabel som är självförklarande behöver du oftast inte kommentera vad funktionen faktiskt gör. T.ex. se exemplet nedan. Här kan vi snabbt lista ut att alla användare ligger i variabeln `$all_users` och funktionen `fetch_all_users` hämtar alla användaren. Håll dig till ett och samma verb, börja inte blanda så att en funktion heter t.ex. `fetch_all_users` och en annan heter `get_all_posts`. Var konsekvent.

```php
$all_users = fetch_all_users();
```

Men ibland skriver vi kod som inte förklarar sig själv. Vi måste göra någon konstig `if`-sats som inte går att komma runt. `if`-satsen blir också ganska svårtydlig. Vi är heller kanske inte riktigt säkra på varför den behövs eller att det är en tillfällig fix för att lösa det riktiga problemet. Exemplet nedan kan vi ganska snabbt förstå vad det gör, men kanske inte varför det är där från första början.

```php
/* Sometimes when editing a post the title gets set to empty string. This is a way to handle that
 * scenario. We need to check what is causing the title to get set to empty but for now this code is
 * required */
if(check_empty($_GET["title"])){
   // handle error
}
```

Kommentera dels för dig själv eftersom **du kommer att glömma bort att du har skrivit viss kod**. Kommentera också dels för att ge information till dina gruppmedlemmar. Förklarande kommentarer gör så att mindre förvirring uppstår **samt** att det ger ett tillfälle att lära dina gruppmedlemmar den kunskapen du själv besitter.

## Separera logik och design

Man brukar prata om att man har ett **[MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)**-mönster i applikationer. Detta betyder Model-View-Controller. Vi kan plocka ut de viktigaste begreppen här och applicera det på vår PHP-kod. **Modell** är den logiken som kommunicerar med databasen, tänk era _SQL_-statement. **View** är det vi ser utåt, tänk er _HTML_. Best practice är oftast att seperara modellen och viewn ifrån varandra. På det sättet kan man lättare byta ut olika delar och refaktorera delar av applikationen utan att den går sönder. Mycket tack vare att alla delar är löst kopplade till varandra. Exemplet nedan är inte ett strikt MVC-mönster men det är gjort för att efterapa den strukturen.

Lägg de logiska delarna, de delar som oftast hanterar _SQL_, i separata filer som bara har hand om att en uppgift. Man brukar prata om [Separation of Concerns](https://en.wikipedia.org/wiki/Separation_of_concerns) där var sak har sin uppgift. I PHP kan vi göra det på liknande sätt. Observera att det här är inte det absoluta sättet utan enbart ett sätt att dela upp det så att varje fil har sin egen uppgift.

```php
<?php
//fetch_all_users.php
require 'database.php';
$fetch_all_users_statement = $pdo->prepare("SELECT * FROM users");
$fetch_all_users_statement->execute();
$all_users = $fetch_all_users_statement->fetchAll(PDO::FETCH_ASSOC);
```

```php
<?php
//list_all_users.php
<div>
  <?php foreach($all_users as $user): ?>
    <p> <?= $user["first_name"] ?> </p>
  <?php endforeach; ?>
<div>
```

```php
<?php
//users_page.php
include 'fetch_all_users';
include 'list_all_users';
```
