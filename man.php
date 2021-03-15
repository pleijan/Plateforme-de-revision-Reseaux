<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez afficher la page Man d'une commande.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Formulaire</b></h3>
<HR width=1240>

<h5>il vous suffit de rentrer la fonction pour afficher sa page de Man.</h5>

<form action='' method='POST'>
<table cellpading='4' cellspacing='4' align='center'>

<tr>
<td>Adresse</td><td><input type='text' name='Man' required></td>
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

if(isset($_POST["Man"])){
echo"
<HR width=1240>
    <h3 align='center'><b>Affichage</b></h3>
<HR width=1240>";

$man = $_POST["Man"];

$cmd ="man ";
$cmd.=$man;

exec($cmd,$out,$status);
display($out,$cmd);

}
