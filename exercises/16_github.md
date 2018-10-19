## Skapa ett GitHub-repository

1 . **Skapa ett nytt [**GitHub**](https://github.com/)-konto om du inte redan har ett. KOM IHÅG DITT LÖSENORD FÖR DU SKA ANVÄNDA DET PÅ FLERA STÄLLEN FLERA GÅNGER. Välj också ett vettigt användarnamn för du kan behöva visa upp din GitHub vid LIA-sök och jobbsök.**

2 . Kör följande kommandon i Bash där du byter ut den sista strängen i båda kommandona till dina egna uppgifter som du använde när du registrerade din användare på GitHub. Så här skulle det se ut för mig:
```bash
git config --global user.name "jesperorb"
git config --global user.email "jesper.orb@zocom.se"
```

2 . När du har skapat ditt konto är inloggad på GitHub har du ett plus i högra hörnet för att skapa ett nytt repo:

![Create a new repository](https://i.imgur.com/uaX4qe7.png)

3 . Döp ditt repository till ett valfritt namn utan mellanslag (**helst små bokstäver med bindstreck emellan som nedan**) och se till så att du har följande inställningar. Vad repositoriet ska heta beror på vilken mapp du ska ladda upp. Om du t.ex. har startat ett `git`-repo i _shopping_ med `git init` så kan du döpa repot till _shopping_.

![Settings for the new repository](https://i.imgur.com/VAoSKM5.png)

4 . Följ instruktionerna under **...or push an existing repository.** Du ska köra **exakt** dessa två rader så det du ska göra är att kopiera och klistra in raderna i Bash. **Du behöver köra dessa rader från en mapp där du har initierat `git` samt gjort commits så se till att du står i rätt mapp genom att kolla mappen med kommandot `pwd`**. Du kommer då troligtvis behöva fylla i dina inloggningsuppgifter till GitHub för att kunna ladda upp (pusha) din kod, det ska komma upp en inloggningsruta där du kan fylla i dina inloggningsuppgifter

![Push to master](https://i.imgur.com/EiThxdJ.png)

5 . Har du lyckats så borde exakt samma filer som finns i din mapp (ditt repo) på din dator finnas även i mappen (repot) på GitHub som du nyss skapade.

6 . Gör en liten ändring i någon av filerna på din dator. Skriv sedan  `git status`. Du kommer då se att du har ändringar som inte har commitats, de ändringar du nyss gjorde är inte sparade.

7 . Gör en ny commit genom att först stagea filen `git add filename` och sedan göra sparningen (commiten) och kom ihåg att ge commiten en beskrivande titel
```bash
git commit -m "My very descriptive title"
```

8 . Detta betyder du att du har 1 ändring som finns på din dator men som inte har synkats till GitHub, synkningen till GitHub sker **inte** automatiskt utan du måste själv bestämma när det ska synkas. För att ladda upp de nya ändringarna gör man en `git push`. `origin` är ett alias/smeknamn på repot på GitHub så att vi ska slippa skriva in URLen varje gång. `master` är vår nuvarande **branch** som vi står på. Vi har för tillfället bara en branch som skapats automatiskt och den heter alltid `master`
```bash
git push origin master
```

9 . Detta är grunden för att versionshantera sina filer lokalt samt ladda upp dessa filer till molnet så att andra kan ta del av dem. Detta blir viktigare senare när vi ska jobba i projekt i grupp och vi måste dagligen dela med oss av koden. Jag själv brukar också använda det som en typ av backup, saker som jag vill säkerhetskopiera laddar jag upp till GitHub utifall filerna skulle försvinna på min dator.