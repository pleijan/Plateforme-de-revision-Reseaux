
<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous avez tout les mots clés utilisés sur le site :</p></h5>
<HR width=1240>
    <h3 align='center'><b>Glossaire</b></h3>
<HR width=1240>

<?php

$row = 1;
if (($handle = fopen("cours/glossaire.csv", "r")) !== FALSE) {
    echo "<table cellpading='10' cellspacing='10' align='center' border ='2'>";
    $data = fgetcsv($handle, 10000, ";");
    echo "<tr><td><h4 align='center'><u>$data[0]</u></h4></td><td><h4 align='center'><u>$data[1]</u></h4></td></tr>";
    while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        echo "<tr><td><p align='center'>$data[0]</p></td><td><p align='center'>$data[1]</p></td></tr>";
    }
    echo"</table>";
    fclose($handle);
}

?>
