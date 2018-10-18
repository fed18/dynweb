build-lists: true

# CRUD

---

* CREATE 
* READ
* UPDATE
* DELETE

---

* `GET` (READ)
* `POST` (CREATE, UPDATE, DELETE)

* Allting som modifierar databasen sker oftast via POST och allting som bara hämtar data sker oftast via GET
* I vissa fall använder vi GET & POST i kombination

---

### CREATE (INSERT)

```sql
INSERT INTO products (product_name, price) 
VALUES ("Kotte 2000", 10)
```

---

### UPDATE (UPDATE)

```sql
UPDATE products
SET product_name = "Kotte 9000", price = 20
WHERE product_name = "Kotte 2000"
```

---

### DELETE (DELETE)

```sql
DELETE FROM products
WHERE product_name = "Kotte 9000"
```

---

# PDO

---

* _SQL_ kan kopplas till vilket språk som helst
* Vi behöver en adapter till just PHP: **PDO**
* **Förbjudet** att använda: `mysql_connect`/`mysqli_connect`

---

[.code-highlight: none]
[.code-highlight: 1]
[.code-highlight: 2]
[.code-highlight: 3]
[.code-highlight: 4]
[.code-highlight: all]

* Skapa en uppkoppling och lagra denna i en variabel. Du måste ha variabeln överallt där du ska använda databasen i din kod

```php
$pdo = new PDO(
  "mysql:host=localhost;dbname=products;charset=utf8",
  "root",
  "root"
);
```

* Ditt användarnamn och lösenord finns på **Open WebStart Page**, förstasidan.

---

[.code-highlight: none]
[.code-highlight: 2]
[.code-highlight: 4]
[.code-highlight: 6]
[.code-highlight: all]

* Vi vill göra samma kommandon som tidigare fast överföra informationen till någon PHP kan läsa

```php
//Prepare a SQL-statement, this will get run but not yet
$statement = $pdo->prepare("SELECT * FROM products");
//Execute it, run the SQL-command
$statement->execute();
//After executing it we must decide how to save the information
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```

---
[.code-highlight: none]
[.code-highlight: 2]
[.code-highlight: 4]
[.code-highlight: 6]
[.code-highlight: all]

```php
//Prepare a SQL-statement, this will get run but not yet
$statement = $pdo->prepare("SELECT * FROM products WHERE product_name = :name");
//Execute it, run the SQL-command
$statement->execute([":name" => "Kotte"]);
//After executing it we must decide how to save the information
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```

* `:name` betyder placeholder, det ska sättas in ett värde där, tillfällig variabel

---

[.code-highlight: none]
[.code-highlight: 2]
[.code-highlight: 4]
[.code-highlight: 6]
[.code-highlight: all]

```php
//Prepare a SQL-statement, this will get run but not yet
$statement = $pdo->prepare("
  INSERT INTO products (product_name, price)
  VALUES (:name, :price)"
);
//Execute it, run the SQL-command
$statement->execute([":name" => "Kotte", ":price" => 999]);
//After executing it we must decide how to save the information
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```

* `:name` betyder placeholder, det ska sättas in ett värde där, tillfällig variabel

---

* `prepare`-funktionen är kopplad till `$pdo`
* `execute`-funktionen är kopplad till `$statement` som du skapar med `prepare`
* `fetch`/`fetchAll` är kopplat till `$statement` som du skapar med `prepare`

---

# Demo

---

# Rast
# Övningar
