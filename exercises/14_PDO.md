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


## Lösningsförslag

### Sortering

```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sorting</title>
</head>
<body>
  
  <!-- Sending a GET-request to the same page with extra
       query parameters depending on which link we have clicked
       we either send the order of ASC or DESC as an argument
       that will be used in the if-statement further down  -->
  <a href="index.php?order=ASC">ASC</a>
  <a href="index.php?order=DESC">DESC</a>

  <?php

  $pdo = new PDO(
      "mysql:host=localhost;dbname=fed18;charset=utf8",
      "root",
      "root"
  );
  /**
   * We only have to options, either the $_GET["order] (?order=) will
   * contain ASC or DESC and we can choose to prepare different statements
   * depending on the case. We cannot use ASC or DESC in placeholders
   * unfortunately
   */
  if($_GET["order"] === "ASC"){
    $statement = $pdo->prepare("SELECT * FROM animals ORDER BY animal ASC");
  } else {
    $statement = $pdo->prepare("SELECT * FROM animals ORDER BY animal DESC");
  }
  /**
   * Independent of which order we want we still need to execute the statement
   * and send the SQL query to the database.
   */
  $statement->execute();
  /**
   * Because we are expecting multiple rows to be returns because we have not
   * specificed a single animal we need to use fetchAll(). We also need to specify
   * that we want the table formatted as an associative array. We save the result
   * in the variable '$animals'
   */
  $animals = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  /**
   * Loop the array as usual "animal" is the column name
   * use var_dump($animals) if you are unsure of what you can echo 
   * to the page 
   */
  foreach($animals as $animal): ?>
      <div><h2><?= $animal["animal"]; ?></h2></div>
  <?php 
  endforeach;
  ?>
</body>
</html>
```

### Search

```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search</title>
</head>
<body>
  <!-- Form is submitted to index.php which is the same page
       that we are on right now. We are only populating
       $_POST["search"] with this form -->
  <form action="index.php" method="POST">
    <label for="search">Search</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Search">
  </form>

  <?php
  $pdo = new PDO(
    "mysql:host=localhost;dbname=fed18;charset=utf8",
    "root",
    "root"
  );
  /**
   * We are submitting a form to index.php with an input with the name 'search'
   * so we can use this value in the SQL query. We need a placeholder for the 
   * name we will search for. When we execute the query we supply the prepared
   * statement with a search value
   */
  $statement = $pdo->prepare("SELECT * FROM animals WHERE animal = :search");
  $statement->execute(["search" => $_POST["search"]]);
  /**
   * Because we are expecting multiple rows to be returns because we have not
   * specificed a single animal we need to use fetchAll(). We also need to specify
   * that we want the table formatted as an associative array. We save the result
   * in the variable '$animals'
   */
  $animals = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  /**
   * Loop the array as usual "animal" is the column name
   * use var_dump($animals) if you are unsure of what you can echo 
   * to the page. If the length of the array from the query is 
   * bigger than 0 we have gotten a result. If the response is 0 length
   * we have not found an exact match and we can choose to display the
   * "No match" paragraph
   */
  if(count($animals)):
    foreach($animals as $animal): ?>
        <div>
          <h2><?= $animal["animal"]; ?></h2>
          <p><?= $animal["color"]; ?></p>
        </div>
    <?php 
    endforeach;
  else: ?>
    <p>No match</p>
  <?php endif;?>
</body>
</html>
```

### Insert animal

`index.php`
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add new animal</title>
</head>
<body>
  
  <form action="add_new_animal.php" method="POST">
    <label for="animal">Animal</label>
    <input type="text" name="animal" id="animal">
    <label for="color">Color</label>
    <input type="text" name="color" id="color">
    <label for="weight">Weigth</label>
    <input type="text" name="weight" id="weight">
    <label for="born">Born</label>
    <input type="date" name="born" id="born">
    <input type="submit" value="Add animal">
  </form>

  <?php

  $pdo = new PDO(
    "mysql:host=localhost;dbname=fed18;charset=utf8",
    "root",
    "root"
  );

  /**
   * We can fetch all the animals and loop em out if we want to see
   * the newly added animal directly
   */
  $statement = $pdo->prepare("SELECT * FROM animals");
  $statement->execute();
  $animals = $statement->fetchAll(PDO::FETCH_ASSOC);
    
  foreach($animals as $single_animal): ?>
      <div><h2><?= $single_animal["animal"]; ?></h2></div>
  <?php endforeach; ?>
</body>
</html>
```

`add_new_animal.php`
```php
<?php

$pdo = new PDO(
  "mysql:host=localhost;dbname=fed18;charset=utf8",
  "root",
  "root"
);
/**
 * The form on 'index.php' has four input fields with the corresponding names
 * INSERT INTO tablename followed by the columns that we want to insert into
 * followed by the keyword VALUES. The values are not specificed in the prepared
 * statement, we only supply placeholders for these values. These values
 * are then filled out when we execute the query. We fill these placeholder values
 * with the values from $_POST which are being sent with the form on 'index.php'
 */
$statement = $pdo->prepare("INSERT INTO animals (animal, color, weight, born)
VALUES (:animal, :color, :weight, :born)");
$statement->execute([
  ":animal" => $_POST["animal"],
  ":color"  => $_POST["color"],
  ":weight" => $_POST["weight"],
  ":born"   => $_POST["born"],
]);

/**
 * This file has now filled its purpose, it should only insert into the database and the
 * move on to a new file. In this case we are redirecting to the index-php again
 * because index will fetch all the animals anew and the new animal will be there
 */
header('Location: index.php');
```

### Remove animal

`index.php`
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Remove animal</title>
</head>
<body>

  <?php

  $pdo = new PDO(
    "mysql:host=localhost;dbname=fed18;charset=utf8",
    "root",
    "root"
  );

  /**
   * We can fetch all the animals and loop em out if we want to see
   * the newly added animal directly
   */
  $statement = $pdo->prepare("SELECT * FROM animals");
  $statement->execute();
  $animals = $statement->fetchAll(PDO::FETCH_ASSOC);
    
  foreach($animals as $single_animal): ?>
      <div><h2><?= $single_animal["animal"]; ?></h2></div>
      <!-- If we click the link we will get navigated to 'remove_animal.php' and
           we are also populating the $_GET variable by sending a variable
           after the question mark. The value of 'animal' will be different depending
           on which link we have clicked because we are looping through and creating
           a link for each animal. -->
      <a href="remove_animal.php?animal=<?= $single_animal["animal"]; ?>">Remove animal</a>
  <?php endforeach; ?>
</body>
</html>
```

`remove_animal.php`
```php
<?php

$pdo = new PDO(
  "mysql:host=localhost;dbname=fed18;charset=utf8",
  "root",
  "root"
);
/**
 * We navigate to this file by clicking a link to the file with a search query:
 * remove_animal.php?animal=cat
 * The value of the animal differs depending on which link we click. The value
 * is created by looping through each animal in 'index.php'
 */
$statement = $pdo->prepare("DELETE FROM animals WHERE animal = :animal");
$statement->execute([
  ":animal" => $_GET["animal"]
]);

/**
 * This file has now filled its purpose, it should only insert into the database and the
 * move on to a new file. In this case we are redirecting to the index-php again
 * because index will fetch all the animals anew and the new animal will be there
 */
header('Location: index.php');
```