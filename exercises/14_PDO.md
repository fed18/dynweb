# Databasuppkoppling

Inga övningar nedan mest en översikt över de funktioner vi ska använda för uppgiften.

* [**PDO @ PHP Delusions**](https://phpdelusions.net/pdo)
* [PHP.net: PDO construct](http://php.net/manual/en/pdo.construct.php)
* [PHP.net: PDO prepare](http://php.net/manual/en/pdo.prepare.php)
* [PHP.net: Superglobals](http://php.net/manual/en/language.variables.superglobals.php)
* [W3Schools - Prepared Statements](https://www.w3schools.com/php/php_mysql_prepared_statements.asp)

##### Skapa en `PDO` - uppkoppling till databasen

```php
/* Always check your own details for connecting
 * 'dbname' is the database, 'localhost' is MySQL in MAMP
 * 'charset' is to get the right encoding, åäö etc. */
$pdo = new PDO(
    "mysql:host=localhost;dbname=products;charset=utf8",
    "root", //user
    "root"  //password
);
```

##### Fetch Associative Array

```php
//Prepare a SQL-statement
$statement = $pdo->prepare("SELECT * FROM products");
//Execute it
$statement->execute();
//And fetch every row that it returns. $products is now an Associative array
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```

##### Post with parameters

```php
//:product_name is a placeholder for the value that we collect from the $_POST parameter
$statement = $pdo->prepare("SELECT * FROM products WHERE product_name = :product_name");
$statement->execute([
    ":product_name"     => $_POST["product_name"],
]);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```

## Delete from database

```php
//:name is a placeholder for the value that we collect from the $_POST parameter
$statement = $pdo->prepare("DELETE FROM products WHERE id = :id");
$statement->execute([
    ":id"     => $_POST["id"],
]);
//No need to fetch when doing delete as we are not collecting information
//we are just sending information to the database
```

## Insert into database

```php
/* The first parantheses are the columns you want to insert into. The second
 * parantheses are the placeholders for the values you want to insert. So the
 * statement isn't populated until the 'execute'-function runs. We don't need
 * to supply ID because that is created automatically.
 */
$statement = $pdo->prepare(
    "INSERT INTO products (product_name, price) 
    VALUES (:product_name, :price)"
);
/* 
 * In the execute statement you insert the actual values from your form submit. 
 * The argument to 'execute()' is an associative array. The keys are the 
 * placeholders from the prepared statement and the values are the ones from
 * the form
 */
$statement->execute([
    ":product_name"     => $_POST["product_name"],
    ":price"     => $_POST["price"],
]);
```

##### Pretty print

Använd för att få en snygg output på era arrayer. Ersätt `$your_variable` med namnet på den variabeln du hämtar.

```php
highlight_string("<?php =\n" . var_export($your_variable, true) . ";\n?>");
```


## Övningar

Använd samma databas som i föregående övningar (animals/cities) och visa upp samma information fast i PHP/HTML. Du ska alltså hämta all information med hjälp av PDO som ovan och sedan loopa ut den på sidan.

Några saker du kan testa:

* Gör så att man kan ändra sorteringen på listan genom att trycka på en knapp. Att sorteringen ska gå från ASC till DESC
* Går så att man via ett inputfält kan söka efter ett visst speciellt djur
* Gör så att man bara ser namnet på djuret i en lista, sedan när man trycker på en knapp som är kopplat till djuret så visas mer information om djuret.
* Skriv en SQL query som lagrar ett nytt djur i databasen via PDO, detta kan antingen hårdkodas in eller skickas in via ett eller flera input-fält
* Skriv en SQL query som tar bort ett visst djur från databasen via PDO