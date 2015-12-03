# Migration de UWamp (Windows) vers Hostinger

## Pré-requis

Mettez à jour votre version installé sur votre windows
Procédez a l'installation d'okovision sur hostinger.

La tuto ci-dessous va vous expliquer comment transférer vous données de Uwamp vers hostinger
Si l'export avec PhpMyadmin ne fonctionne pas car vous avez trop de volume, utiliser la methode avec HeidiSQL (decrit plus bas)

## Export des données sur windows avec PhpMyadmin

lancer phpmyadmin

![](/wiki/hostinger/mig/mig-0010.png)


login : root

pass: root

![](/wiki/hostinger/mig/mig-0020.png)

Un fois loggé, aller sur "Exporter"

![](/wiki/hostinger/mig/mig-0030.png)

Choisissez "Personnalisée" et faites comme sur les images ci-dessous

![](/wiki/hostinger/mig/mig-0040.png)
![](/wiki/hostinger/mig/mig-0050.png)
![](/wiki/hostinger/mig/mig-0060.png)

Après avoir fait "Executer", Vous allez télécharger un fichier localhost.sql.gz

![](/wiki/hostinger/mig/mig-0070.png)

## Export des données sur windows avec HeidiSQL

Télécharger [HeidiSQL](http://www.heidisql.com/downloads/releases/HeidiSQL_9.3_Portable.zip) (c'est la version portable)
Cela veut dire que vous n'avez cas decompresser le .zip et a lancer le programme.

Lancer HeidiSql

![](/wiki/hostinger/mig/mig-0140.png)

Renseigner le champs comme dans l'image ci-dessous (utilisateur : root / mot de passe : root) et cliquez sur "Ouvrir"

![](/wiki/hostinger/mig/mig-0150.png)

Le programme se lance et vous devez voir cela

![](/wiki/hostinger/mig/mig-0160.png)

Faites, clic droit sur la base okovision, puis exporter

![](/wiki/hostinger/mig/mig-0170.png)


### Export total pour remplacement total de la base sur hostinger

Pour remplacer l'ensemble de donnée chez hostinger, choissiser les parametres suivant entouré de rouge.
Pour le nom du  fichier sql, metter le dans un emplacement que vous pourrez retrouver facilement.

![](/wiki/hostinger/mig/mig-0180.png)

Lorsque le message ```Compression done``` apparait, vous pouvez cliquer sur "fermer"

### Export partiel pour mise a jour de la base sur hostinger et reprise de l'historique

Pour mettre a jour les données chez hostinger, choissiser les parametres suivant entouré de rouge.
Pour le nom du  fichier sql, metter le dans un emplacement que vous pourrez retrouver facilement.

![](/wiki/hostinger/mig/mig-0200.png)

Lorsque le message ```Compression done``` apparait, vous pouvez cliquer sur "fermer"



## Importer les données chez hostinger

Retournez dans Hostinger, section "Bases" / "importer"

![](/wiki/hostinger/mig/mig-0080.png)

Selectionner la base correspondant à Okovision (cf installation)

![](/wiki/hostinger/mig/mig-0090.png)

Cliquer sur "Upload" et aller chercher le fichier localhost.sql.gz

![](/wiki/hostinger/mig/mig-0100.png)
![](/wiki/hostinger/mig/mig-0110.png)

Si l'import des données s'est bien passée, vous aurez le message suivant :

![](/wiki/hostinger/mig/mig-0120.png)

Allez sur okovision (ici http://demo-okovision.esy.es/ )

Si des graphiques s'affichent, tout est ok, la migration est terminée. Vous pouvez supprimer Uwamp.

![](/wiki/hostinger/mig/mig-0130.png)


