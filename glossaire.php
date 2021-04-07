
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
    echo"<div style='margin-left: 10%'>
          <div style='width: 90%'><table cellpadding='4' cellspacing='4' align='center' border ='2' class='table table-bordered table-hover' >
    <tr><td><h4 align='center'><u><b>Mots</b></u></h4></td><td><h4 align='center'><u><b>Définition</b></u></h4></td></tr>";
    while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        if($row%2==0)
                echo"<tr class='table-info'>";
        else
            echo"<tr>";
        echo "<td><p align='center'>$data[0]</p></td><td><p align='center'>$data[1]</p></td></tr>";
    }
    echo"</table></div></div>";
    fclose($handle);
}

echo"<h2><a href='connexion.php'> Modifier la table</a></h2>";

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

