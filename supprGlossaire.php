
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
            <td align=center><a href='supprGlossaire.php?modifdef=$data[0]'><img src='img/crayon.png' style=width:'5%'; height='5%';></a></td>
            <td align=center><a href='supprGlossaire.php?suppr=$data[0]'><img src='img/red-cross.png' style=width:'3%'; height='3%';></a></td></tr>
            </tr>";
        }
        echo"</table>";
        fclose($handle);
    }

    if (isset($_GET['modifdef']))
    {
        $getmodifdef = $_GET['modifdef'];
        echo"<hr><h2>Changer la def de $getmodifdef</h2><hr>
        <form action='supprGlossaire.php' method='post'><table align='center'><tr>
        <input type='hidden' name='modifdef' value='$getmodifdef'>
        <td>nouvelle def de $getmodifdef :</td><td> <input type='text' name='newdef'></td> <td> <input type='submit' name='confirmer' value='ok'></td></tr></table></form>
        ";
    }

    if (isset($_POST['newdef']) and isset($_POST['confirmer']) and isset($_POST['getmodifdef'])){
        $newdef = $_POST['newdef'];
        $getmodifdef = $_POST['getmodifdef'];
        /*********************Recuperation de la ligne concerner************************/
        $file="cours/glossaire.csv";
        $fp=fopen($file,"r") or die("impossible de créer le fichier");
    
        $continuer=0;
        while ($ligne = fgetcsv($fp,";")) {
            if($continuer==0)
                $ligneString=$ligne;
            $toutLeFichier[]=$ligne;
            foreach ($ligne as $mot) {
                
                if(strpos($mot, $getmodifdef) !== FALSE){
                   $continuer=1;
                }
            }
        }
        fclose($fp);
        echo $getmodifdef;
        echo"ligneString =";
        print_r($ligneString);
        echo"<br/>toutLeFichier =";
        print_r($toutLeFichier);
            /*******************************************************************************/

    /*********************modification de la ligne concerner************************/

    $ligneString[1]=$newdef;//Modification du mdp

    for($i=0;$i<count($toutLeFichier);$i++){
        for($j=0;$j<count($toutLeFichier[$i]);$j++){
            if(strpos($toutLeFichier[$i][$j], $getmodifdef) !== FALSE){
                $toutLeFichier[$i]=$ligneString;
            }
           
        }
    }
    echo"<br/>toutLeFichier =";
    print_r($toutLeFichier);

    $update = implode(";", $ligneString);
    $file="cours/glossaire.csv";

    $fileRead = fopen($file, 'r');
    $fileWrite = fopen($file.'.tmp', 'w');

    if (!$fileRead || !$fileWrite) {
        echo "Erreur d'ouverture du fichier de lecture et/ou d'écriture avec $filename.";
    }

    for($i=0;$i<count($toutLeFichier);$i++){
        fputcsv($fileWrite, $toutLeFichier[$i] ,$delimiter=';');
    }
    

    fclose($fileWrite);
    fclose($fileRead);
    unlink($file);
    rename($file.'.tmp', $file);
   
   
    /*******************************************************************************/
    }
} 
else header('Location: connexion.php');



?>