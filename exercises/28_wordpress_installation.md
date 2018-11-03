# WordPress Installation

> **Läs igenom alla steg en gång först utan att göra dem, när du har gjort detta så gå igenom steg för steg och utför dessa instruktioner**

---

1 . Besök https://wordpress.org/download/ och ladda ner den senaste versionen av WordPress.


2 . Du kommer att ha laddat ner en `.zip`-fil. **Packa upp** denna zip-fil i **htdocs** (eller i den mappen där du har dina andra PHP-projekt) Lättast är om du packar upp filen där du har laddat ner den och flyttar den uppackade mappen till htdocs.

---

3 . Mappen som du har packat upp heter troligtvis `wordpress` vilket betyder att URLen du måste gå till är `http://localhost/wordpress`. Gå till `http://localhost/wordpress` i din webbläsare. Om du har gått till rätt projekt borde du mötas av en dialogruta där du ska välja språk som ser ut som nedan. Välj vilket språk du vill ha och välj "Continue":
![Init](https://i.imgur.com/Sol4fn9.png)

---

4 . På nästa steg ska du bara trycka "Let's go", den enda knappen som går att trycka på
![](https://i.imgur.com/BvPw0h3.png)

---

5 . På nästa steg ska du välja vad din databas ska heta och hur du ska logga in till den. Du kan döpa databasen till vad du vill. Dock så behöver lösenord och användarnamn vara samma som du har använt när du kopplat upp dig med PDO. Detta borde vara "root" samt "root" om du inte har ändrat det själv. Table Prefix kan du ignorera. När du fyllt i alla uppgifter trycker du på _"Submit"_
![](https://i.imgur.com/mzW5boV.png)

---

6 . Du **kan** då på nästa sida mötas av följande dialogruta. Detta betyder att WordPress inte automatiskt lyckades skapa databasen i MySQL vilket betyder att vi måste skapa den själva, vilket vi kommer att göra i steg 7. Låt denna sida vara uppe medan du gör steg 7.
![](https://i.imgur.com/nQqFqfM.png)

---

7 . Gå till phpMyAdmin: [http://localhost:8888/phpMyAdmin](http://localhost:8888/phpMyAdmin/) och tryck på **New** i menyn till vänster, längst upp ovanför listan på alla databaser. Se till så att databasnamnet är detsamma som det du skrev in i WordPress-installationen. I den dropdown som är bredvid där du skriver in namnet så väljer du **utf8mb_unicode_ci**. Sedan trycker du på _"Create"_-knappen. När du har gjort detta behöver du inte göra något mer.
![](https://i.imgur.com/Z0RiSuv.png)

--

8 . Gå tillbaka till tabben med wordpress-installtionen från steg 5. Nu ska du trycka på _"Try again"_ då du kommer tillbaka till dialogrutan från steg 5. Se till så att allt stämmer och att både användarnamnet och lösenordet är rätt och tryck på _"Submit"_

9 . Du borde då komma till en sida där du kan trycka på en knapp som heter _"Run the installation"_, tryck på denna.
![](https://i.imgur.com/ZSruHO4.png)

---

10 . Du kommer att komma till en sida där du ska fylla i informationen om själva sidan. De förra uppgifterna var för databasen. Nu ska du skapa en användare och sätta en titel på sidan. **KOM IHÅG/SKRIV UPP lösenord och användarnamn snälla**. Vilken mail eller vad användaren heter är struntsamma. När du har fyllt i vad du vill ha för uppgifter trycker du på _"Install wordpress_

![](https://i.imgur.com/ERn4pgr.png)

---

11 . Efter detta borde du ha lyckats installera WordPress och det ska finnas en knapp där det står _"Log in"_. Tryck på denna och då kommer du till en inloggningsruta där du ska logga in med de uppgifter som du nyss skapade.

12 . Om du har lyckats logga in så ska du mötas av admingränssnittet för WordPress och då har du lyckats installera och logga in på WordPress.


## Länkar

* https://codex.wordpress.org/Installing_WordPress#Famous_5-Minute_Installation