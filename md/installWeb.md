## Pré-requis

Vous devez tout d'abord vous créez un compte chez hostinger : [Hostinger](http://www.hostinger.com)

## Création d'un espace gratuit


Choisissez l'offre gratuite

![](/wiki/hostinger/host-0010.png)

Ensuite, vous devez definir le nom de votre sous-domaine (c'est par quelle url vous allez y acceder). Dans l'exemple j'ai mis demo-okovision, j'accederai à l'application par l'url http://demo-okovision.esy.es

**Vous pouvez mettre ce que vous voulez comme sous-domaine par exemplte "toto.esy.es", "machaudiere.ezy.es", etc**

![](/wiki/hostinger/host-0020.png)

Soit vous saisissez le mot de passe, soit vous le génerez. Pensez à le noter quelque part il pourra vous être utile. 
Pour l'installation d'Okovision, il ne sera pas utilisé.

![](/wiki/hostinger/host-0030.png)

Cliquez sur continuer pour finaliser la création de votre sous-domaine

Vous devrez attendre que la creation du sous-domaine soit terminée. Lorsque vous verrez le statut à **Actif**, le création sera terminée

![](/wiki/hostinger/host-0040.png)



## Installation d'okovision

Aller sur le site des  [sources d'okovision](https://github.com/stawen/okovision)

Cliquez sur l'icone entourée en rouge. Cela va mettre en mémoire l'url des sources de l'application (utile pour les étapes suivantes)

![](/wiki/hostinger/host-0050.png)


Dans sur hostinger, cliquez sur l'icone + et faite "Gérer"

![](/wiki/hostinger/host-0070.png)

Aller dans le menu GIT

![](/wiki/hostinger/host-0060.png)


Dans le champ "repository adress" vous faites coller (ctrl + v), puis creer.

![](/wiki/hostinger/host-0080.png)

Automatiquement vous êtes dans l'espace GIT / Manage repositories, vous cliquez sur DEPLOY

![](/wiki/hostinger/host-0090.png)

Vous confirmez

![](/wiki/hostinger/host-0100.png)

Lorsque vous voyez succes comme ci-dessous, la copie des fichiers est terminée

![](/wiki/hostinger/host-0110.png)

Via le menu de gauche, cliquez sur Base de données MySQL

![](/wiki/hostinger/host-0120.png)

le numéro uxxxxxx sera différent pour vous, cela est normal il est unique par utilisateur. rajouter oko et usr comme sur l'image ci-dessous. Générer un mot de passe.
**Attention**, notez bien le nom de la base, le nom de l'utilisateur Mysql et son mot de passe, nous en aurons besoin juste après.

![](/wiki/hostinger/host-0130.png)

Après avoir cliqué sur "Créer" vous devez voir cela, la liste des bases de données

![](/wiki/hostinger/host-0140.png)

Dans le fils d'ariane en haut de la page du tableau de bord, vous pouvez voir l'url de connexion 

![](/wiki/hostinger/host-0150.png)

Saisissez la dans votre navigateur

![](/wiki/hostinger/host-0160.png)

Si tout va bien, le setup d'okovision se lance.
Vous devez saisir les informations demandées (le nom du serveur de la base = hote Mysql, la nom de la base de données, l'utilisateur et le mot de passe)


![](/wiki/hostinger/host-0170.png)

Cliquez sur tester, et si okovision vous dit OK, alors vous pouvez terminer le [setup](/md/setup.md)

### Configuration de la récuperation automatique du fichier csv

* [Cron - hostinger](/md/cronHostinger.md)
* [Configurer sa box pour rendre accessible la chaudiere depuis internet](/md/box.md)