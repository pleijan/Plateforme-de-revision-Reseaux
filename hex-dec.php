<?php
echo"
<form action='hex-dec.php' method='post'>
<table cellpading='4' cellspacing='4'>

<tr>adresse ip: <td><input name='part1' type='text'> .</td>
<td><input name='part2' type='text'> .</td>
<td><input name='part3' type='text'> .</td>
<td><input name='part4' type='text'> </td></tr></table>
hexa -> decimal <input type='radio' name='trad' value='hextodec' checked>| decimal -> hexa<input type='radio' name='trad' value='dectohex'><br>
<input name='valider' type='submit' value='Valider'> <input name='rst' type='reset' value='Annuler'>

</form>";

if(isset($_POST['part1'],$_POST['part2'],$_POST['part3'],$_POST['part4']))
    if($_POST['trad']=='dectohex'){
        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "dectohex")
            {
            }
            else
            {
                if (!is_numeric($val))
                {
                    header('Location:hex-dec.php?id=0');
                }
                if ($val>255)
                {
                    header('Location:hex-dec.php?id=1');
                }
            }
        }
        echo"<table cellpading='4' cellspacing='4'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider"  or $val == "dectohex")
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
            if ($val == "Valider"  or $val == "dectohex")
            {
                
            }
            else
            {
                echo"<td>";
                echo  dechex($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
    else{
        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "hextodec")
            {
            }
            else
            {
                if (!ctype_xdigit($val))
                {
                    header('Location:hex-dec.php?id=2');
                }
                if (strlen($val)>2)
                {
                    header('Location:hex-dec.php?id=3');
                }
            }
        }
        echo"<table cellpading='4' cellspacing='4'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "hextodec")
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
            if ($val == "Valider" or $val == "hextodec" )
            {
                
            }
            else
            {
                echo"<td>";
                echo  hexdec($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
    

    if (isset($_GET['id'])){
        if($_GET['id']=='0'){
            echo"<p style='color:red'>je sais pas invalide</p>";
        }
        if($_GET['id']=='1'){
            echo"<p style='color:red'>adresse ip entree invalide</p>";
        }
        if($_GET['id']=='2'){
            echo"<p style='color:red'>adresse ip entree invalide</p>";
            }
        if($_GET['id']=='3'){
            echo"<p style='color:red'>adresse ip entree invalide</p>";
        }
    }
?>