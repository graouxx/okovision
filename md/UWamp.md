# Installation sous WUamp (Windows - non recommandé)

Ce tuto vous présente comment installer okovision sur un ordinateur personnel sous Windows

##Installation des prérequis (Apache + Mysql + Php)
1.**Télécharger le serveur WAMP** suivant :
http://www.uwamp.com/file/UwAmp.exe

Ce logiciel vous permettra de faire fonctionner l'application OKOVISION. En effet, il va installer Apache + Php + Mysql. Ces 3 logiciels sont nécessaires pour exécuter des applications de type Web.
Il est préférable d'installation Okovision sur une serveur linux (Rapsberry, Nas, etc) que sur une ordinateur de bureau sous windows. Mais si vous n'avez que cela, voici la solution.

2.**Double cliquez sur le fichier télécharger**

![](/wiki/windows/w-0010-wamp.png)

3.**Lancer l'installation** en suivant les instructions ci-dessous

![](/wiki/windows/w-0020-wamp.png)
![](/wiki/windows/w-0030-wamp.png)

Vous devez choisir l'emplacement d'installation, je l'ai mis à la racine du D:, mais vous pouvez le mettre sur la racine du C:


![](/wiki/windows/w-0050-wamp.png)

4.**Lancer le serveur Uwamp** via l'icone sur votre bureau

![](/wiki/windows/w-0060-wamp.png)

5.**Modifier les préferences**

![](/wiki/windows/w-0070-wamp.png)
![](/wiki/windows/w-0080-wamp.png)

Vous pouvez laisser Uwamp comme cela pour le moment, nous y reviendrons.

Pour + d'info sur Uwamp : http://www.uwamp.com/fr/?page=doc

6.**Activer le module SSL**

ce module est très important, il va vous permettre de récuperer les mises à jour

Aller dans Php Config
![](/wiki/windows/w-0071-wamp.png)

Selection php_openssl.dll et cliquer sur "OK"
![](/wiki/windows/w-0072-wamp.png)

###Installer Okovision
1.**Télécharger** l'application [OkOvision](/#download)


le fichier doit etre celui-ci (au numero de version pret)

![](/wiki/windows/w-0010-oko.png)

2.**Creation du repertoire** Okovision

Aller dans le repertoire www et creer dedans un repetoire avec le nom "okovision"
![](/wiki/windows/w-0020-oko.png)
![](/wiki/windows/w-0030-oko.png)
![](/wiki/windows/w-0040-oko.png)

3.**Copie des fichiers** de l'application 

Double cliquez sur le zip que vous avez téléchargé

![](/wiki/windows/w-0010-oko.png)

Descendez dans le répertoire jusqu’à voir la liste ci-dessous. Sélectionnez tous et faites "copier"

![](/wiki/windows/w-0050-oko.png)

4.**Retourner dans Uwamp**

Aller dans le repertoire okovision que vous avez creer a l'étape 2 et faite "coller"

![](/wiki/windows/w-0060-oko.png)

5.**Tester le bon fonctionnement**

Ouvrez votre navigateur Web et allez sur l'adresse http://localhost/okovision

Vous devriez voir cette page

![](/wiki/oko/w-0080-oko.png)
