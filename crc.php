<?php
require('barreDeMenu.php');
?>

</br>

<h5 align='center'><p>Sur cette page vous pourrez apprendre à calculer un CRC de type Ethernet.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h3><a href='cours/crc/crc01.mp4' target='_BLANK'>vidéo 1</a> |
<a href='cours/crc/CoursCRC-part02.html' target='_BLANK'> cours partie 2</a> |
<a href='cours/crc/CoursCRC-part03.html' target='_BLANK'> cours partie 3</a> |
<a href='cours/crc/division.mp4' target='_BLANK'>division </a> |
<a href='cours/crc/matrice.mp4' target='_BLANK'>matrice </a> </h3>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='' method='get'>
<table cellpading='4' cellspacing='4' align= center>

<tr><h5><b>CRC Matriciel :</b></h5></tr>
<tr><h6>Saisir le message ainsi que la matrice génératrice :</h6></tr>
<tr>
<td>Message :</td> 
<td><input class='champ' name='Message' type='text' required></td>
</tr>

<tr><td align='center' colspan='7'><input name='ConfirmationMessage' type="submit" class='btn btn-success btn-sm' value='Valider'></td></tr>
</table>
</form>


<?php

    if(isset($_GET['id'])){
        if($_GET['id']=='1'){
            echo"<p style='color:red'>message incorrect (que du bianire !) </p>";
        }
    }


    if(isset($_GET['Message'])){
        $Message = $_GET['Message'];

        echo"<h6><b>Le message est : $Message</b></h6>";


        $arr0 = str_split($Message);
        foreach ($arr0 as $x) {
            if (!($x == 0 || $x == 1)) {
                header('Location:crc.php?id=1');
            }
        }


        $TailleM = strlen($Message);
        echo"
        <h6>Saisie de La Matrice génératrice :</h6>
        <form action='' method='get'>
        <table cellpading='4' cellspacing='4' align='center'  > ";

        $m[][] = 0;

        for($col = 0; $col<$TailleM; $col++){
            echo"<tr>";
            for($ligne = 0; $ligne<$TailleM; $ligne++){
                echo"<td><input type='number' name=m[$col][$ligne] min='0' max='1' size = '1' required></td>";
            }
            echo"</tr>";
        }
        
        echo"
        <input type='hidden' name='Message' value='$Message'/>
        </table><input name='ValidMatrice' type='submit' class='btn btn-success btn-sm' value='Valider'>
        </form>";

    }

    if(isset($_GET['Message']) and isset($_GET['ValidMatrice']))
    {
        $Message = $_GET['Message'];
        $m = $_GET['m'];

        echo"<h6><b>La Matrice est : </b></h6>
        <table border='1px' cellpading='4' cellspacing='4' align='center'  >";

        for($col = 0; $col<$TailleM; $col++){
            echo"<tr>";
            for($ligne = 0; $ligne<$TailleM; $ligne++){
                echo"<td>{$m[$col][$ligne]}</td>";
            }
            echo"</tr>";
        }

        echo"
        </table><br/>
        ";


        echo"<h6><b>Le CRC est : </b></h6>
        <table border='1px' cellpading='4' cellspacing='4' align='center'  >
        <tr>";
        $CRC =0;

        

        for($col = 0; $col<$TailleM; $col++){
            for($ligne = 0; $ligne<$TailleM; $ligne++){
                if ($CRC xor ($Message[$ligne] and $m[$col][$ligne]))
                $CRC = 1;
                else $CRC = 0;
                
            }
            echo "<td color='red'> $CRC</td>";
        }
        echo"</tr></table>";
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
