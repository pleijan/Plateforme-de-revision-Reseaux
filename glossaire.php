
<?php
require("barreDeMenu.php");
session_start();
if (isset($_SESSION['id'])){header ('Location: glossaire_admin.php');}
?>

<br/>

<h5 align='center'><p>Sur cette page vous avez tout les mots clés utilisés sur le site :</p></h5>
<HR width=1240>
    <h3 align='center'><b>Glossaire</b></h3>
<HR width=1240>

<?php

$row = 1;
if (($handle = fopen("cours/glossaire.csv", "r")) !== FALSE) {
    echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>
    <tr><td><h4 align='center'><u>Mots</u></h4></td><td><h4 align='center'><u>Définition</u></h4></td></tr>";
    while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        echo "<tr><td><p align='center'>$data[0]</p></td><td><p align='center'>$data[1]</p></td></tr>";
    }
    echo"</table>";
    fclose($handle);
}

echo"<h2><a href='connexion.php'> modifier la table :</a></h2>";

?>

<footer>
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>

