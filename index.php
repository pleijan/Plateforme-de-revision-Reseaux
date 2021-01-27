

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

<br/>

<div id="global"> 
  <div id="entete">

    <h1><p>titre du site</p></h1>
    <img src="img/banniere.jpg" class="rounded banniere" alt="banniere">
    <HR width=80%>

    <h3><p>ici vous pourrez réviser tout les modules de l'INM2013 : réseau</p></h3>
    <p>
    <HR width=80%>
  </div> 
  

  <div id="contenu">  
  <h2 id = "adresseIP"> Traductions d'adresses IP </h2>
  
  <table align='center'> 
 
    <tr><td><a href="bin-dec.php"><img src="img/bin-dec.jpg" class="rounded imgGauche" alt="bin-dec"></a></td>
    <td><a href="hex-dec.php"><img src="img/hex-dec.jpg"  class="rounded imgDroite" alt="hex-dec"></a></td></tr>
    <tr><td><br/></td></tr>
    <tr><td><h2> Division de réseaux</h2></td></tr>
    
    <tr><td><a href="sousReseaux.php"><img src="img/cidr.png"  class="rounded imgGauche" alt="cidr"></a></td>
    <td><a href="hex-dec.php"><img src="img/vlsm.jpg"  class="rounded imgDroite" alt="vlsm"></a></td></tr>

  <tr><td><h2> Sniffer Nmap, CRC</h2></td></tr>
 
    <tr><td><a href="index.php"><img src="img/nmap.png"  class="rounded imgGauche" alt="nmap"></a></td>
    <td><a href="index.php"><img src="img/crc.png"  class="rounded imgDroite" alt="crc"></a></td></tr>


  <tr><td><h2> Trouver l'adresse IP </h2></td></tr>
  
</table>
 
  <a href="index.php"><img src="img/trouver-adresse.jpg"  class="rounded imglongue" alt="trouver-adresse"></a>

  


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