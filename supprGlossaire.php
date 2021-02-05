
<?php

session_start();

if (isset($_SESSION['id'])){
require("barreDeMenu.php");
    echo"<br/>";
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
            <td align=center><a href='supprGlossaire.php?log=$data[0]'><img src='img/crayon.png' style=width:'5%'; height='5%';></a></td>
            <td align=center><a href='supprGlossaire.php?suppr=$data[0]'><img src='img/red-cross.png' style=width:'3%'; height='3%';></a></td></tr>
            </tr>";
        }
        echo"</table>";
        fclose($handle);
    }


} 
else header('Location: connexion.php');

?>