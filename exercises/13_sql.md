## SQL

## Länkar

* [**W3Schools.com - SQL**](https://www.w3schools.com/sql/default.asp)
    * Översikt över de vanligaste kommandona   
* [**CodeAcademy - Learn SQL**](https://www.codecademy.com/learn/learn-sql)
    * Interaktiv tutorial för att läsa sig SQL
* https://github.com/treehouse/cheatsheets/blob/master/sql_basics/cheatsheet.md


## Instruktioner

**Nedan skapar jag databasen som används till första övningen**

Skapa en ny databas genom att trycka på **New** i menyn till vänster. Skriv sedan in ett namn på vad du vill döpa tabellen till följt av vilken _charset_ som ska användas. Använd *utf8_swedish_ci* eller *utf8_general_ci* och tryck sedan **Create**.

![Create database](https://i.imgur.com/uu3aUOf.png)

Databasen borde komma upp i sidolistan till vänster som bilden nedan.

![Sidebar](https://i.imgur.com/fLYbf2B.png)

Klicka på tabellen i listan så borde du komma till följande vy. Skapa en tabell och döp den till vad du vill, t.ex. Animals och tryck på **GO**. Du kan ändra antalet kolumner om du vill men just nu ska vi använda 4 st.

![Create table](https://i.imgur.com/RgWSD5A.png)

För första tabellen som vi ska skapa borde det vara följande inställningar. För typerna **VARCHAR** måste vi ställa in en längd. Resten av fälten behöver vi bara döpa och sätta en typ på. När du har skrivit in samma som nedan. Tryck sedan på **SAVE**.

![Save structure](https://i.imgur.com/Az68D5a.png)

Du borde nu ha skapat tabellen. Om vi går till tabben **Structure** så ser vi hur själva tabellen ser ut. Under **Browse** ser vi innehållet i vår tabell, dock är den tom så vi måste fylla på den.

![Structure](https://i.imgur.com/fg7o2mB.png)

Gå till **Insert** för att lägga till nytt innehåll i tabellen. Det borde se ut som nedan. De fälten du ska fylla i är under **Value**

![Insert](https://i.imgur.com/TifIRC0.png)


## Övningar

Svaren till alla frågor ska löses genom att skriva `SQL`-queries.

#### Animals!

1. Skapa en databas i PHPMyAdmin.
2. Skapa en tabell (animals) och fyll den med följande data. Det handlar om djur som har en färg, vikt och födelsedag. Vikten är nonsens.

|   animal      |   color   |   weight  |  born         |
|---------------|-----------|-----------|---------------|
|   cat         |   black   |   5.7     |  2014-02-15   |
|   elephant    |   grey    |   0.25    |  2016-01-30   |
|   wallaby     |   brown   |   0.72    |  2015-03-04   |
|   koala       |   brown   |   4.8     |  2013-08-02   |
|   bjärven     |   brown   |   83.8    |  2010-09-20   |
|   bear        |   brown   |   83.8    |  2010-10-17   |

3. Skriv `SQL` som hämtar och visar all data från tabellen.

4. Skriv `SQL` som visar alla färger som förekommer i tabellen. Det är ok med dubbletter.

5. Skriv `SQL` som visar alla djurnamn och deras födelsedagar.

6. Skriv `SQL` som visar alla djurnamn, sorterade i fallande bokstavsordning. Dvs med Ö före A.

7. Skriv `SQL` som visar hela tabellen, sorterat i första hand stigande efter färg, i andra hand fallande efter födelsedatum.

8. Skriv `SQL` som visar alla djurnamn, fast ändrade så att det står "Namn: " före varje djurnamn. Exempel: "Namn: katt", "Namn: undulat" osv.

9. Skriv `SQL` som visar en ny kolumn som innehåller både färg och djur. Exempel: "svart katt". Observera att det är mellanslag mellan orden! Ge också kolumnen som visas ett namn.

#### Cities!

Den data du ska använda finns här: [http://downloads.mysql.com/docs/world.sql.zip](http://downloads.mysql.com/docs/world.sql.zip)

Skapa en ny databas som heter **World**.

För att importera färdiga tabeller så går du till fliken **Import** och väljer din fil på **Choose file**. Leta upp zipen som du laddade ner och tryck sedan på **GO** längst ner.

![Insert](https://i.imgur.com/nGNnKdB.png)

Du ska använda tabellen `city`.

---

1. Hur många städer finns det i distriktet _"Southern Tagalog"_?

2. Vilka städer har den minsta och den största populationen bland alla städer? (använd två queries)

3. Vilken stad har närmast över `275 000` invånare?

4. Hur många städer har namn som börjar på _"G"_?

5. Finns staden _"Berlin"_ i databasen?

6. Hur många olika distrikt finns det?

7. Hur många olika landskoder finns det?

8. Vilken stad har `id=200`?

9. Vad har följande länder för landskoder i databasen? Sverige, Norge, Danmark, Finland, Island. (tips: Kan du någon stad i Sverige, Norge m.m.? Flera lösningar är möjliga.)

10. Hur många städer finns det i Norden?

11. Hur många städer finns det i Norden som har mer än 500 000 invånare?

12. Vilka städer finns i Sverige och Norge som har mellan 200 000 och 500 000 invånare, samt i Danmark som har mer än 450 000 invånare?

# Lösningsförslag

## Animals

3.
```sql
SELECT * FROM animals
```

4.

```sql
SELECT color from animals
```

5.
```sql
SELECT animal, born FROM animals
```

6.

```sql
SELECT animal FROM animals ORDER BY animal ASC
```

7.

```sql
SELECT * FROM animals ORDER BY color ASC, born DESC
```

8.

```sql
SELECT CONCAT("Name: ", animal) AS animal from animals
```

9.

```sql
SELECT CONCAT(color, animal) as Animal FROM animals
```

## Countries

1.

```sql
SELECT * FROM city WHERE District = "Southern Tagalog";
```

2. 
```sql
-- Kan även lägga till `LIMIT 1` på slutet
SELECT Name, Population FROM city ORDER BY Population ASC;
```

3. 
```sql
SELECT name, population FROM city WHERE Population > 275000 ORDER BY Population ASC LIMIT 1;
```
4.
```sql
SELECT name from city WHERE NAME LIKE 'G%'
```
5.

```sql
SELECT name from city WHERE NAME = 'Berlin';
```

6.

```sql
SELECT COUNT(DISTINCT District) FROM city;
```

7.
```sql
SELECT COUNT(DISTINCT CountryCode) FROM city;
```

8.

```sql
SELECT * FROM city WHERE id=200; 
```

9.
```sql
SELECT District FROM city WHERE Name = "Stockholm" OR Name ="Oslo" Or Name = "Reykjavík" OR Name = "København"
```

10.
```sql
SELECT COUNT(Name) FROM city WHERE (CountryCode = "SWE" OR CountryCode = "NOR" Or CountryCode = "DAN")
```

11.
```sql
SELECT COUNT(Name) FROM city WHERE (CountryCode = "SWE" OR CountryCode = "NOR"Or CountryCode = "DAN") AND population > 500000;
```

12.
```sql
SELECT COUNT(Name) FROM city WHERE (CountryCode = "SWE" OR CountryCode = "NOR")AND population > 200000 AND population < 500000;
```