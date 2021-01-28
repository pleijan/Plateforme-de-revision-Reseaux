
<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de binaire à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<p> explication de comment ça marche </p>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='bin-dec.php' method='post'>
<table cellpading='4' cellspacing='4' align='center'>

<tr><td>Adresse IP: </td>
<td><input class='champ2' name='part1' type='text' value= "<?php if (isset($_POST['part1'])){echo $_POST['part1'];}?>" required> .</td>
<td><input class='champ2' name='part2' type='text' value= "<?php if (isset($_POST['part2'])){echo $_POST['part2'];}?>" required> .</td>
<td><input class='champ2' name='part3' type='text' value= "<?php if (isset($_POST['part3'])){echo $_POST['part3'];}?>" required> .</td>
<td><input class='champ2' name='part4' type='text' value= "<?php if (isset($_POST['part4'])){echo $_POST['part4'];}?>" required> </td></tr></table>

<table cellpading='4' cellspacing='4' align='center' >
<tr><td>Binaire -> Décimal <input type='radio' name='trad' value='bintodec' checked></td><td>Décimal -> Binaire<input type='radio' name='trad' value='dectobin'></td></tr>
<tr></tr>
</table>
<input name='valider' class="btn btn-success btn-sm"type='submit' value='Valider' >
</form>

<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}
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
        
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
                if (strlen($val)>8){
                    header('Location:bin-dec.php?id=5');
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
        echo"<p style='color:red'>adresse ip entree invalide (octet superieur a 255)</p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide (ce ne sont pas des chiffres)</p>";
    }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide (ce n'est pas du binaire)</p>";
        }
    if($_GET['id']=='4'){
        echo"<p style='color:red'>adresse ip entree invalide (ce ne sont pas des chiffres)</p>";
    }
    if($_GET['id']=='5'){
        echo"<p style='color:red'>adresse ip entree invalide (octet superieur a  11111111)</p>";
    }
} 




?>

</body>
