<?php
session_start();
    if(isset($_SESSION[id]) and isset($_POST['mot']) and isset($_POST['def']))
    {

        foreach($_POST as $k => $v){
        $$k=$v;
        }

    
        $file = file_get_contents('cours/glossaire.csv');
        $header = "$mot;$def\r\n";
        file_put_contents('cours/glossaire.csv',$header.$file);
        
        
        
        
    }header('Location: glossaire.php?err=1');
?>