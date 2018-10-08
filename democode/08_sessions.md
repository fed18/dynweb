# Sessions

## `index.php`
```php
<?php
/** starting the session should be the first thing
 * we do, this is not bound to setting any values
 * in the session, this only starts the session
 */
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
	<!-- GET logout.php, this will send a GET request
	     to the file logout.php, this is the same as
			 sending a form but an a-tag will always
			 send a GET-request, this is fine if we don't
			 want to send any form data, this is because the
			 logout.php-file doesn't handle any user data -->
	<a href="logout.php">Logout</a>
	<header>
		<!-- Usually with session variables we want to
				 check if the key is set before we echo it
				 to avoid warnings. we can use the alternative
				 if syntax -->
		<?php if(isset($_SESSION["username"])) : ?>
			<h1>Username: <?= $_SESSION["username"]; ?></h1>
		<?php endif; ?>
	</header>

	<h2>Reload index.php</h2>
	<!-- Call the file 'index.php' which is the same file
			 that we are currently in. This means that if we
			 submit this form we will have $_POST["username"]
			 in this file === reloading page with new information
	 -->
	<form action="index.php" method="POST" class="form">
		<label for="username" class="form__label">Username</label>
		<input id="username" type="text" name="username" class="form__input">
		<input type="submit" class="form__submit">
	</form>

	<h2>Redirect</h2>
	<!-- Call the file 'redirect.php' and send along some form
			 data, in this case we will get $_POST["username"] -->
	<form action="redirect.php" method="POST" class="form">
		<label for="username" class="form__label">Username</label>
		<input id="username" type="text" name="username" class="form__input">
		<input type="submit" class="form__submit">
	</form>

	<?php
		/**
		 * Be sure to check if the value exists. If we visit 
		 * the page via a form submit we will get the $_POST
		 * value, if we visit the page via URL we will not
		 * have this username value
		 */
		if(isset($_POST["username"])){
			echo $_POST["username"];
		}
		?>
		
		<?php
		/**
		 * If we have the following URL:
		 * http://localhost/index.php?error=my error message
		 * this message will get printed to the user
		 * 'error' is the variable name, and 'my error message'
		 * is what will be printed to the user. Because we can
		 * change the URL we need to check that the variable
		 * exists in the code
		 */
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
// always start the session if you are going to use it
session_start();

/**
 * $_SESSION is an associative array that can contain
 * any values we want. In this case we are setting our
 * username to a hardcoded value and an banan to be green
 */
$_SESSION["username"] = "one_zero_cool";
$_SESSION["banan"] = "grön";

/* If we want to use the form-values from the form in
 * index.php we must save the values from $_POST into $_SESSION
 * $_SESSION["username"] = $_POST["username"]; 
 * Redirect when we are done setting the username */
header('Location: /index.php');

// SET HEADERS IN PHP
// Redirect to 'index.php' with an error message
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
//To stop a session we must first start it
session_start();

// this destroys every variable in session
session_destroy();

/* When we are done destroying the values in the session
 * we want to redirect back to the first page*/
header('Location: /index.php');

?>
```

```php
<?php
session_start();

echo $_SESSION["username"];

?>
```

## `style.css`

```css
body {
  margin: 0;
  width: 100vw;
  height: 100vh;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: #444;
  background-color: #f0f0f0;
}

*, *::before, *::after {
  box-sizing: border-box;
}

form * {
  display: block;
}

main {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 3rem;
}

.form {
  margin: 0 auto 3rem auto;
  padding: 2rem;
  background-color: #fff;
  display: flex;
  flex-direction: column;
  box-shadow: 0 0 1rem rgba(0,0,0,.1);
  border-radius: .5rem;
}

.form__label, .form__input {
  margin-bottom: 1rem;
}

.form__label {
  font-weight: 700;
}

.form__input {
  font-size: 1.25em;
  transition: all 0.30s ease-in-out;
  outline: none;
  padding:  1rem;
  margin-bottom: 1rem;
  border: 1px solid #bbb;
  border-top: 1px solid #999;
  border-radius: .25rem;
  box-shadow: inset 0 1px 2px rgba(0,0,0,.2)
}
 
.form__input:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  border: 1px solid rgba(81, 203, 238, 1);
  border-radius: .25rem;
}

.form__input:disabled, .form__submit:disabled {
  cursor: not-allowed;
  color: lightgrey;
  background-color: lightgrey;
  border-radius: .25rem;
}

.form__submit {
  cursor: pointer;
  border: none;
  font-size: 1em;
  padding: 1rem 1.5rem;
  margin: 1rem;
  box-shadow: 1px 2px 6px 0 rgba(0,0,0,0.2);
  background-color:#005450;
  color: #fff;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
  font-weight: 700;
  border-radius: .25rem;
  transition: all 300ms;
}

.form__submit:hover {
  transform: translateY(-1px);
  box-shadow: 0 0 16px rgba(0,0,0,0.2);
  background-color: #008a83;
}
```