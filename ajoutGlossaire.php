<?php
require("barreDeMenu.php");
session_start();
?>


<?php
if (isset($_SESSION['id'])){

    echo"
    <br/>
    <h5 align='center'><p>Sur cette page vous pourrez ajouter des mots au glossaire</p></h5>
    <HR width=1240>
        <h3 align='center'><b>Formulaire</b></h3>
    <HR width=1240>
    ";
    $listeMot =0;
    if (isset($_GET["listeMot"])) {
    	$strlisteMot = $_GET["listeMot"];
    	$listeMot = explode( ',', $strlisteMot);
    }
    echo"
    <table>
    <div style='float: left;'>
    	<option value=''><b>Mots déjà entrés :</b></option>
    	";
    	foreach ($listeMot as $key => $val) {
    		echo"<option value='$val'>$val</option>";
    	}
    echo"
    </table
	</div>

    <form action='actionAjoutGloss.php' method='post'>
    <div class='container'>
    <label for='mot'><b>Mot à ajouter</b></label>
      <input name='mot' type='text' class='champAjout' placeholder='Entrez le mot' required>

      <label for='def'><b>Définition liée</b></label>
        <div class='input-group'>
            <textarea name='def' class='form-control' placeholder='Entrez sa définition' required></textarea>
        </div>
      <div class='buttons'>
      	<button type='submit' class = 'btn btn-success btn-sm'>Valider</button>
      </div>
    </div>
    <input type='hidden' value='id'/>
    </form>";
    
}else header('Location: connexion.php?err=1');

?>