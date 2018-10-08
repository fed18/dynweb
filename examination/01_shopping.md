# Inlämningsuppgift 1 - Shopping! 💸

> Individuell
>
> **Betygsnivå**: IG/G/VG

## Mål

Målet med uppgiften är att examinera dina kunskaper i följande moment:
* **Grundläggande programmering**
* **Variabler och olika variabeltyper**
* **Loopar**
* **Funktioner**
* **Grundläggande formulärhantering**

## Fil och mappstruktur

Din inlämning måste följa strukturen nedan annars får du automatisk komplettering. Din mapp som du har din uppgift i **måste** heta enligt namnmönstret nedan. Din `css` sak ligga i en mapp som heter `css` och själva filen ska heta `style.css`. Om du har några bilder kopplade till din inlämning ska de ligga i en mapp som heter `images`.  Om du har bilder så ska dessa vara i en rimlig storlek och du ska inte skicka med en 10mb stor bakgrundsbild som inte behövs (tumregel är att bilderna kan vara max 1mb, men gärna max 500kb). Inlämningen ska ha en fil som heter `README.md`, d.v.s. filen heter `README` med stora bokstäver och filformatet är `.md` (det är ungefär som en vanlig `.txt`). I denna fil ska enbart ditt namn skrivas längst upp i filen, det är det enda som krävs av den filen. `index.php` ska vara första sidan man kommer till,  `checkout.php` är den fil man kommer till när man har skickat in formuläret.

* :open_file_folder: `fornamn_efternamn_shopping`
  * :open_file_folder:`css`
    * :page_with_curl:`style.css`
  * :open_file_folder: `images`
    * :page_with_curl:`image.png`/`image.jpg`
  * :page_with_curl: `index.php`
  * :page_with_curl: `checkout.php`
  * :page_with_curl: `README.md`

**När du är klar med uppgiften så zippar du hela mappen med valfritt komprimeringsprogram (både Mac & Windows har inbyggda komprimeringsprogram, högerklicka på mappen så får du upp information om det)**

## Uppgiftsbeskrivning

Din uppgift är att skapa en webbsida som är grunden till ett **beställningsformulär** för diverse produkter. Dessa produkter är upp till dig att välja men de ska ha minst 2 egenskaper:

* Pris
* Namn

Förstasidan ska bestå av att man fyller i sina personuppgifter samt hur många av varje produkt man vill köpa. När man sedan skickar iväg formuläret till nästa sida ska man där se en sammanfattning av vad det kommer att kosta och vilka uppgifter man har fyllt i.

Informationen ska presenteras på ett snyggt sätt med hjälp av *HTML* och *CSS*, och du ska påvisa att du kan integrera PHP-kod med HTML- och CSS-kod. 
[_PHP echo cheat sheet_](https://gist.github.com/jesperorb/2fac1429b7fa30a685ab59f8a306d562)

## Kravspecifikation

Följande tekniska krav ska uppfyllas:

* Sidan ska skriva ut samtliga produkter som finns i produktsortimentet på ett **väl upplagt och lättläst sätt som är automatiserat** (d.v.s. att du får inte hårdkoda in produktsortimentet utan du ska använda funktioner och framförallt loopar för att skriva ut produkterna).
* Till varje produkt ska det finnas en `input`-ruta där beställaren kan ange antalet produkter hen vill beställa av respektive sort. Man ska på något sätt kunna välja hur många man vill köpa av varje produkt.
* Om den aktuella dagen är en **måndag**, ska samtliga priser reduceras med **50%**
* Om den aktuella dagen är en **onsdag**, ska samtliga priser räknas upp, så att priset på varje produkt istället är **110%**
* Om den aktuella dagen är en **fredag**, ska samtliga priser som är **över 200 SEK minskas med 20 SEK**.
* Formuläret ska även innehålla kontaktuppgifter: _namn, adress, telefonnummer och e-postadress_.
* Om användaren har glömt att fylla i någon av kontaktuppgifterna ska ett felmeddelande visas på nästa sida som meddelar att beställningen är ogiltig och att användaren måste göra om beställningen. Alternativt att man kommer tillbaka till samma sida med ett errormeddelande som säger att man har angivit fel information, hur som helst ska man inte kunna genomföra processen om information saknas och man ska även få feedback gällande vilken information som saknas.
* När formuläret har skickats iväg till nästa sida ska det på denna sida visas hur många produkter man har beställt, vad de kostar styck och vad totalpriset för respektive produkt blir. T.ex. _"Banan - 5 kr/st - 10 st, 50 kr"_.
* Totalbeloppet för hela beställningen ska framgå och visas längst ner på beställningsöversikten.
* För VG: Du sparar användarens kundkorg så att produkterna användaren har valt ligger kvar om man laddar om sidan (via session)

## Bedömning

G/VG baseras på hur väl upplagd koden är och i vilken grad du utnyttjar programmeringsspråket.

* Snyggt och prydligt skriven kod. Detta innefattar konsekvent namngivning av variabler, korrekt intabbning av koden och en logisk kodföljd. Detta omfattar såväl HTML, CSS som PHP.
* Förmåga att välja och använda rätt funktionalitet för rätt ändamål gällande variabler, loopar, statements och funktioner på ett smart sätt.
* Förmåga att kommentera kod när det behövs och att kommentera på ett tydligt sätt.
* Förmåga att hantera formulär, inkl. skicka och ta emot data i PHP och att lagra denna på ett strukturerat sätt.

## Inlämning

* **Inlämningsformat**: `.zip` (alla andra format resulterar i försenad inlämning och komplettering)
* **Namnformat för inlämning:** `fornamn_efternamn_shopping.zip`
* **Inlämningen sker endast via inlämningsyta på zenit**

* **Tid för inlämning: fredag 12/10 23.59**