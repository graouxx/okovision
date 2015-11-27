# Migration de UWamp (Windows) vers Hostinger

## Pré-requis

Mettez à jour votre version installé sur votre windows
Procédez a l'installation d'okovision sur hostinger.

La tuto ci-dessous va vous expliquer comment transférer vous données de Uwamp vers hostinger

## Export des données sur windows

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


