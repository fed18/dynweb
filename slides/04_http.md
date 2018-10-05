build-lists: true

# HTTP

---

## Två primära metoder

* `GET`   -> Hämtar data (oftast från databas)
* `POST`  -> Skickar data (oftast till databas)

---

* REQUEST
  - `HEAD`
  - `BODY`
* RESPONSE
  - `HEAD`
  - `BODY`

---

* När vi klickar på en länk så gör vi en `GET`-request
* När vi besöker en hemsida gör vi en `GET`-request
* När vi skickar ett formulär gör vi en `POST`-request

---

* Allting efter `?` i din URL kallas `query` och kan ses som variabler
* `https://mysite.com?name=jesper&age=62`
* Varje ny variabel separeras med `&`
* Värdet tilldelas med  `=`

---

### _Oftast när vi skickar ett formulär så syns inte våra variabler i URLen utan de lagras i förfrågans `body` som är dold_.

---

### _Detta möjliggör att vi kan skicka variabler mellan olika sidor och olika domäner och är <br/> **hur hela webben fungerar**_.

---

# __*D E M O*__