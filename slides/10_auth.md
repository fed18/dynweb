build-lists: true

# **Auth**

---

* Lösenord får **aldrig** sparas i klartext
* Måste alltid krypteras med någon algoritm
* Typ rövarspråket: `orb` -> `ororbob`

---

* Oavsett algoritm så blir omvandlingen alltid densamma
* Samma input blir samma output: `hash` blir densamma
* Man måste slänga in en bit random på slutet: `salt`

---

## **hash** + `salt` = <br/> krypterat lösenord

---

```php
$original_password = "qwerty";
$hashed_password = password_hash($original_password);
```

* Det är `hashed_password` som sparas i databasen

---

## `password_verify` returnerar `true` eller `false`

```php
$original_password = "qwerty";
$hashed_password = password_hash($original_password);
$is_password_correct = password_verify($hashed_password, $original_password);

if($is_password_correct){
  // Password is correct
} else {
  // Password is wrong
}

```

---

* fältet **password** i tabellen måste vara minst 60 tecken långt (`varchar`)
* hashen är alltid väldigt mycket längre än det du skriver in
* När **password_verify** stämmer betyder det att vi vill lagra användarens email/användarnamn i `$_SESSION`

---

* Skapa en ny mapp i MAMP/htdocs
* Starta git: `git init`
* Göra commit: `git add` + `git commit`
