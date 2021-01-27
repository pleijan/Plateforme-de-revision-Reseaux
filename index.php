

<!DOCTYPE html>
<html>
<head>  <!-- cette section "head" contient tout ce qui s'occupe des feuilles de style  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
  <title>Technologie</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body> <!-- cette section "body" contient la barre de navigation en haut de la page ainsi que tout contenu de la page avec d'abord un entete et en suite le reel contenu -->


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
   <a class="navbar-brand" href="index.php"><img src='img\logo.jpg' width='260px'/></a>

  
  <ul class="navbar-nav">
   
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Conversions Adresses IP
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bin-dec.php">Binaire -> Décimal</a>
        <a class="dropdown-item" href="hex-dec.php">Hexadecimal -> Décimal</a>
      </div>
    </li>

    <!-- Links -->
     <li class="nav-item">
      <a class="nav-link" href="sousReseaux.php">Division de réseaux</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Calculer un CRC<br>de type Ethernet</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Proposer un sniffer<br>nmap</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Trouver l’adresse IP d’une<br>machine extérieure</a>
    </li>

  </ul>
</nav>

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
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>
</html>
<?php
?>