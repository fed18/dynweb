# Sessions

## `index.php`
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
	<title>PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!-- GET logout.php -->
	<a href="logout.php">Logout</a>
	<header>
		<h1><?= $_SESSION["username"]; ?></h1>
	</header>

	<h2>Reload index.php</h2>
	<form action="index.php" method="POST">
		<input type="text" name="username">
		<input type="submit">
	</form>

	<h2>Redirect</h2>
	<form action="redirect.php" method="POST">
		<input type="text" name="username">
		<input type="submit">
	</form>

	<?php
		if(isset($_POST["username"])){
			echo $_POST["username"];
		}
		?>

		<?php
		if(isset($_GET["error"])){
			echo $_GET["error"];
		}
		?>

</body>
</html>
```
### `redirect.php`

```php
<?php
session_start();

$_SESSION["username"] = "one_zero_cool";
$_SESSION["banan"] = "grön";

//$_SESSION["username"] = $_POST["username"];
header('Location: /index.php');

// SET HEADERS IN PHP
// Redirect to 'index.php'
// if(false){
//   header('Location: /index.php?error=Fel lösenord');
// } else {
//   header('Location: /profile.php');
// }

?>
```
### `logout.php`

```php
<?php
session_start();

session_destroy();

header('Location: /index.php');

?>
```

```php
<?php
session_start();

echo $_SESSION["username"];

?>
```
