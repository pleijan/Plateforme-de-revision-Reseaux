
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
        echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>
        <tr>
        <td><h4 align='center'><u>Mots</u></h4></td>
        <td colspan=3><h4 align='center'><u>Définition</u></h4></td>";
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            $num = count($data);
            $row++;
            echo "<tr>
            <td><p align='center'>$data[0]</p></td>
            <td><p align='center'>$data[1]</p></td>
            <td align=center><a href='supprGlossaire.php?modifdef=$data[0]'><img src='img/crayon.png' id='imgGlossaire'></a></td>
            <td align=center><a href='actionSupprGloss.php?suppr=$data[0]'><img src='img/red-cross.png' id='imgGlossaire' ></a></td></tr>
            </tr>";
        }
        echo"</table>";
        fclose($handle);
    }

    if (isset($_GET['modifdef']))
    {
        $getmodifdef = $_GET['modifdef'];
        echo"<hr><h2>Changer la def de $getmodifdef</h2><hr>
        <form action='actionSupprGloss.php' method='post'>
            <table align='center'>
            <tr>
                <input type='hidden' name='motAModif' value='$getmodifdef'>
                <td>nouvelle def de $getmodifdef :</td>
                <td> <input type='text' name='newdef'></td> 
                <td> <input type='submit' name='confirmer' value='ok'></td>
            </tr>
            </table>
        </form>
        ";
    }

}
?>