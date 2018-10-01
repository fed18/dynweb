# Bash

Ett **Shell** är ett gränssnitt för att direkt komma åt datorns funktionalitet utan att använda det grafiska. Istället för att klicka och dra saker mellan mappar så skriver man kommandon i detta shell som utför dessa aktiviteter. Alla utvecklare behöver någon gång utnyttja ett shell för att arbeta, t.ex. när vi ska arbeta med `git` och speciellt när det kommer till JavaScript. Det kan upplevas som onödigt och onödigt krångligt till en början men senare kommer ni att förstå storheten i det.

**Bash** står för **Bourne Again Shell** och är det som brukar köras på de flesta Mac & Linux-datorer. Windows har en motsvarighet men denna kommer inte i närheten av flexibiliteten hos Bash. P.g.a. detta är det många som kör **Git Bash** som är härmning av Bash som gör att windowsanvändare kan använda samma kommandon som Linux och Mac-användare.

Applikationen i Mac som `bash` körs i är oftast **Terminal.app** och den ser i grundutförandet ut på följande sätt med information om vad datorn heter (`py`), vilken användaren är (`jesperorb`) samt även nu vilken mapp jag står i (`Desktop`):

![Basic Bash](https://i.imgur.com/lXvNCVI.png)

Applikationen för Windows är oftast **Git Bash** och den ser i grundutförandet ut på följande sätt med information om vad datorn och användaren heter (gröna texten) samt i vilken mapp jag står i för tillfället (`~` vilket betyder hemmappen `/Users/jesperorb/`):

![Bash Windows](https://i.imgur.com/cwax9Fe.png)


## Kommandon

Alla saker du gör i det grafiska gränssnittet kan översättas till kommandon som går att använda i det textbaserade gränssnittet. I bilden ovan för Mac har jag kört ett vanligt kommando som heter `pwd`. `pwd` står för **Print Working Directory** och detta kommando kommer att skriva ut var du står i för mapp för stunden. Detta blir extremt viktigt att komma ihåg och det brukar vara något man oftast som nybörjare gör fel på, d.v.s. står i fel mapp. Nedan är de mest förekommande och mest användbara kommandona:

| Kommando                        | Förklaring    |
| --------------------------------|---------------|
| `pwd`                           | Skriver ut vilken mapp du står i för tillfället i bash |
| `ls`                            | Visar innehållet i mappen du står i för tillfället | 
| `cd directory`                  | Ändrar vilken mapp du står i, **Change Directory**. Du skriver `cd` följt av ett mellanslag följt av vilken mapp du vill gå till. T.ex. om jag står i min hemmapp (`/Users/jesperorb`) och vill gå till skrivbordet så skriver jag `cd Desktop`. |
| `cd ..`                         | Går tillbaka en mapp, `cd directory` går framåt ett eller flera steg. Så om jag t.ex. står i `Desktop` och vill gå tillbaka till min hemmapp kan jag skriva `cd ..` |
| `cd ~`                          | `~` är ett kortkommando som pekar på din hemmapp så om du någonsin är vilse så kan du alltid skriva det här kommandot och då kommer du tillbaka till där du började. | 
| `touch filename`                | Skapar en fil, byt ut `filename` till önskat filnamn. T.ex. `touch index.html`. `index.html` kommer att skapas i den mapp som du står i för tillfället |
| `mkdir foldername`              | Skapar en mapp, byt ut `foldername` till önskat mappnamn. T.ex. `mkdir css` |
| `cp filename filename`          | Kopierar en fil från ett ställe till ett annat, första filnamnet är filen du ska kopiera och andra filnamnet är stället du ska kopiera till |
| `cp -r foldername foldername `  | Kopierar en mapp, första mappnamnet är mappen du ska kopiera och andra mappnamet är stället du ska kopiera till |
| `mv filename filename`          | Flyttar en fil, första filnamnet är filen du ska kopiera och andra filnamnet är stället du ska kopiera till  |
| `mv -r foldername foldername`   | Flyttar en mapp, `-r` stor för _recursive_ |
| `rm filename`                   | Tar bort en fil, flyttar den inte till papperskorgen utan tar bort den direkt | 
| `rm -r foldername`              | Tar bort en mapp med dess innehåll | 
| `cat filename`                  | Skriver ut innehållet i en fil i terminalen |
| `explorer foldername`           | **Windows**: Öppnar utforskaren för vald mapp |
| `open filename/foldername`      | **Mac**: Öppnar fil eller mapp i fördefinierat program |
| `explorer .`/ `open .`          | Öppnar den mapp du står i för tillfället i Utforskaren/Finder. `.` är ett kortkommando som betyder **"allt i den här mappen"* |


## Övningar

Det är rekommenderat att köra igenom CodeAcademys tutorial för Command Line:
 * [CodeAcademy: Command Line](https://www.codecademy.com/learn/learn-the-command-line)

> **Varje övning ska enbart utföras med Bash och inget får skapas, raderas eller navigeras till på annat sätt än via Bash. Innan varje övning, se till så att du står i din användares mapp (`/Users/username`). Denna mapp kan du alltid komma till genom att skriva `cd ~`**

1. 
 * Skapa en mapp som heter `bash`
 * Skapa en fil i denna mapp som heter `test.txt`
 * Flytta denna fil ut ur bash till hemmappen
 * Skapa en mapp från hemmappen på Desktop som heter `bash`
 * Flytta `test.txt` till `bash`-mappen på Desktop
 * Ta bort den första `bash`-mappen
 * Döp om `bash`-mappen på desktop till `bash-test`
 * Skapa en till fil i `bash-test`-mappen som heter `bash.txt`
 * Ta bort samtliga filer i `bast-test`-mappen.
 * Ta bort `bash-test`-mappen

2.
 * Skapa en mapp på Desktop som heter `cool_webpage`, i denna mapp skapa två undermappar, `css` samt `images`. I root-mappen (`cool_webpage`) så skapar du en `index.html` och i css-mappen så skapar du en `style.css`. I mappen `images` så kopierar du över en redan existerande bildfil du har på datorn till denna mapp.

3. Utför någon handling som du annars gör via det grafiska gränssnittet. T.ex. att skapa ett nytt HTML-projekt eller vad som helst. Utför detta istället med hjälp av kommandon i Bash. Skriv upp alla kommandon som du utförde så vi kan använda dem vid ett senare skede, kolla på hur de använts.

## Lösningsförslag

1.
```bash
mkdir bash
touch bash/test.txt
mv bash/test.txt .
mkdir Desktop/bash
mv test.txt Desktop/bash/
rm -r bash
mv Desktop/bash Desktop/bash-test
touch Desktop/bash-test/bash.txt
rm Desktop/bash-test/*
rm -r Desktop/bash-test
```

2. 
```bash
cd Desktop
mkdir cool_webpage
cd cool_webpage
mkdir css images
touch css/style.css
cd images
cp ~/Downloads/cute_cat_picture.png .
```

alternativ lösning
```
mkdir ~/Desktop/cool_webpage/{css,images}
touch ~/Desktop/cool_webpage/css/style.css
cp ~/Downloads/cute_cat_picture ~/Desktop/cool_webpage/images/
```
