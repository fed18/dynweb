# github-conflict

> Kom ihåg att alltid kolla `git log` samt `git status`

1. Skapa en ny mapp (valfritt namn utan mellanslag) och ställ dig i den i terminalen (`cd mappnamn`) och initiera ett nytt git repository medan du står i mappen med : `git init`.
2. Skapa filen `script.php` och lägg till följande kod:
```php
function addNumbers($a, $b) {
  $sum = $a + $b;
  return $sum;
}
```
3. Lägg till filen till _Stageing area_ (`git add script.php`)
4. Gör en commit `git commit -m "your message"`.
5. Kolla status och kolla `git log` för att se vad som har hänt
5. Skapa en ny branch som heter `multiple-arguments` (`git branch multiple-arguments`)
6. Byt till den nya branchen: `git checkout multiple-arguments`
7. Utöka den redan existerande koden i  `script.php` på följande sätt:
```php
function addNumbers($numbers) {
  $sum = $a + $b;
  foreach($numbers as $number) {
    $sum += $number;
  }
  return $sum;
}
```
8. Lägg till ändringarna till Staging area (`git add`)
9. Commita ändringarna (`git commit -m "your message"`)
10. Kör `git log --oneline --decorate --graph` för att se vilka commits som finns.
11. Växla till master igen: `git checkout master`
12. Kör `git log` här med och se vilka commits som finns.
13. Merga ändringarna från `multiple arguments` in i `master` genom att köra: `git merge multiple-arguments` när du står på branchen `master`.
14. Kör `git log` igen och se ändringarna. Kolla även på koden i editorn för att se vad som har ändrats.
15. Medan du står på `master`: byt namn på funktionen `addNumbers` så att den heter enbart `add`.
16. Stagea ändringarna (`git add sript.php`) och gör en ny commit på `master`.
17. Växla tillbaka till `multiple-arguments`-branchen (`git checkout multiple-arguments`)
18. ta bort rad 2 då du upptäcker att den är helt överflödig
19. Stagea dina ändringar och gör en ny commit på branchen `multiple-arguments`.
20. Växla tillbaka till `master`
21. Skapa ett nytt repo på GitHub genom att trycka på **New Repository** uppe i navigationen:
![imgur-2018_06_18-07:58:23](https://i.imgur.com/uaX4qe7.png)
22. Döp repot till valfritt namn och se till så att *Initialize this repository with a README* **inte** är ikryssat
![imgur-2018_06_18-07:57:44](https://i.imgur.com/VAoSKM5.png)
23. Följ **enbart** instruktionerna under **...or push from an existing repository from the command line**. Kopiera raderna och kör dessa i din terminal. Det är två stycken kommandon du ska göra efter varandra. Kolla så att du har stavat rätt. URLen kommer inte se ut som på bilden. Du ska använda din egen URL.
![imgur](https://i.imgur.com/WuYQz9z.png)
24. Pusha upp branchen `master` som föregående punkt samt `multiple-arguments` genom att skriva följande kommando. `origin` är ett smeknamn på urlen till repot som ligger på GitHub. `master` är branchen du vill pusha upp och `-u` står för `upstream` och säger att du vill ha koll på om du ligger i synk med branchen på din remote (svårt att förklara här, ha bara med `-u`).
```bash
git push -u origin master
```
och 
```bash
git push -u origin multiple-arguments
```
25. Besök repot på GitHub och gå sedan till tabben **Pull Requests**. Tryck sedan på knappen **New Pull Request**. En Pull Request är en förfrågan om att lägga in din nya kod i master-branchen. 
![New Pull Request](https://i.imgur.com/4okoO8q.png)
26. På sidan du kommer till så finns det nu två dropdowns. Välj **master** på den första och **multiple-arguments** på den andra som bilden. Du borde få upp att det inte går att mergea dessa två automatiskt. Skriv in en informerande titel på din Pull Request och tryck sedan på **Create Pull Request**.
![Create Pull Request](https://i.imgur.com/yCD9NGQ.png)
27. Du kommer nu komma till en ny sida där du måste lösa de konflikter som uppstått. Detta kan du göra direkt i GitHub genom att trycka på **Resolve Conflicts**. Det ska iaf vara en konflikt, om det mot förmodan inte är en konflikt kan du hoppa till punkt 30. 
![Resolve Conflicts](https://i.imgur.com/oBQ5PlN.png)
28. Då kommer du komma till en editor där du kan redigera din fil på samma sätt som du gjorde lokalt i förra övningen ([18_git_conflict.md](18_git_conflict.md): punkt 22 och 23). När du är klar med ändringarna trycker på på knappen **Mark as Resolved**.
![Mark as Resolved](https://i.imgur.com/swK1b5X.png)
29. Du kommer då få en ny knapp där du kan commita denna ändring direkt i GitHub. Tryck på denna
![Commit](https://i.imgur.com/LSYj7yu.png)
30. Då kommer du till en sida där du ska slutföra denna merge med en commit. Nu slutför vi denna merge genom att trycka på **Merge Pull Request**
![Merge Pull Request](https://i.imgur.com/aYxGAiX.png)
31. Du kan nu ta bort branchen `multiple-arguments` på GitHub eller låta den vara kvar. Nu är iaf ändringarna från branchen `multiple-arguments` inlagd i `master` via GitHub. Det betyder att dina ändringar har lagts in på den officiella versionen av koden så att andra kan använda den också. Alla andra som använder din kod ska också utgå från master. Detta betyder också att när du har gjort detta måste alla andra som arbetar med koden dra ner ändringarna `git pull`.
32. Din `master` på GitHub är nu uppdaterad men din lokala branch är fortfarande icke mergead. Detta löser du genom att dra ner de nya ändringarna från GitHub via din terminal genom att skriva följande kommando medan du står i `master`-branch. Detta kommando hämtar ner de senaste ändringarna och gör en automatisk `merge` av `master` som finns på GitHub samt `master` som finns lokalt på din dator.
```bash
git pull origin master
```
33. Nu borde båda dina branchen se likadana ut både på GitHub och lokalt, det är alltid viktigt att synka dessa två med `push` och `pull`.
34. Om du vill kan du nu ta bort din lokala branch `multiple-arguments` då den har gjort sitt syfte och de ändringar som fanns i `multiple-arguments` finns nu i master:
```bash
git branch -D multiple-arguments
```