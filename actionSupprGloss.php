<?php


if (isset($_POST['newdef']) and isset($_POST['confirmer']) and isset($_POST['motAModif'])){
    $newdef = $_POST['newdef'];
    $motAModif = $_POST['motAModif'];
    /*********************Recuperation de la ligne concerner************************/
    $file="cours/glossaire.csv";
    $fp=fopen($file,"r") or die("impossible de créer le fichier");

    $continuer=0;
    while ($ligne = fgetcsv($fp,";")) {
        if($continuer==0)
            $ligneString=$ligne;
        $toutLeFichier[]=$ligne;
        foreach ($ligne as $mot) {
            
            if(strpos($mot, $motAModif) !== FALSE){
               $continuer=1;
            }
        }
    }
    fclose($fp);
    echo $motAModif;
    echo"ligneString =";
    print_r($ligneString);
    echo"<br/>toutLeFichier =";
    print_r($toutLeFichier);
        /*******************************************************************************/

    /*********************modification de la ligne concerner************************/

    $ligneString[1]=$newdef;//Modification du mdp

    for($i=0;$i<count($toutLeFichier);$i++){
        for($j=0;$j<count($toutLeFichier[$i]);$j++){
            if(strpos($toutLeFichier[$i][$j], $motAModif) !== FALSE){
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

}

if (isset($_GET['suppr']))
{
    $motAModif = $_GET['suppr'];

    /*********************Recuperation des comptes************************/
    $file="cours/glossaire.csv";
    $fp=fopen($file,"r") or die("impossible de créer le fichier");

    $continuer=0;
    while ($ligne = fgetcsv($fp,";")) {
        
        
        foreach ($ligne as $mot) {
            
            if(strpos($mot, $motAModif) !== FALSE){
                $continuer=1;
            }
        }
        if($continuer==0)
            $toutLeFichier[]=$ligne;
        else
                $continuer=0;
    }
    fclose($fp);
    echo"<br/>toutLeFichier =";
    print_r($toutLeFichier);
    
    /*******************************************************************************/

    /*********************modification des comptes************************/


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



    /*********************Recuperation des données  ************************/
    $file="cours/glossaire.csv";
    $fp=fopen($file,"r") or die("impossible de créer le fichier");

    $continuer=0;
    while ($ligne = fgetcsv($fp,";")) {
        
        
        foreach ($ligne as $mot) {
            
            if(strpos($mot, $motAModif) !== FALSE){
                $continuer=1;
            }
        }
        if($continuer==0)
            $toutLeFichier2[]=$ligne;
        else
                $continuer=0;
            
    }
    fclose($fp);
    echo"<br/>toutLeFichier =";
    print_r($toutLeFichier2);
    
    /*******************************************************************************/

    /*********************modification des données ************************/


    $file="data/donnee.csv";

    $fileRead = fopen($file, 'r');
    $fileWrite = fopen($file.'.tmp', 'w');

    if (!$fileRead || !$fileWrite) {
        echo "Erreur d'ouverture du fichier de lecture et/ou d'écriture avec $filename.";
    }

    for($i=0;$i<count($toutLeFichier);$i++){
        fputcsv($fileWrite, $toutLeFichier2[$i] ,$delimiter=';');
    }
    

    fclose($fileWrite);
    fclose($fileRead);
    unlink($file);
    rename($file.'.tmp', $file);
    
    
    /*******************************************************************************/

    $file="cours/glossaire.csv";
    unlink($file);

   
        
}

header('Location: glossaire.php?conf=1');

?>