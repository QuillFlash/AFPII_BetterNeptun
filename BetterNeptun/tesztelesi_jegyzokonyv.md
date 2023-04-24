# Tesztjegyzőkönyv

Teszteléseket végezte: Göröcs Lajos Zsolt

Operációs rendszer: Linux (Arch és Gentoo)

Ebben a dokumentumban lesz felsorolva az elvégzett tesztek elvárásai és eredményei, illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| 1 | 2023. 04. 24. | Bejelentkező oldalról a felületi elemekkel bejelntkezünk a kezdőoldalra | Controller-ek váltásával lehet csak eljutni oldalak között | adatbázis üres, nem működik |

Az Alfa tesztelés során a vizsgált elemek közül a front-end szép és reagálnak a gombok, de nem küldenek a back-end-nek információt, mert még nincs back-end (még CRUD sem).
