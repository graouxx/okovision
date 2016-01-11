# API - Interface de communication

Okovision dispose d'une API. Cela vous permet d'agir sur Okovision au travers de cette api sans passer par son interface graphique.
cela vous permet aussi d'agir sur votre directement sur chaudiere via cette api.

## Fonctionnement

Les appels sont des GET, et l'api retourne du Json
Vous devez fournir dans votre GET votre TOKEN-API (visible dans la page "A propos")

Exemple  :
* http://okovision/api.php?token=sdjknrjkfndvjb&type=admin&action=getFileFromChaudiere
* http://okovision/api.php?token=sdjknrjkfndvjb&type=rt&action=setBoilerMode&mode=2&way=1

## Liste des services disponibles

clef de lecture
* api.php?token=sdjknrjkfndvjb&type=admin&action=getSaisons
* api.php?token=sdjknrjkfndvjb&type=graphique&action=getGrapheAsso&id=1

* admin : 
   * getFileFromChaudiere
   * getHeaderFromOkoCsv
   * getSaisons
   * checkUpdate
   * getVersion
* graphique :
   * getCapteurs
   * getGrapheAsso :
      * id : fournir l'id du graphique (rendu.getGraphe)
* rendu :
   * getGraphe
   * getGrapheData :
      * id : id du graphique (rendu.getGraphe)
      * day : jour voulu, format YYYY-MM-DD
   *  getIndicByDay :
      * day : jour voulu, format YYYY-MM-DD
* rt :
   * getBoilerMode (permet de connaitre le mode de fonctionnement d'un circuit de chauffage -> Arret / Reduit / Confort / Auto) :
      * way : numero du circuit
   * setBoilerMode (permet de forcer le mode d'un circuit)
      * way : numero du circuit
      * mode : 0 - arret / 1 - Auto / 2 - Confort / 3 - Reduit