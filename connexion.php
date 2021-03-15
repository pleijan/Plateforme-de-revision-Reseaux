<?php
require("barreDeMenu.php");
?>

<br/>


<HR width=1240>
    <h3 align='center'><b>Connexion :</b></h3>
<HR width=1240>

<?php

echo'
<form action="actionConnexion.php" method="post">
<div class="container">
	<label for="id"><b>Identifiant</b></label>
      <input name="id" type="text" class="champConnexion" placeholder="Entrez l\'Identifiant" required>
      <br>
      <label for="mdp"><b>Mot de passe</b></label>
      <input name="mdp" type="password" class="champConnexion" placeholder="Entrez le mot de passe" required>
        
      <button type="submit" class = "btn btn-success btn-sm">Connexion</button>
</div>
</form>';


if (isset($_GET['err'])){
	$err=$_GET['err'];
	switch ($err) {
	
	case 0:
		echo "<p style='color:red'>Erreur: Veuillez vous connecter</p>";
		break;
    case 1:
        echo "<p style='color:red'>Erreur: Identifiant / Mot de passe entrer invalide</p>";
        break;

	}
}

?>

