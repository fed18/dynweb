build-lists:true

# **Joins**

---

## Normalisering

* När man delar upp sina tabeller för att undvika duplicerad data, att data försvinner eller att data uppdateras olika
* Länkar olika tabeller via dess ID istället för att lägga allting i en och samma tabell

---

![inline](images/authors.png)

---

![inline](images/authors_books.png)

---

![inline](images/update_anomaly.png)

---

* Har vi separerat tabeller behöver vi dock lägga ihop dessa för att få all data
* Varje tabell ska ha en unik nyckel (**Primary Key**) som oftast är ett ID
* Man binder oftast samman tabellerna genom att länka deras ID mellan varandra

---

## **Joins**

---

* **CROSS**: Allting utgår från denna join
* **LEFT**: Behåller alla rader i "vänstra" tabellen
* **RIGHT**: Behåller alla rader i den "högra" tabellen

---

![inline](images/cross_join.png)

* Lägger ihop två tabeller i samtliga kombinationer 

---

![inline](images/inner_join.png)

---

![inline](images/right_join.png)

---

![inline](http://i.imgur.com/1m55Wqo.jpg)