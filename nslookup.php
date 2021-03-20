<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez effectuer un nslookup sur l'adresse que vous souhaiter.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Formulaire</b></h3>
<HR width=1240>

<h5>il vous suffit de rentrer l'adresse ip ou url que vous voulez identifiez.</h5>

<form action='' method='POST'>
<table cellpading='4' cellspacing='4' align='center'>

<tr>
<td>Adresse :</td><td><input type='text' name='nsLookup' required></td>
</tr>
<tr><td></td>
<td><input name='valider' class="btn btn-success btn-sm"type='submit' value='Valider' >
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

if(isset($_POST["nsLookup"])){
echo"
<HR width=1240>
    <h3 align='center'><b>Affichage</b></h3>
<HR width=1240>";

$nsLookup = $_POST["nsLookup"];


$cmd ="nslookup ";
$cmd.=$nsLookup;

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
