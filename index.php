

<!DOCTYPE html>
<html>
<head>  <!-- cette section "head" contient tout ce qui s'occupe des feuilles de style  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
  <title>Technologie</title>
  <link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body> <!-- cette section "body" contientla barre de navigation en haut de la page ainsi que tout contenu de la page avec d'abord un entete et en suite le reel contenu -->

<table id="blocmenu" align="center" > 
  <tr id="menu"> 
    <td><a class='active' href="index.php"><img src='img\logo.png' width='90px'/></a></td>
    <td><a href="bin-dec.php">conversion adresse ip<br>binaire -> decimal</a></td>
    <td><a href="hex-dec.php">conversion adresse ip<br>hexadecimal -> decimal</a></td>
    <td><a href="sousReseaux.php">création de sous réseaux a<br>partir d'une adresse ip</a></td>
    <td><a href="index.php">Calculer un CRC<br>de type Ethernet</a></td>
    <td><a href="index.php">Proposer un sniffer<br>nmap</a></td>
    <td><a href="index.php">Trouver l’adresse IP d’une<br>machine extérieure</a></td>
  </tr>
</table>

<div id="global"> 
  <div id="entete">   
    <h1><p>titre du site</p></h1>
    <HR width=80%>
    <h3><p>ici vous pourrez réviser tout les modules de l'INM2013 : réseau</p></h3>
    <p>
    <HR width=80%>
  </div> 
  

  <div id="contenu">  
  <h2> Pour tout ce qui concerne les traduction d'adresse ip :</h2>
  
  <table align='center'> 
 
    <tr><td><a href="bin-dec.php">conversion adresse ip binaire -> decimal</a></td></tr>
    <tr><td><a href="hex-dec.php">conversion adresse ip hexadecimal -> decimal</a></td></tr>

  </table>

  <h2> Pour tout ce qui concerne les sous réseaux d'adresse ip :</h2>
  
  <table align='center'> 
 
    <tr><td><a href="sousReseaux.php">création de sous réseaux a partir d'une adresse ip</a></td></tr>

  </table>

  <h2> Pour tout ce qui concerne les CRC ou les sniffer de nmap :</h2>
  
  <table align='center'> 
 
    <tr><td><a href="index.php">Calculer un CRC de type Ethernet</a></td></tr>
    <tr><td><a href="index.php">Proposer un sniffer nmap</a></td></tr>

  </table>

  <h2> Pour trouver l'adresse ip d'une autre machine de votre réseaux local :</h2>
  
  <table align='center'> 
 
    <tr><td><a href="index.php">Trouver l’adresse IP d’une machine extérieure</a></td></tr>

  </table>


  </div>   
</div> 
</body>
<footer>
</footer>
</html>
<?php
?>