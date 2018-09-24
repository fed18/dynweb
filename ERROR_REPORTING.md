# Ställ in errorhantering
Av någon konstig anledning är inte errorhantering inställt från start så vi måste göra det själva för att kunna rapportera errors. Detta gör du på följande sätt:

1. Skriv följande kod i din `index.php`:
```php
phpinfo();
```
2. Besök din `index.php` och då borde du få upp en sida som ser ut som den nedan:
![PHP](https://i.imgur.com/iXegKOx.png)

3. Under **Loaded Configuration File** så ser du vilken fil för inställningar som din PHP använder. Öppna denna fil i valfri editor (brackets etc.). Du får själv leta reda på den i Utforskaren/Finder

4. När du har lyckats öppna denna fil i din editor ska du lägga till följande kodrader längst ner i dokumentet
```ini
error_reporting  =  E_ALL
display_errors = On
display_startup_errors = On
```
5. När du har gjort detta så ska du spara filen samt starta om MAMP. Detta gör du i MAMP genom att trycka på _Stop servers_ och sedan _Start servers_

6. Din `index.php` borde nu visa upp error när du gör något error. Du kan även ta bort kodraden `phpinfo();` från `index.php`.