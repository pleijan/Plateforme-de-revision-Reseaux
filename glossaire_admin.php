
<?php
require("barreDeMenu.php");
session_start();

if (isset($_SESSION['id'])){
    echo"<br/>

    <h5 align='center'><p>Sur cette page vous avez tout les mots clés utilisés sur le site :</p></h5>
    <HR width=1240>
        <h3 align='center'><b>Glossaire</b></h3>
    <HR width=1240>";


    $row = 1;
    $i=0;
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
            $listemot[$i]= $data[0];
            $i++;
        }
        echo"</table></div></div>";
        fclose($handle);
    }
    $strListeMot = implode(",", $listemot);

    echo"<h3><a href='ajoutGlossaire.php?listeMot=$strListeMot'> Ajouter des mots </a> / <a href='supprGlossaire.php'> Supprimer ou modifier des mots </a></h3>
    <br/>
    <h3><a href='deconnexion.php'> se deconnecter </a><h3>";
}else header('Location: connexion.php?err=0');

?>
</h3>
<footer>
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>
