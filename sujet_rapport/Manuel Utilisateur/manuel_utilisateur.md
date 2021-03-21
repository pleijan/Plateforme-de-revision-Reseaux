---
title: 'Manuel Utilisateur : Outil pédagogique pour le module de réseau'
author: ''
date: "20/03/2021"
output:
  pdf_document:
    number_sections: yes
  word_document:
    toc: yes
  html_document:
    toc: yes
    df_print: paged
---
<br><br><br><br> Ce projet a été réaliser dans le cadre d'un projet tutoré pour l'Iut de Vélizy. Il a été tutoré par M.Hoguin.
C'est un outil qui vous aidera à mieux comprendre par des applications et des cours le module réseau de première année.

Chaque pages est composé d'une partie cours, et d'une partie application qui permet de tester vos résultats.
En accédant au site, vous trouverez sur la page d'accueil un menu en haut, qui permettra d'acceder aux différentes fonctionnalités énoncé précedemment.
\vspace{10mm} <br><br>

![Le menu](menu.png)

\vspace{100mm} <br><br><br>

De même pour toute les petites images qui se situent plus bas dans cette page.

![Images permettant d'accéder aux fonctionnalités](imgMenu.png)

\newpage

<br><br><br>

# Traduire une adresse IP de binaire à décimal ou inversement

Pour accéder à cette fonctionnalité, cliquez sur "**Conversion adresses IP**" puis "**Binaire -> Décimal**".
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Sur cette page vous pourrez effectuer des traductions d'adresses IP de binaire à décimal et inversement.

Tout d'abord, vous pouvez accéder au cours via le lien pointé par la flèche bleu (voir image ci-dessous) et une petite fenêtre apparaîtra.\newline 
Ensuite, la première étape est d'écrire dans le champ, l'adresse IP séparer par des points.\newline  N'inscrivez pas de lettre, et écrivez une adresse IP correcte sinon une erreur apparaîtra.\newline 
Puis, choisissez votre mode de conversion grâce aux radios boutons.\newline 
Et enfin appuyer sur le bouton "**Valider**".

![](bin-dec.png)

\vspace{10mm}

<br><br>

Le résultat apparaît:

![Resultat de la traduction Décimal à binaire de l'adresse : 192.168.3.10](Resultat_bin-dec.png)

\vspace{10mm}

<br><br>

Procédez de la même façon pour la traduction de binaire à décimal.

![Exemple pour une traduction binaire](bin-dec_Ex.png)

\newpage

<br><br><br>

# Traduire une adresse IP d'héxadécimal à décimal ou inversement

Pour accéder à cette fonctionnalité, cliquez sur "**Conversion adresses IP**" puis "**Héxadécimal -> Décimal**".
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Sur cette page vous pourrez effectuer des traductions d'adresses IP d'Héxadécimal à décimal et inversement.
Vous pouvez accéder au cours via le lien pointé par la flèche bleu (voir image ci-dessous) et une petite fenêtre apparaîtra.

Tout d'abord, la première étape est d'écrire dans le champ, l'adresse IP séparer par des points. N'inscrivez pas de lettre, et écrivez une adresse IP correcte sinon une erreur apparaîtra.\newline
Puis, choisissez votre mode de conversion grâce aux radios boutons.
Et enfin appuyer sur le bouton "**Valider**".

![](hex-dec.png)

\vspace{30mm}

<br><br>

Le résultat apparaît:

![Resultat de la traduction Décimal à binaire de l'adresse : 192.168.3.10](Resultat_hex-dec.png)

\vspace{20mm}

<br><br>

Procédez de la même façon pour la traduction héxadécimal à décimal.

![Exemple pour une traduction héxadécimal](hex-dec_Ex.png)

\newpage

<br><br><br>

# Diviser un réseau en sous-réseaux avec la notation CIDR

Pour accéder à cette fonctionnalité, cliquez sur "**Division de réseaux**" puis "**Notation CIDR**".
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Sur cette page vous pourrez diviser un réseau en sous-reseau avec la notation CIDR. \newline
Vous pouvez accéder au cours via le lien pointé par la flèche bleu (voir image ci-dessous) et une petite fenêtre apparaîtra.

Pour diviser le réseau en sous-réseaux, il vous faut l'adresse réseau de ce réseau. Pour cela, entrez une adresse IP dans le premier champ (Voir ci-dessous).
N'inscrivez pas de lettre, et écrivez une adresse IP correcte sinon une erreur apparaîtra.

![Comment obtenir l'adresse réseau](cidr.png)

\vspace{20mm}

<br><br>

Vous obtiendrez l'adresse réseau.

![Résultat obtenu après avoir cliquer sur valider](Resultat_cidr.png)

\vspace{20mm}

<br><br><br>

Ensuite, il y a d'autres champs qui cette fois-ci vous permettront de diviser le réseau en sous-réseau.
Tout d'abord, entrez une **adresse réseau** dans le champ correspondant. \newline
**Attention ! Si vous entrez une adresse machine une erreur apparaîtra.**

Ensuite, précisez le masque avec la notation CIDR (avec le slash ' / '), ou bien le masque séparer de points.
Puis, il vous faut précisez le nombre de sous-réseau avec lequel vous voulez diviser votre réseau.\newline
Enfin, appuyer sur le bouton "**Valider**". \newline
**Attention ! Si vous demandez un nombre de sous-réseaux qui dépasse le nombre de sous-réseaux maximum que peut accueillir ce réseau, une erreur apparaîtra .**


![Diviser le réseau en sous-réseau](cidr2.png)

\vspace{20mm}

<br><br>

Différentes informations sur les sous-réseaux apparaissent, comme le nombre d'hotes disponible au total, leurs adresse de réseau, de broadcast, ainsi leurs plages d'adresses disponible.


![Resultat après avoir cliquer sur valider](Resultat_cidr2.png)


\newpage

<br><br><br>

# Diviser un réseau en sous-réseaux avec la notation VLSM

Pour accéder à cette fonctionnalité, cliquez sur "**Division de réseaux**" puis "**Notation VLSM**".
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Sur cette page vous pourrez diviser un réseau en sous-reseau avec la notation VLSM.
Vous pouvez accéder au cours via le lien pointé par la flèche bleu (voir image ci-dessous) et une petite fenêtre apparaîtra.

Pour diviser le réseau en sous-réseaux, il vous faut l'adresse réseau de ce réseau. Pour cela, entrez une adresse IP dans le premier champ (Voir ci-dessous).
N'inscrivez pas de lettre, et écrivez une adresse IP correcte sinon une erreur apparaîtra.

![Comment obtenir l'adresse réseau](vlsmRes.png)

\vspace{20mm}

<br><br>

Vous obtiendrez l'adresse réseau.

![Résultat obtenu après avoir cliquer sur valider](Resultat_vlsmRes.png)

\vspace{25mm}

<br><br><br>

Ensuite, il y a d'autres champs qui cette fois-ci vous permettront de diviser le réseau en sous-réseau.\newline
Tout d'abord, entrez une **adresse réseau** dans le champ correspondant. \newline
**Attention ! Si vous entrez une adresse machine une erreur apparaîtra.**

De plus, précisez le masque avec la notation CIDR (avec le slash ' / '), ou bien le masque séparer de points.
Puis, grâce au bouton add marquer avec le signe plus (' + '), vous pouvez ajouter un sous-réseau, pour pouvoir préciser le nombre d'hôtes que vous voulez sur chaque sous-réseaux. \newline Si vous voulez vous débarasser d'un sous-réseau, il suffit d'appuyer sur la croix rouge. \newline
Enfin, appuyer sur le bouton **Valider**. \newline
**Attention ! Si vous demandez un nombre d'hôtes qui dépasse le nombre d'hôtes maximum que peut accueillir ce réseau, une erreur apparaîtra .**

![Diviser le réseau en sous-réseau](vlsm.png)

\vspace{25mm}

<br><br>

Différentes informations sur les sous-réseaux apparaissent, comme le nombre d'hotes disponible au total, leurs adresse de réseau, de broadcast, ainsi leurs plages d'adresses disponible.


![Resultat après avoir cliquer sur valider](Resultat_vlsm.png)

\newpage

<br><br><br>

# Calculer un CRC Matriciel et Polynomial

Pour accéder à cette fonctionnalité, cliquez sur "**Calcul de CRC de type ethernet**"
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Sur cette page vous pourrez calculer un CRC matriciel et polynomial.
Vous pouvez accéder au cours ainsi qu'aux vidéos via le lien pointé par les flèches bleues (voir image ci-dessous) et une petite fenêtre apparaîtra.

\vspace{7mm}

<br>

## Commençons tout d'abord, par calculer un CRC matriciel.
**Attention ! Pour chaque champ, il ne faut que saisir des nombres binaires.** \newline
Il faut d'abord entrer le message dans le champ correspondant.

![](crc1.png)

\vspace{15mm}

Puis choisir la taille de la matrice.

![](crc2.png)

\newpage

<br><br>

Saisir la matrice génératrice.

![](crc3.png)

\vspace{15mm}

<br><br>

Et enfin cliquer sur le bouton "**Valider**".
Et le résultat apparaît.

![](Resultat_crc.png)

\newpage

<br><br><br>

## Passons maintenant au CRC polynomial

De même, vous devez remplir les champs en y inscrivant dans un premier temps le message, puis le nombre de zéros que l'on souhaite rajouter au message.\newline De plus, il faut renseigner le polynôme. \newline
**Attention ! Pour chaque champ, il ne faut que saisir des nombres binaires.**

![](crc4.png)

\vspace{15mm}

<br><br><br>

Et enfin cliquer sur le bouton "**Valider**".
Et le résultat apparaît.

![](Resultat_crc2.png)


\newpage

# nmap

Pour accéder à cette fonctionnalité, cliquez sur "**Exécution commande réseaux**" puis sur **nmap**. \newline
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

Avec nmap vous pouvez scanner un réseau, pour obtenir diverses informations sur celui-ci comme les hôtes disponibles, les ports ouverts...

Il vous suffit simplement d'écrire une adresse IP ou bien une URL dans le champ, et appuyer sur le bouton "*Valider*".
\newline En faisant cela vous exécutez la commande suivante : **nmap www.google.com**

![](nmap.png)

\vspace{15mm}

<br><br><br>

Et le résultat de la commande apparaît.

![](Resultat_nmap.png)

\newpage

<br><br><br>

# nslookup

Pour accéder à cette fonctionnalité, cliquez sur "**Exécution commande réseaux**" puis sur **nslookup**.\newline
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

nslookup permet d'interroger les serveurs DNS pour obtenir les informations définies pour un domaine déterminé.
Il vous suffit simplement d'écrire une adresse IP ou bien une URL dans le champ, et appuyer sur le bouton "**Valider**".\newline En faisant cela vous exécutez la commande suivante : **nslookup www.google.com**

![](nslookup.png)

\vspace{15mm}

<br><br>

Et le résultat de la commande apparaît.

![](Resultat_nslookup.png)

<br><br><br>

# tcpdump

**/!\ Work in progress**

\newpage

<br><br><br>

# ping

Pour accéder à cette fonctionnalité, cliquez sur "**Exécution commande réseaux**" puis sur **ping**. 
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

ping vous permet de tester l'accessibilité d'une autre machine à travers un réseau IP.\newline Pour pouvoir exécuter la commande sur le site, il est nécessaire de préciser le nombre de ping que l'on veut envoyé.\newline Pour cela, il faut tout d'abord inscrire une adresse IP ou une URL, c'est l'adresse que l'on veut ping. \newline Ensuite, précisez le nombre de ping. \newline Enfin appuyer sur le bouton "**Valider**". \newline
En faisant cela vous exécutez la commande suivante : **ping -c 5 www.uvsq.fr**

![](ping.png)

\vspace{15mm}

<br><br>

Et le résultat de la commande apparaît.

![](Resultat_ping.png)

\newpage

<br><br><br>

# man

Pour accéder à cette fonctionnalité, cliquez sur "**Exécution commande réseaux**" puis sur **man**.
Ou bien cliquez sur l'image correspondante à partir de l'accueil.

La commande man vous permet de visionner le manuel/mode d'emploi une commande. Il suffit d'inscrire la commande pour laquelle on veut voir le manuel, appuyer sur le bouton "**Valider**" et le manuel s'affichera.
\newline
En faisant cela vous exécutez la commande suivante : **man ls**

![](man.png)

\vspace{15mm}

<br><br>

Et le résultat de la commande apparaît.

![](Resultat_man.png)

Rappelez-vous de toujours RTFM ;) !

\newpage

<br><br><br>

# glossaire

Pour accéder à cette fonctionnalité, cliquez sur "**glossaire**". Elle répertorie les différents mots techniques ainsi que leurs définitions.

Si vous êtes **admin**, vous pouvez modifier ajouter des mots supplémentaires au glossaire ainsi que modifier les définitions des mots ou même supprimer ces mots.\newline Pour cela cliquez sur **modifier la table**.

![](modif_glossaire.png)

<br><br>

Un formulaire de connexion apparaîtra, inscrivez-y le login et le mot-de-passe.

![](connexionGlossaire.png)

<br><br>

Pour ajouter des mots au glossaire, cliquez sur **ajouter des mots**, et pour modifier ou supprimer des mots cliquez sur **modifier ou supprimer des mots**

![](glossaire-admin.png)


\newpage

<br><br><br>

## L'option Ajouter des mots

Pour ajouter un mot, il faut renseigner le mot dans le premier champ, ainsi que sa définition dans le deuxième. Et enfin, appuyer sur le bouton **"Valider"**

![](glossaire.png)

\vspace{15mm}

<br><br>

Et le mot apparaît dans la table.

![](glossaire2.png)

\vspace{15mm}

<br><br><br>

## L'option modifier ou supprimer des mots

Pour modifier la définition d'un mot, il faut cliquer sur **l'icone crayon**.
Ainsi un champ apparait, vous pouvez désormais renseigner la nouvelle définition du mot.
Pour supprimer un mot, il faut cliquer sur la **croix rouge**.

![](glossaire3.png)

\vspace{15mm}

<br><br>

La modification de la définition du mot a bien été pris en compte.

![](glossaire4.png)


Lorsque vous avez terminez vous pouvez vous deconnectez.