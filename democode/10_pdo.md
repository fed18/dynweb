
`index.php`
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <form action="search.php" method="POST">
    <input type="text" name="product_name">
    <input type="submit" value="Sök">
  </form>
    
</body>
</html>
```

`search.php`
```php
<?php

include 'database_connection.php';

$statement = $pdo->prepare("SELECT * FROM products 
    WHERE product_name = :productis");
$statement->execute([":productis" => $_POST["product_name"]]);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
    
foreach($products as $single_product): ?>
    <div><h2><?= $single_product["product_name"]; ?></h2></div>
<?php endforeach; ?>

```

`database_connection.php`

```php
<?php

$pdo = new PDO(
      "mysql:host=localhost;dbname=fed18;charset=utf8",
      "root",
      "root"
);
```