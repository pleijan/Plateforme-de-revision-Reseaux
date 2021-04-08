
<?php

session_start();

if (isset($_SESSION['id'])){
require("barreDeMenu.php");
    echo"<br/>
    
    <h5 align='center'><p>Sur cette page vous pouvez modifier les definitions du glossaire :</p></h5>
    <HR width=1240>
        <h3 align='center'><b>Glossaire</b></h3>
    <HR width=1240>";


    $row = 1;
    if (($handle = fopen("cours/glossaire.csv", "r")) !== FALSE) {
        echo"<div style='margin-left: 10%'>
            <div style='width: 90%'><table cellpadding='4' cellspacing='4' align='center' border ='2' class='table table-bordered table-hover' >
        <tr>
        <td><h4 align='center'><u>Mots</u></h4></td>
        <td colspan=3><h4 align='center'><u>Définition</u></h4></td>";
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            $num = count($data);
            $row++;
            if($row%2==0)
                echo"<tr class='table-info'>";
            else
                echo"<tr>";
            echo "<td><p align='center'>$data[0]</p></td>
            <td><p align='center'>$data[1]</p></td>
            <td align=center><a href='supprGlossaire.php?modifdef=$data[0]&def=$data[1]'><img src='img/crayon.png' id='imgGlossaire'></a></td>
            <td align=center><a href='actionSupprGloss.php?suppr=$data[0]'><img src='img/red-cross.png' id='imgGlossaire' ></a></td></tr>
            </tr>";
        }
        echo"</table></div></div>";
        fclose($handle);
    }

    if (isset($_GET['modifdef'], $_GET['def']))
    {
        $getmodifdef = $_GET['modifdef'];
        $def= $_GET['def'];
        echo"<hr><h2>Changer la def de $getmodifdef</h2><hr>
        <form action='actionSupprGloss.php' method='post'>
            <div class='container'>
                <input type='hidden' name='motAModif' value='$getmodifdef'>
                <h6>Nouvelle définition de <b>$getmodifdef</b> :</h6>
                <div class='input-group'>
                    <textarea name='newdef' class='form-control' required>$def</textarea>
                </div>
                <button name='confirmer' type='submit' class = 'btn btn-success btn-sm' value='ok'>Valider</button>
            </div>
        </form>
        ";
    }

}
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
