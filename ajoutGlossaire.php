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
    <div style='margin-left: -20%'>
    <div  class='tabMot' style='width: 20%'>
    <table cellpadding='4' cellspacing='4' align='center' border ='2' class='table table-bordered table-hover' >
    	<tr><td><b>Mots déjà entrés</b></td></tr>
    	";
    	foreach ($listeMot as $key => $val) {
    		echo"<tr><td>$val</td></tr>";
    	}
    echo"
    </table>
	</div></div>

    <form action='actionAjoutGloss.php' method='post'>
    <div class='container'>
    <label for='mot'><b>Mot à ajouter</b></label>
      <input name='mot' type='text' class='champAjout' placeholder='Entrez le mot' required>

      <label for='def'><b>Définition liée</b></label>
        <div class='input-group'>
            <textarea name='def' class='form-control' placeholder='Entrez sa définition' required></textarea>
           
        </div>
         <button type='submit' class = 'btn btn-success btn-sm'>Valider</button>
    </div>
    <input type='hidden' value='id'/>
    </form>";
    
}else header('Location: connexion.php?err=1');

?>