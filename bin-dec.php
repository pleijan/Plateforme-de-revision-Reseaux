<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}




echo"
<form action='' method='post'>
<table cellpading='4' cellspacing='4'>

<tr>adresse ip: <td><input name='part1' type='text'> .</td>
<td><input name='part2' type='text'> .</td>
<td><input name='part3' type='text'> .</td>
<td><input name='part4' type='text'> </td></tr></table>
binaire -> decimal <input type='radio' name='trad' value='bintodec' checked>| decimal -> binaire<input type='radio' name='trad' value='dectobin'><br>
<input name='valider' type='submit' value='Valider'> <input name='rst' type='reset' value='Annuler'>

</form>";

if(isset($_POST['part1'],$_POST['part2'],$_POST['part3'],$_POST['part4'])){
    if($_POST['trad']=='dectobin'){

        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                if ($val<0 or $val>255)
                {
                    header('Location:bin-dec.php?id=1');
                }
                if (!is_numeric($val))
                {
                    header('Location:bin-dec.php?id=2');
                }
            }   
        }
        
        echo"<table cellpading='20' cellspacing='20'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                if ($val == "Valider" or $val == "dectobin")
                {

                }
                else
                {
                    echo"<td>";
                    echo $val;
                    echo"</td>";
                }
            }
        }
        echo"</tr><tr><td>adresse ip traduite:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin")
            {
                
            }
            else
            {
                echo"<td>";
                echo  decbin($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }





    else {
        echo"<table cellpading='4' cellspacing='4'>
        <tr><td>adresse ip original:</td>";
        $i = 0;
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                
                $arr0 = str_split($val);
                foreach ($arr0 as $x) {
                    if (!($x == 0 || $x == 1)) {
                        header('Location:bin-dec.php?id=3');
                    }
                    if (!is_numeric($x)) {
                        header('Location:bin-dec.php?id=4');
                    }
                }
               
            }



            if ($val == "Valider" or $val == "bintodec" or $val == "dectobin")
            {

            }
            else
            {
                echo"<td>";
                echo $val;
                echo"</td>";
            }
        }
        echo"</tr><tr><td>adresse ip traduite:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "bintodec" or $val == "dectobin")
            {
                
            }
            else
            {
                echo"<td>";
                echo  bindec($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
}


if (isset($_GET['id'])){
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
        }
    if($_GET['id']=='4'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
} 






?>