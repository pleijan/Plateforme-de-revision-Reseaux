

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
    <h2 id = "adresseIP"><HR width=50%> Traductions d'adresses IP <HR width=50%> </h2>
     
  <table align='center' cellpadding="2"> 
 
    <tr><td><a href="bin-dec.php"><img src="img/bin-dec.png" class="rounded imgGauche" alt="bin-dec" title="Traduire les adresses IP de Binaire à Décimal ou inversement"></a></td>
    <td><a href="hex-dec.php"><img src="img/hex-dec.png"  class="rounded imgDroite" alt="hex-dec" title="Traduire les adresses IP de Hexadécimal à Décimal ou inversement"></a></td></tr>
    <tr><td><br/></td></tr>

    <tr><td ><h2> <HR width=100%>  Division de réseaux <HR width=100%> </h2></td></tr>
    
    <tr><td><a href="sousReseaux.php"><img src="img/cidr.png"  class="rounded imgGauche" alt="cidr" title="Division de réseaux en sous-réseaux avec la notation CIDR"></a></td>
    <td><a href="hex-dec.php"><img src="img/vlsm.png"  class="rounded imgDroite" alt="vlsm" title="Division de réseaux en sous-réseaux avec la notation VLSM"></a></td></tr>

    <tr><td><h2><HR width=100%> Sniffer Nmap, CRC<HR width=100%></h2></td></tr>
    <tr><td><a href="index.php"><img src="img/nmap.png"  class="rounded imgGauche" alt="nmap" title="Sniffer Nmap"></a></td>
    <td><a href="index.php"><img src="img/crc.png"  class="rounded imgDroite" alt="crc" title="Calcul de CRC de type Ethernet"></a></td></tr>

    <tr><td><h2> <HR width=100%>Trouver l'adresse IP <HR width=100%></h2></td></tr>
</table>
 
  <a href="index.php"><img src="img/trouver-adresse.png"  class="rounded imglongue" alt="trouver-adresse" title="Trouver l'adresse IP d'une machine extérieure"></a>

  


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