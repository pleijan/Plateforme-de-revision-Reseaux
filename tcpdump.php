<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez effectuer un tcp dump sur le serveur 192.168.2.3.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Formulaire</b></h3>
<HR width=1240>

<h5>il vous suffit de rentrer le nombre de package que vous voulez intercepter. </h5>

<form action='' method='POST'>
<table cellpading='4' cellspacing='4' align='center'>

<tr>
<td>nombre de packages</td><td><input type='number' name='nbTcp' required></td>
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

if(isset($_POST["nbTcp"])){
echo"
<HR width=1240>
    <h3 align='center'><b>Affichage</b></h3>
<HR width=1240>";

$nbTcp = $_POST["nbTcp"];


$cmd ="sudo tcpdump -c ";
$cmd.=$nbTcp;

exec($cmd,$out,$status);
display($out,$cmd);

}
?>
<footer>
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>
