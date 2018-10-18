build-lists: true
# SQL

---

* _S_tructured _Q_uery _L_anguage
* _SQL_ är en typ av databas och ett språk för att hämta data från denna databas
* _SQL_ har olika dialekter, vi ska använda **MySQL**

---
# **_Query_**
> A question, especially one expressing doubt or requesting information.

* Vi ställer frågor och får svar, detsamma gäller med HTTP: Vi gör en GET-förfrågan och får en annan PHP-sida som svar

---

![inline](https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2014/08/1409261668002.png)

---

| **product_name**                  | **price**   |
|---|---|
| Kotte                 | 10      |
| Inte kotte            | 0       | 
| Kotte (Svenskt Tenn)  | 99999   |

* Ett avancerat excel-blad
* Kolumner och rader

---

* _phpMyAdmin_ är ett grafiskt gränssnitt till att jobba med vår MySQL-databas
* Så att vi slipper koda allt för hand och kunna trycka på knappar istället
* **Open WebStart Page** > **Tools** > **phpMyAdmin**

---

* För att hämta data använder vi `SELECT`
* `SELECT` modifierar ALDRIG informationen i databasen
* När vi hämtar informationen kan vi formattera om den men det betyder inte att informationen i databasen är ändrad

---

* Hämta allt (product_name, price) för alla värden från tabellen `products`

```sql
SELECT * FROM products
```

* Hämta bara `product_name` från tabellen `products`

```sql
SELECT product_name FROM products
```

* Hämta `product_name` och `price` från tabellen products

```sql
SELECT product_name, price FROM products
```

---
* Hämtar bara produkter som heter _"Kotte"_

```sql
SELECT * FROM products WHERE name = "Kotte"
```

* Hämta bara produkter som börjar på _"K"_ (% kan vara vad som helst)

```sql
SELECT * FROM products WHERE product_name LIKE "K%"
```

* Sorterar alla produkter när vi hämtar dom (ASC/DESC)

```sql
SELECT * FROM products ORDER BY product_name ASC
```

---

# Demo

---

# Övningar
