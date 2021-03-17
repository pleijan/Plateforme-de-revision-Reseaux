
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
        echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>
        <tr><td><h4 align='center'><u>Mots</u></h4></td><td><h4 align='center'><u>Définition</u></h4></td></tr>";
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            $num = count($data);
            $row++;
            echo "<tr><td><p align='center'>$data[0]</p></td><td><p align='center'>$data[1]</p></td></tr>";
            $listemot[$i]= $data[0];
            $i++;
        }
        echo"</table>";
        fclose($handle);
    }
    $strListeMot = implode(",", $listemot);

    echo"<h3><a href='ajoutGlossaire.php?listeMot=$strListeMot'> ajouter des mots </a> / <a href='supprGlossaire.php'> supprimer ou modifier des mots </a></h3>
    <br/>
    <h3><a href='deconnexion.php'> se deconnecter </a><h3>";
}else header('Location: connexion.php?err=0');

?>
