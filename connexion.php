<?php
require("barreDeMenu.php");
?>

<br/>


<HR width=1240>
    <h3 align='center'><b>Connexion :</b></h3>
<HR width=1240>


<form action='ajoutGlossaire.php' method='post'>
<table cellpading='10' cellspacing='10' align='center' border ='2'>
<tr><td align='center'>Identifiant</td><td align='center'>Mot de passe</td></tr>
<tr><td><input name='id' type='text'/></td><td><input name='mdp' type='password'/></td></tr>
<tr><td align='center'><input name='Valider' type='submit'/></td><td align='center'><input type='reset'/></td></tr>
</table>
</form>
