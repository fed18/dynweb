# Att söka information

## Länktips

* [**How to Think Like a Programmer** @ _freeCodeCamp_](https://medium.freecodecamp.org/how-to-think-like-a-programmer-lessons-in-problem-solving-d1d8bf1de7d2)
* [**How To Google Your Errors** @ _dev.to_](https://dev.to/swyx/how-to-google-your-errors-2l6o)
* [**9 Indispensable Rules for Finding the Most Elusive Software and Hardware Problems** @ _David J. Agans_](https://courses.cs.washington.edu/courses/cse474/17wi/pdfs/lectures/Debugging-Rules.pdf)
* [**Google Search Operators** @ _ahrefs.com_](https://ahrefs.com/blog/google-advanced-search-operators/)
* [Stackoverflow.com](https://stackoverflow.com/)
* [Google Advanced Search](https://www.google.com/advanced_search)


## Om du vet felmeddelandet

Troligtvis har du fått ett felmeddelande som berättar mer om vad du har gjort för fel. Dessa är oftast kopplade till såkallade _Syntax Errors_ vilket betyder att du har skrivit fel _"grammatik"_ eller uttalat någonting fel. Varje programmeringsspråk har sin syntax och den måste följas. I PHP t.ex. handlar det ofta om att man har glömt ett `;`, glömt att stänga sina `{}` eller sina `[]` eller sina `""`/`''`.

### Exempelmeddelande

I PHP kan du få ett liknande meddelande:

```
Parse error: syntax error, unexpected '}', expecting ',' or ';' in /Applications/MAMP/htdocs/index.php on line 23
```

Ett felmeddelande följer oftast denna struktur oavsett språk:
```
Kod: meddelande
Stack trace
```

**meddelandet är det man ska fokusera på eftersom det säger _vad_ du har gjort för fel och det är även det meddelandet som är mest sökbart på webben** 

Detta felmeddelande ger oss följande information:

* Felet uppstod på rad 23 i filen `index.php`. Det betyder att vi måste gå till denna rad i denna fil och se över vad som är fel på raden.
* Det är främst filen som är viktig för oss själva så att vi hittar rätt fil. Men om vi ska söka efter felmeddelandet på t.ex. Google så är själva mappen och stället filen ligger på helt orelevent i detta fall eftersom det är specifikt till vår egen dator och chansen att någon annan har samma sökväg som oss är liten och därför ska detta inte inkluderas i en sökning.
* Vi får veta att det är ett **Parse Error**, det kanske inte hjälper oss så mycket men vi får veta att PHP har haft svårt att parsa vår kod. PHP kan inte längre fortsätta att köra koden eftersom det är ett fel som inte kan fixas. Koden kan också sökas på.
* **`unexpected '}', expecting ',' or ';' `** är det felet man troligtvis vill söka på om man vill hitta svar på internet. Man kan alltså sålla bort stack trace men koden och meddelandet borde sökas på. Just det här meddelandet säger att koden förväntade sig `,` eller `;` men istället hittade ett `}` vilket oftast tyder på att vi har glömt ett `;`


### Om du vet uppgiften

I många fall har du inte ett specifikt felmeddelande som du kan söka på utan du har mer en uppgift som måste utföras och du vet inte hur den ska lösas. Då måste du följa ett flertal steg för att vara framgångsrik:

1. **Förstå** - Om du inte vet vad **du** vill åstadkomma så är det svårt att lösa problemet. Uttryck problemet i dina egna ord eller försök att omformulera det så att det är tydligt vad du vill åstadkomma.
2. **Planera** - Gör upp en lista eller skriv pseudokod för att strukturera problemet, ha en plan, du behöver inte följa den till punkt och pricka men det är ändå någonting.
  - _"In preparing for battle I have always found that plans are useless, but planning is indispensable."_ -Dwight D. Eisenhower
3. **Dela upp** - Dela upp problemet eller listan ytterligare för att det ska bli tydligare vilka steg du måste ta och i vilken ordning. **Se exemplet nedan**
4. **Testa din lösning**
5. **Omformulera/omvärdera** - Funkar inte din lösning, omvärdera och omformulera lösningen, nu har du troligtvis en lista på saker som **inte** fungerar vilket är mer än du hade förut.

#### Exempel

T.ex. är formuleringen _“kolla så att användaren skrivit in ett lösenord som är över 6 tecken”_ inte en enda sak som ska lösas utan det kan delas upp i *minst* de här delproblemen som måste lösas ett i taget och dubbelkollas innan man går vidare till nästa problem. Oftast vill man lösa typ hälften av dom i en och samma veva och det är då man får mer problem än vad man hade från början. Man ska även börja med det problem som man har “närmast” till att lösa, där man typ vet svaret eller har ett hum om hur det ska lösas, förhoppningsvis kommer den lösning man kommer fram till att hjälpa en i nästa problem.

• Läsa in lösenord från användare
• Ha ett sätt att skicka lösenordet till där det ska sparas
• Spara lösenord från användaren när det har skickats
• Kolla så att lösenordet har sparats i rätt format/typ
• Kolla så att lösenordet har rätt längd
• Agera på att lösenordet har rätt längd
• Agera på att lösenordet inte har rätt längd
• Agera på resterande möjliga scenarion

Många fel händer p.g.a. att man agerar på värden som man tror är en sak men visar sig vara något annat. Skriv ut dina värden i *stor utsträckning* för att kolla vilka värden du har och inte har, vilka variabler som existerar och som inte existerar i varje skede av koden. (_Stop thinking and look_)

#### Sökprocess för exemplet

Om vi bara fokuserar på ett specifikt delproblem som vi vill lösa så kan vi troligtvis få bättre sökresultat. Om du nu har delat upp ditt stora problem i mindre delproblem så  är detta ett delproblem som du vill lösa:

* **Kolla så att lösenordet har rätt längd**

Då kan du oftast applicera följande process:

1. Formulera en mening som beskriver exakt det du är ute efter så smalt som möjligt och som inkluderar en kontext. Med kontext menar jag t.ex. att vi använder språket PHP. Så kan vi försöka med följande meningar:
  * _"how to check the length of a string php"_
  * _"how to check the length of a password php"_
  * _"length of string php"_
  * _"length string php"_
2. Resultatet från dessa sökningar kommer troligtvis leda dig till [Stackoverflow.com](https://stackoverflow.com/) där de flesta svaren finns samlade. Förlita dig dock inte bara på denna sida och förlita dig inte bara på det första resultatet. Kolla så att flera svar på frågan stämmer överens och vad eventuella alternativa metoder kan vara.
3. I detta fall så kommer resultaten ungefär säga samma sak: **använd metoden `strlen`**. Vilket betyder att du måste kolla upp vad `strlen` är och kanske främst, hur den fungerar. Information om detta hittar du troligtvis i dokumentationen för språket: [`strlen` @ _PHP.net](http://php.net/manual/en/function.strlen.php)