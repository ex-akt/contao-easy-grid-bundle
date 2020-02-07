# Contao Easy Grid Bundle

Dieses Bundle vereinfacht das Handling 
der Erweiterung [euf_grid](https://packagist.org/packages/erdmannfreunde/euf_grid) 
von [ErdmannFreunde](https://erdmann-freunde.de/) im [CMS Contao](https://contao.org).

## Installation
```
composer require ex-akt/contao-easy-grid-bundle
```

## Anwendung
Die Erweiterung legt sich über die Erweiterung euf_grid und stellt auf Artikel-Ebene 
die Möglichkeit bereit, die horizontale Aufteilung zu wählen.

Dabei gibt es 2 unterschiedliche Möglichkeiten:

### Feste Aufteilung
Die Aufteilungsoptionen werden fest eingetragen (z.B. ganze Breite, halbe Breite).
Dabei können, je nach Anzahl von Elementen Spalten leer bleiben oder mehrere Zeilen 
angelegt werden. 

### Flexible Aufteilung
Die Breite der einzelnen Spalten werden so festgelegt, dass abhängig von der Anzahl der Elemente im Artikel,
die volle Breite der Zeile ausgenutzt wird.

### Element Spalten-Verbinder (Grid-Glue)
Das Content-Element Spalten-Verbinder fasst die beiden benachbarten Elemente zu einer Spalte zusammen.

### Einschränkung
Sobald ein ContentElement im Artikel eine Anweisung für das Grid-Verhalten wählt, ignoriert
Contao die Grid-Aufteilung. (Ein Hinweis wird im Backend angezeigt)

## Erweitern
TODO: Configuration der Grid-Aufteilungen über die config.yml (Hilfestellung willkommen!)

## Danke
Ein großes Danke für die gute Grid-Grundlagenarbeit von [Erdmann Freunde](https://erdmann-freunde.de/) 
und das ebenfalls gelungene [euf_nutshell](https://packagist.org/packages/erdmannfreunde/euf_nutshell).



