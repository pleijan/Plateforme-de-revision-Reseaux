<?php
    if(isset($_POST[admin],$_POST[mot],))
    {
        $file = file_get_contents('cours/glossaire.csv');
        $header = "$_POST[mot];$_POST[def]\r\n";
        file_put_contents('cours/glossaire.csv',$header.$file);
    }
?>