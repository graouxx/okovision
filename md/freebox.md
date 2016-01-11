# Avec FreeBox de FREE

Dans un premier temps, il faut faire la demande d’un adresse ip fixe. 
Si vous êtes en zone dégrouper, c’est déjà le cas, sinon il faut suffit de vous rendre sur le portail free. 
(Attention vous pouvez rester parfois jusqu’a 24h sans connexion internet après le reboot de la freebox). 

Le plus sage c’est donc de faire la demande puis d’attendre 24heures avant le reboot.

![](/wiki/freebox/freebox-0010.png)


Pensez à bien noté l’ip qui vous sera attribuée. Elle vous servira pour la configuration d’okovision.


Puis il faut faire un redirection des ports :

  * port interne : 80 ou 8080 <ceci est le port d'ecoute de votre chaudière>
  
  * port externe : 80 ou 8080 <comme vous voulez>
  
  * protocole : TCP


![](/wiki/freebox/freebox-0020.png)


Dans Okovision, Configuration Générale, vous pouvez maintenant indiquer l'ip de votre chaudière avec les informations fournis ci-dessus ( ip:port_externe )
  