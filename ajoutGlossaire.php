<?php
require("barreDeMenu.php");
?>


<?php
if (isset($_POST['id'])and isset($_POST['mdp'])){
    if($_POST['id']=='admin' and $_POST['mdp']=='admin'){
        echo"
        <br/>
        <h5 align='center'><p>Sur cette page vous pourrez ajouter des mots au glossaire</p></h5>
        <HR width=1240>
            <h3 align='center'><b>Formulaire</b></h3>
        <HR width=1240>

        <form action='actionAjoutGloss.php' method='post'>
        <table cellpading='10' cellspacing='10' align='center' border ='2'>
        <tr><td>Mot a ajouter</td><td>Definition liée</td></tr>
        <tr><td><input name='mot' type='text'/></td><td><input name='def' type='text'/></td></tr>
        <tr><td><input name='Valider' type='submit'/></td><td><input type='reset'/></td></tr>
        </table>
        </form>";
    }else header('index.php');
}else header('index.php');

?>