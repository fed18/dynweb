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

```php
<?php
// Always start the session, otherwise $_SESSION isn't available
session_start();

//$_SESSION is an ordinary associative array, we can store anything
$_SESSION["username"] = $_POST["userName"];
$_SESSION["userLevel"] = 42;

?>
```

```php
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


## Lösningsförslag

### Login

#### Ahnna

`index.php`
```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <?php if(isset($_GET["error"])){ ?>
      
    <style>
    	#password, #usersname{
        background-color: red
			}
		</style>
        
		<?php } ?>
		
</head>
<body>
    <form action="login_submit.php" method="POST">
         <label for="usersname">Name</label>
         <input id="usersname" name="usersname" type="text" placeholder="usersname">
         <label for="password">Password</label>
         <input id="password" name="password" type="text">
         <input type="submit" value="Submit">
    </form>
    
    <?php if(isset($_GET["error"])) {
        echo ($_GET["error"]);
    } ?>
    
    
</body>
</html>
```

---

`form_submit.php`
```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body{
            background-color: yellow;
        }    
    </style>
</head>
<body>
<?php
    
    if(strlen($_POST["usersname"]) < 6 && strlen($_POST["password"]) < 6){
        header('Location: login_ovn.php?error=Both username and password must be longer than 6 characters.');
    } else if(strlen($_POST["password"]) < 6){
        header('Location: login_ovn.php?error=Password must be longer than 6 characters.');
    } else if(strlen($_POST["usersname"]) < 6){
        header('Location: login_ovn.php?error=Username must be longer than 6 characters.');
    }
?>
</body>
</html>
```

#### Melker

`index.php`
```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>My Website</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	</head>
<body>

<form action="form.php" method ="POST">
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
if (isset ($_SESSION["username"])){
echo 'Du är inloggad som: ' . $_SESSION["username"];
                            }
?>
<br>
<a href="logout.php">Logout</a>

</body>
</html>
```

---

`form.php`
```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>My Website</title>
	</head>
<body>

<?php

if (isset($_POST["username"]) && ($_POST ["username"] == true) && ($_POST ["password"] == true))
{
             
	if (isset($_POST["password"]) && strlen ($_POST ["password"]) > 8){
		$_SESSION["username"] = $_POST ["username"];
		echo 'Hej ' . $_POST["username"];
		echo ' inloggningen gick bra!';
		echo '<style> body {background-color: lightgreen;} </style>';
	}
	else {
		echo 'Password needs to be at least 8 characters';
	}
    
} else {
	echo 'Both fields requieres input ';
} 
    
    
?>
<br>
<a href="index.php">Return to index</a>

</body>
</html>
```

---

`logout.php`
```php
<?php
session_start();

session_destroy();

header('Location: /sessions/index.php');

?>
```

#### Lukas

`index.php`
```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">Log out</a>
    <form action="login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username"/>
        <label for="password">Password</label>
        <input type="text" name="password"/>
        <input type="submit" value="skicka"/>
    </form>
    <?= $_SESSION["username"]?>
</body>
</html> 
```

---

`login.php`
```php
<?php
session_start();
​
if(isset($_POST["username"]) && strlen($_POST["username"])>3){
  if(strlen($_POST["password"])>=3 && strlen($_POST["password"])<=12){
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    echo "<h2>Success!</h2><br><a href='sessions.php'>Return to site</a>";
  }else{
    echo "error: password must be between 3 and 12 characters<br><a href='/sessions.php'>Return</a>";
  }
}else{
  echo "error: username must be between 3 and 12 characters<br><a href='/sessions.php'>Return</a>";
}
?>
```

---

`logout.php`
```php
<?php
session_start();
session_destroy();
header('Location: /sessions.php');
?>
```

### Paginering

```php
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav>
		<a href="index.php?page=1">1</a>
		<a href="index.php?page=2">2</a>
		<a href="index.php?page=3">3</a>
		<a href="index.php?page=4">4</a>
	</nav>
	
	<main>
		<?php
			if(isset($_GET["page"])){

				$current_page = (int)$_GET["page"];
				
				if($current_page === 1){
					echo "Sida 1";
				}
				if($current_page === 2){
					echo "Sida 2";
				}

				if($current_page === 3){
					echo "Sida 3";
				}

				if($current_page === 4){
					echo "Sida 3";
				}
		}
		?>
	</main>
</body>
</html>
```