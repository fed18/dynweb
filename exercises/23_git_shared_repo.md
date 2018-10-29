# Öva på samarbete med GIT

## Förberedelser

Vi ska nu jobba med git & GitHub enligt __Shared Repository Model__

Ni ska nu dela upp er i grupper. Grupper ska bestå av __3 personer__.
En av personerna i gruppen ska var __ägaren__ till repositoryt vi kommer att arbeta med. De andra två personerna kommer vara _Collaborators_ som ska skicka upp ändringar till originalet. Ni får själva utse rollerna.

Även fast det står att ni ska ha olika roller får ni hjälpa varandra om ni fastnar på något, det är en gruppövning.

* [__Understanding the GitHub Flow__](https://guides.github.com/introduction/flow/)
* [__GitHub Help__](https://help.github.com/)
* [__git - the simple guide__](http://rogerdudler.github.io/git-guide/)

## Övning - Storyteller

* Repot ni skapar ska innehålla textfiler som tillsammans bildar en saga
* Alla som bidrar till repot ska därmed bidra till sagan
* Sagan behöver inte vara speciellt bra. Det är `git`-delen vi ska fokusera på.
* Sagan ska skrivas på engelska och ska vara barnvänlig.

1. Personen som är ägare i gruppen ska skapa ett nytt repo på **GitHub** och kalla det: `storyteller`. Enbart en person i gruppen gör detta. (Läs [16_github.md](16_github.md)/[22_github_conflict.md](22_github_conflict.md) om ni behöver ett exempel på hur man gör detta)

2. Ägaren klonar ner repot till datorn med kommandot `git clone` följt av mellanslag följt av URLen till repot som har skapats, det ska även finnas en knapp som heter **Clone** på GitHub där du får länken automatiskt formatterad. Efter kloning så går ägaren in i mappen med `cd` på sin egen dator via terminalen.

3. Ägaren skapar sedan följande tomma filer lokalt i den klonade mappen. Det spelar ingen roll hur du skapar filerna bara att de finns och att de har filändelsen `.txt` och heter följande:
    * 1_tale_begins.txt
    * 2_villain.txt
    * 3_hero_enters_tale.txt
    * 4_epic_quest.txt
    * 5_journey_through_land.txt
    * 6_great_obstacle.txt
    * 7_hero_wins.txt
    * 8_moral_of_the_tale.txt
    * 9_end.txt  

## Fyll på filerna

1. Ni som grupp ska nu fylla på filerna __1, 3 samt 5-9__ (alltså **inte 2 och 4**). Varje fil ska ha minst en mening som stämmer överens med vad filnamnet heter. Här får ni hjälpas åt att komma på meningarna men det är bara ägaren till repot som ska fylla i de skapade filerna.

2. Ägaren lägger sedan till filerna till _Staging Area_ via `git add .`, sedan gör en ny commit med `git commit -m "lämpligt meddelande"` och skriver ett lämpligt commitmeddelande. Ägaren borde nu ha ett repot lokalt på datorn som har en commit på `master`.


## Dela ut uppdrag

1. Se till så att samtliga deltagare är _Collaborators_ genom att gå till ägarens repo sen trycka på **Settings > Collaborators** och sedan bjuda in de andra medlemmarna till repositoriet längst ner på sidan via dess användarnamn (se bild nedan). **Viktigt, användaren du bjudit in får ett mail och måste öppna detta mail och acceptera inbjudan innan detta fungerar**
![](https://i.imgur.com/d4OKqfo.png)

2. De två andra personerna som inte är ägaren kallar vi **A** samt **B**. Person __A__ och __B__ i din grupp ska klona ner repot lokalt till sin egen dator (`git clone`), sedan ska de skapa var sin ny branch lokalt på sin egen dator. Det spelar mindre roll vad branchen heter. Ny branch kan skapas med: `git checkout -b name-of-branch`

3. __A__ och __B__ får var sin uppgift:
    1. person __A__ i din grupp ska på sin branch ändra på fil __2__ och ändra meningarna i den filen till något liknande, t.ex. ändra ett ord eller två i meningen.
    2. person __B__ i din grupp ska på sin branch ändra på fil __4__ och ändra meningarna i den filen till något liknande, t.ex. ändra ett ord eller två i meningen.
    3. Person __A__ och __B__ ska sedan pusha upp sin branch till GitHub med `git push -u origin name-of-branch`. De som är _collaborators_ ska alltså skicka upp sina egna branches, inte `master`. Viktigt att ni står på separata branches och pushar upp era egna branches.
    
4. Gå in på repot på __GitHub__ och se till så att branches har pushats. Ni borde kunna se en lista över branches i denna dropdown på repot:
![](https://i.imgur.com/ogVpaVA.png)


## Slå ihop alla samarbeten

> Nu har du som ägare fått en del input ifrån din grupp och det är dags att slå ihop alla branches in i ägarens `master` på GitHu så att ägaren har en sammanslagen uppdaterad version av sagan.

* [Creating a Pull Request](https://help.github.com/articles/creating-a-pull-request/)
* [Using Pull Requests](https://help.github.com/articles/about-pull-requests/)
* [Merging a Pull Request](https://help.github.com/articles/merging-a-pull-request/)
* [Closing a Pull Request](https://help.github.com/articles/closing-a-pull-request/)

1. Person __A__ och __B__ öppnar varsin __Pull Request__ och begär att ägaren mergar deras redigerade branches med originalet (`master`). Detta kan inte allt göras samtidigt utan man måste göra __en merge i taget__. Person __A__ gör en Pull Request först.

2. Ägaren accepterar alla __Pull Requests__ och mergar in de två olika branches in i master.

3. När allt ovan är klart och ni har den uppdaterade sagan i `master` på GitHub och Person __A__ och person __B__ vill troligtvis ha dessa ändringar på sin egen dator. Detta betyder att de måste gå till sin egen `master`-branch på sin dator och sedan använda `git pull` för att få de nya ändringarna:
```
git checkout master
git pull origin master
```

## Konflikter

> Detta gick bra men oftast blir det konflikter, vi ska nu skapa sådana konflikter

Du ska nu ge ut nya uppdrag till din grupp, dessa uppdrag ska utföras i en ny branch som är en branch av den nya uppdaterade `master` (branchen ska inte heta `new-branch-name` utan döp den till något som du själv tycker passar in på vad du gör):
```bash
git checkout master
git checkout -b new-branch-name
```

1. __A__ får i uppgift att på sin egen branch göra följande ändringar och sedan commita dessa:

  * i __fil 2__ lägga till några adjektiv i beskrivningen av skurken (beskrivande ord som ugly, evil osv)
  *  i __fil 3__ lägga till en kort beskrivning av hjältens side-kick .
  * i någon av filerna mot slutet av sagan lägga till något som denna side-kick gör för att bidra till sagan.
    
2. __B__ får i uppgift att på sin egen branch göra följande ändringar och sedan commita dessa:

  * i __fil 3__ lägga till några adjektiv i beskrivningen av hjälten   
  * i __fil 2__ lägga till en kort beskrivning av skurkens husdjur 
  * i någon av filerna mot slutet av sagan lägga till något som detta husdjur gör för att bidra till sagan.

3. Samtidigt som __A__ och __B__ arbetar på filerna __2__ och __3__ ska du som är ägare även gå in och lägga till att både skurken och hjälten har något sorts vapen eller föremål. D.v.s. ändra samma filer som __A__ och __B__ ändrar på samtidigt. **Ägaren kan commita på master** Alla ändringar som ni gör måste stageas och commitas. Målet här är att alla 3 personer ska ha gjort commits på samma filer fast på olika branches. Du som ägare ska alltså göra ändringar på `master` efter att __A__ och __B__ har gjort nya branches.

När allt ovan är klart går du vidare till nästa steg.

## `merge`

1. Nu har ni lite olika ändringar. Nu ska samtliga pusha upp dessa ändringar. Ägaren pushar upp `master`:
```
git push -u origin master
```
och __A__ och __B__ pushar sin respektive branch:
```bash
git push -u origin name-of-branch
```

2. __Whoops!__ Eftersom flera användare har ändrat på filer på samma ställe vet inte `git` vilken version som `git` ska använda, all input är likvärdig i `git` ögon och det kan vara svårt för oss utvecklare att också veta vilken version som vi ska använda. Ska vi använda ägarens, person A eller person B version? Detta måste vi ange själva och vi kan inte gå vidare med att _merge pull request_ innan vi har löst våra konflikter.

3. Det finns två sätt att lösa dessa konflikter. Enklast är att trycka på **Resolve conflicts** på GitHub och då kommer en editor inbyggd i GitHub att öppnas. Här kan ni lösa en konflikt i taget på samma sätt som [22_github_conflict.md](22_github_conflict.md). Det andra sättet är lite svårare och innebär att ägaren måste dra ner alla ändringar och lösa konflikten lokalt på sin dator och sedan pusha upp den nya mergade `master`n.

4. När ni har löst alla konflikter som kommer upp borde ni ha en uppdaterad version i `master` med allas ändringar. Dessa ändringar måste alla i gruppen på nytt dra ner så att alla har samma version av master:
```bash
git checkout master
git pull origin master
```

## Färdig?

Nu borde ni som grupp ha ett repo med en fin liten saga samtidigt som ni har lärt er att dela kod med git via GitHub. Här är några saker att tänka på för att underlätta för er själva:

* **Dra alltid ner ändringar innan du börjar arbeta med koden: `git pull`**
* **Försök undvika att jobba på samma kodrader, dela upp arbetet så att ni inte modiferar så mycket på samma ställe**
* **Kommunicera tydligt vilka delar ni jobbar på**
* **Använd en [`.gitignore`](https://git-scm.com/docs/gitignore)-fil på filer som oftast skapar problem (konflikter) eller som innehåller känslig data. Detta kan t.ex. var `.css`-filer om man använder `.sass`**

##### Läs vidare: Markdown

Det kan vara en bra idé att läsa på om Markdown också. Alla projekt på _GitHub_ har en välformatterad **README** där man kan läsa om vad projektet handlar om. Dessa **README**s är alltid i formatet **Markdown** och har filändelsen `.md` eller `.markdown`. _Markdown_ är ett format som enbart fokuserar på strukturen, hur vi formatterar vår text. _GitHub_ sköter sedan automatiskt om att konvertera detta till HTML och ge det en snygg design. Jag har skrivit den här övningen i Markdown t.ex.

**Markdown** används i stor utsträckning och är inte alls svårt att lära sig. Vill man t.ex. ha en rubrik i markdown så skriver man en hashtag framför: `# Rubrik`, vill man ha fetstilat så skriver har man två asterisk runt texten: `**fetstilat**`. En fullständig guide till att man kan göra i Markdown finns nedan:

* [**Markdown Cheat Sheet**](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
