# Auth

> Dessa filer måste vi ha för att kunna skapa en användare och logga in. Antingen se till så att du får autentiseringsflödet att fungera på din dator. Bygg gärna vidare på implementationen när du har fått det att fungera, t.ex. fixa bättre errorhantering så att vi vet att inloggingen misslyckats.


## Länkar

* [http://php.net/manual/en/function.password-verify.php](http://php.net/manual/en/function.password-verify.php)
* [http://php.net/manual/en/function.password-hash.php](http://php.net/manual/en/function.password-hash.php)

## Filer

`register.php`
```php
$pdo = new PDO(
  "mysql:host=localhost;dbname=fed18;charset=utf8",
  "root",
  "root"
);

/**
 * Saving the post variables for easier referencing and better overlook
 * we must hash the password before we save it to the database
 */
$password = $_POST["password"];
$username = $_POST["username"];
$hashed_password = password_hash($password);

$statement = $pdo->prepare("INSERT INTO users (username, password)
  VALUES (:username, :password)");
$statement->execute([
  ":username" => $username,
  ":password" => $hashed_password
]);

// Redirect somewhere when done with insert
header('Location: index.php');
```

`login.php`
```php
$pdo = new PDO(
  "mysql:host=localhost;dbname=fed18;charset=utf8",
  "root",
  "root"
);

$password = $_POST["password"];
$username = $_POST["username"];

/**
 * Use the user submitted username and search the database for the user,
 * use fetch to return one user, we will use the information in the database
 * to check if the password submitted by the user is right and that the user exists
 */
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->execute([
  ":username" => $username
]);
$fetched_user = $statement->fetch();

/**
 * first argument to 'password_verify' is the password that the user submitted 
 * in the form, the second argument is the user stored in the databse, if these
 * are the same password_verify will return true, otherwise false
 */
$password_correct = password_verify($password, $fetched_user["password"])

/**
 * Decide on action if the password is correct, probably want to save
 * the user that logged in in session so we know which user has logged
 * in on all pages in the application
 */
if($password_correct){
  $_SESSION["username"] = $fetched_user["username"];
  header('Location: index.php');
} else {
  // Otherwise redirect with error message, password incorrect
  header('Location: index.php?error=true');
}
```