

<!DOCTYPE html>
<html>

<?php
require("barreDeMenu.php");
?>

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