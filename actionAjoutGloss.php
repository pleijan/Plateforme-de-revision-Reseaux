<?php
session_start();
    if(isset($_SESSION['id']) and isset($_POST['mot']) and isset($_POST['def']))
    {

        foreach($_POST as $k => $v){
        $$k=$v;
        }

    
        $file = file_get_contents('cours/glossaire.csv');
        $header = "$mot;$def\r\n";
        file_put_contents('cours/glossaire.csv',$header.$file);
        
        if (($handle = fopen($file, "rb")) !== FALSE) {
            // recuperation des lignes dans un array
            while (($ligne = fgetcsv($handle, 1024, ";")) !== FALSE) {
                $lignes[] = $ligne;
            }
            // tri du plus petit au plus grand
            sort($lignes);
        }

        $i = 0;
        $chaine="";
        for ($i=0;$i<count($lignes);$i++){
            $chaine=$chaine+$lignes[$i];
        }

        file_put_contents('cours/glossaire2.csv',$chaine);

        fclose($handle);
        
    }header('Location: glossaire.php?err=1');
?>