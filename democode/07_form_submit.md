# Form submit

`index.php`
```html
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP</title>
</head>
<body>
	<!-- both action and method must exist -->
	<form action="/form_submit.php" method="POST">
		<label for="username">Username</label>
		<input id="username" name="username" type="text" placeholder="Username">
		<label for="password">Password</label>
		<input id="password" name="password" type="password" placeholder="Minimum length: 8 chars">
		<input type="submit" value="Logga in">
	</form>

	<a href="form_submit.php?username=jesper&age=62">Visit me please!</a>

</body>
</html>
```

`form_submit.php`
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
  <h2><?php echo $_POST["username"]; ?></h2>
  <h2><?= $_POST["password"]; ?></h2>

  <?php
    echo $_GET["username"];
  ?>
</body>
</html>
```