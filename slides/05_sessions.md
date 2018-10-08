# Sessions

---



`$_SESSION`

* I sessionsvariabeln kan vi lagra information som ska vara under en längre tid

* En session håller data när du går till en annan sida.

* Lagras på servern och i browsern men inte i databasen.

---

När en session startas i PHP

* Skapas ett unikt ID för sessionen
* Detta ID skickas med vid varje förfrågan
* I webbläsaren sparas en _cookie_ som innehåller detta ID.
* Om förfrågan skickar med IDt från webbläsaren och detta ID finns i PHP så har vi synkat

---

Sessionen måste alltid startas

```php
session_start();
$_SESSION["username"] = "ne_cool";
```

---

Undvik varningar genom att kolla om sessionen redan är startad

```php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
```

---

Ta bort värden ur session

```php
unset($_SESSION["username"])

session_destroy();
```

---

Lägg alltid `session_start()` längst upp i filen, direkt efter `<?php`-taggen

```php
<?php
session_start();

// Other stuff
```

