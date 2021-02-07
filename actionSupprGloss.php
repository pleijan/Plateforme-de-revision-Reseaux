<?php


if (isset($_POST['newdef']) and isset($_POST['confirmer']) and isset($_POST['motAModif'])){
    $newdef = $_POST['newdef'];
    $motAModif = $_POST['motAModif'];
    $row = 1;
    $toutLeFichier[]="";
    echo "entrer";

    $file="cours/glossaire.csv";
    $fp=fopen($file,"a+") or die("impossible de créer le fichier");

        echo " dans le if";
        echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>
        <tr>
        <td><h4 align='center'><u>Mots</u></h4></td>
        <td colspan=3><h4 align='center'><u>Définition</u></h4></td>";
        echo"</table>";
        while ($data = fgetcsv($fp, 10000, ";")) {
            $num = count($data);
            $row++;
            echo "\n et meme dans la boucle";
            if(!(strpos($motAModif, $data[0]) !== FALSE)){
               $toutLeFichier[] = "$data[0];$data[1]\r\n";
                echo "oui";
            }
        }
        

        print_r($toutLeFichier);
        file_put_contents('cours/glossaire.csv', "");
        foreach ($toutLeFichier as $val) {
            echo $val;
            file_put_contents('cours/glossaire.csv', $val, FILE_APPEND);

        }
        file_put_contents('cours/glossaire.csv', "$motAModif;$newdef", FILE_APPEND);   
        fclose($fp);
    
    
   
}

if (isset($_GET['suppr']))
{
    $motAModif = $_GET['suppr'];

    $file="cours/glossaire.csv";
    $fp=fopen($file,"a+") or die("impossible de créer le fichier");

    echo " dans le if";
    echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>
    <tr>
    <td><h4 align='center'><u>Mots</u></h4></td>
    <td colspan=3><h4 align='center'><u>Définition</u></h4></td>";
    echo"</table>";
    while ($data = fgetcsv($fp, 10000, ";")) {
        $num = count($data);
        $row++;
        echo "\n et meme dans la boucle";
        if(!(strpos($motAModif, $data[0]) !== FALSE)){
           $toutLeFichier[] = "$data[0];$data[1]\r\n";
            echo "oui";
        }
    }
    
    
    print_r($toutLeFichier);
    file_put_contents('cours/glossaire.csv', "");
    foreach ($toutLeFichier as $val) {
        echo $val;
        file_put_contents('cours/glossaire.csv', $val, FILE_APPEND);

    }
    fclose($fp);

   
        
}

header('Location: glossaire.php?conf=1');

?>