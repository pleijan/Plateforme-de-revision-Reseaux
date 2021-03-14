
<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez effectuer un ping sur l'adresse que vous souhaiter.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Formulaire</b></h3>
<HR width=1240>

<form action='' method='POST'>
<table cellpading='4' cellspacing='4' align='center'>

<tr>
<td>Adresse a ping</td><td><input type='text' name='ping' required></td>
</tr>
<tr>
<td>nombre de ping</td><td><input type='number' name='nbping' required></td>
</tr>
<tr><td></td>
<td><input name='valider' class="btn btn-success btn-sm"type='submit' value='Valider' ></td>
</tr>

</table>
</form>

<?php


function display($a,$cmd){
    echo "<table align='center' id='cmd' width=80%>
    <tr><td>etude@192.168.2.3: $cmd </br>";
    for($i=0;$i<count($a);$i++) echo "$a[$i]</br>";
    echo "</td></tr>
    </table>";
}     

if(isset($_POST["ping"])and isset($_POST["nbping"])){
echo"
<HR width=1240>
    <h3 align='center'><b>Affichage</b></h3>
<HR width=1240>";

$ping = $_POST["ping"];
$nbPing = $_POST["nbping"];

$cmd ="ping -c ";
$cmd.=$nbPing;
$cmd.=" ";
$cmd.=$ping;

exec($cmd,$out,$status);
display($out,$cmd);

}

