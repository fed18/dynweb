# Exportera databasen från phpMyAdmin

1. Gå till phpMyAdmin
2. Markera/tryck på den databas du vill exportera i sidomenyn till vänster. Listan borde expanderas och du borde se en lista över alla tabeller som finns i databasen.
3. Gå till fliken **"Export"** i flikmenyn längst upp och då kommer du mötas av följande vy.
![](https://i.imgur.com/bG0LucP.png)
4. Tryck på **"Go"**
5. Du kommer då mötas av vyn nedan. Markera all text innanför den vita rutan (inputfältet) och kopiera texten (CTRL + C).
6. Gå till din _editor_ (Visual Studio Code/Brackets etc.) och skapa en ny fil i din editor och skapa denna i rootmappen, i samma mapp som `index.php` ligger. Döp denna fil till `database.sql`. Filändelsen ska alltså vara `.sql`.
7. Klistra in koden som du kopierade i steg 5 i denna nyskapade fil och spara sedan filen.
8. Du har nu exporterat allt i din databas till denna fil och är nu klar med exporten.