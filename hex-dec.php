<?php
require("barreDeMenu.php");
?>

<br/>
<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de hexadecimal à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<p> explication de comment ça marche </p>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='hex-dec.php' method='post' >
<table cellpading='4' cellspacing='4' align='center'>

<tr><td>Adresse IP: </td>
<td><input class='champ' name='part1' type='text' value= "<?php if (isset($_POST['part1'])){echo $_POST['part1'];}?>" required> .</td>
<td><input class='champ' name='part2' type='text' value= "<?php if (isset($_POST['part2'])){echo $_POST['part2'];}?>" required> .</td>
<td><input class='champ' name='part3' type='text' value= "<?php if (isset($_POST['part3'])){echo $_POST['part3'];}?>" required> .</td>
<td><input class='champ' name='part4' type='text' value= "<?php if (isset($_POST['part4'])){echo $_POST['part4'];}?>" required> </td></tr></table>

<table cellpading='4' cellspacing='4' align='center' >
<tr><td>Hexa -> Décimal <input type='radio' name='trad' value='hextodec' checked></td><td>Décimal -> Hexa<input type='radio' name='trad' value='dectohex'></td></tr>
</table>
<input name='valider' class="btn btn-success btn-sm" type='submit' value='Valider' >

</form>

<?php
if(isset($_POST['part1'],$_POST['part2'],$_POST['part3'],$_POST['part4'])){
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
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
    
}
    
if (isset($_GET['id'])){
    if($_GET['id']=='0'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
        }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
}




?>


</body>
