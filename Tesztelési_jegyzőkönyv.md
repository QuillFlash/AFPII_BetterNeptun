# Tesztjegyzőkönyv

Teszteléseket végezte: Varró Bence

Operációs rendszer: Windows 10

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
|---|---|---|---|---|
| Login oldal input mező(k) | 2022.04.24. | Üres mezőkkel való bejelentkezésre figyelmeztető üzenetet dob a felhasználónak. | Figyelmeztető mező értesíti a felhasználót a hiányzó belépési adatokról. | Figyelmeztető mező értesíti a felhasználót a hiányos belépési adatokról. | Nincs hiba. |
| Login oldal input mező(k) | 2023.04.24. | Üres neptun kód mezővel való bejelentkezésre figyelmeztető üzenetet dob a felhasználónak. | Hibaüzenettel értesíti a felhasználót a mező kitöltésének szükségességéről. | Figyelmeztető mező értesíti a felhasználót a hibás inputról. | Nincs hiba. |
| Login oldal input mező(k) | 2022.04.24. | Üres jelszó mezővel való bejelentkezés figyelmeztető üzenetet dob a felhasználónak. | Hibaüzenettel értesíti a felhasználót a mező kitöltésének szükségességéről. | Figyelmeztető mező értesíti a felhasználót a hibás inputról. | Nincs hiba. |
| Login oldal input mező(k) | 2022.04.24. | Hibás adatokkal való bejelenetkezés figyelmeztető üzenetet dob a felhasználónak. | Figyelmeztető mező értesíti a felhasználót a hibás belépési adatokról. | Nem működik a back-end, hibakódot dob a laravel. | Azonnali javítást igényel. |
| Login oldal input mező(k) | 2022.04.24. | Helyes adatokkal történő bejelenetkezésre jogosultságának megfelelően átirányítja a megfelelő oldalra. | A rendszer átirányítja a felhasználót a jogosultságának megfelelő oldalra. | Sikeresen bejelentkezteti a felhasználót, viszont nem a megfelelő oldalra | A megfelelő oldal elkészítése szükséges. |
