# Tesztjegyzőkönyv

Teszteléseket végezte: Göröcs Lajos Zsolt

Operációs rendszer: Linux (Arch és Gentoo)

Ebben a dokumentumban lesz felsorolva az elvégzett tesztek elvárásai és eredményei, illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| 1 | 2023. 04. 24. | Bejelentkező oldalról a felületi elemekkel bejelentkezünk a kezdőoldalra | Controller-ek váltásával lehet csak eljutni oldalak között | adatbázis üres, nem működik |
| 2 | 2023. 05. 08. | Bejelentkező oldalról a felületi elemekkel bejelentkezünk a kezdőoldalra | Controller-ek váltásával lehet csak eljutni oldalak között | adatbázis üres, nem működik, de a front-end dinamikus lenne |

Az Alfa tesztelés során a vizsgált elemek közül a front-end szép és reagálnak a gombok, de nem küldenek a back-end-nek információt, mert még nincs back-end (még CRUD sem).

A front-endben Blade és CSS nyelvekkel már megtalálhatóak a dinamizmus csírái, a kódban le van implementálva az az eset, amikor meglévő back-end esetén a navigációs sáv egyes elemei zöld színűvé válnak. A kérdés az, hogy lesz-e majd back-end, amivel már Cypress-ben is lehet tesztelni.