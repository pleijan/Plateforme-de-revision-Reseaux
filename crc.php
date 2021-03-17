<?php
require('barreDeMenu.php');

if(isset($_GET['Message2']) and isset($_GET['polynome']) ){
    $message2 = $_GET['Message2'];
    $polynome = $_GET['polynome'];
    $tailleM2 = strlen($message2);
    $taillePol = strlen($polynome);

    $arr0 = str_split($message2);
    foreach ($arr0 as $x) {
        if (!($x == 0 || $x == 1)) {
            header('Location:crc.php?id=2');
            
        }
    }

    if($tailleM2>10)header('Location:crc.php?id=5');


    $polArray = str_split($polynome);
    foreach ($polArray as $x) {
        if (!($x == 0 || $x == 1)) {
            header('Location:crc.php?id=3');
            
        }
    }

    if($taillePol>$tailleM2) header('Location:crc.php?id=4');
}

?>

</br>

<h5 align='center'><p>Sur cette page vous pourrez apprendre à calculer un CRC de type Ethernet.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h3><a href='cours/crc/crc01.mp4' onclick="open('cours/crc/crc01.mp4','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">vidéo 1</a> |
<a href='cours/crc/CoursCRC-part02.html' onclick="open('cours/crc/CoursCRC-part02.html','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;"> cours partie 2</a> |
<a href='cours/crc/CoursCRC-part03.html' onclick="open('cours/crc/CoursCRC-part03.html','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;"> cours partie 3</a> |
<a href='cours/crc/division.mp4' onclick="open('cours/crc/division.mp4','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">division </a> |
<a href='cours/crc/matrice.mp4' onclick="open('cours/crc/matrice.mp4','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">matrice </a> </h3>

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
        if($_GET['id']=='0'){
            echo"<p style='color:red'>message trop grand (max 10 bit) </p>";
        }
        if($_GET['id']=='1'){
            echo"<p style='color:red'>message incorrect (que du bianire !) </p>";
        }
    }


    if(isset($_GET['Message'])){
        $Message = $_GET['Message'];
        $TailleM = strlen($Message);

        $arr0 = str_split($Message);
        foreach ($arr0 as $x) {
            if (!($x == 0 || $x == 1)) {
                header('Location:crc.php?id=1');
            }
        }

        if($TailleM>10)header('Location:crc.php?id=0');

        echo"<h6><b>quelle taille de matrice voulez-vous :</b></h6>
        
        <form action='' method='get'>
        <table cellpading='4' cellspacing='4' align='center'  > 
        <tr><td><input type='number' name='nbCol' min=2 max=$TailleM value=$TailleM required/> sur $TailleM </td></tr>
        <tr><td align='center'><input name='ConfirmationMessage' type='submit' class='btn btn-success btn-sm' value='Valider' ></td></tr>
        </table>

        <input type='hidden' value=$Message name='Message'/>
        
        </form>";

    }


    if(isset($_GET['Message']) and isset($_GET['nbCol'])){
        $Message = $_GET['Message'];
        $nbCol = $_GET['nbCol'];
        echo"<h6><b>Le message est : $Message</b></h6>";


        


        $TailleM = strlen($Message);
        echo"
        <h6><b>Saisie de La Matrice génératrice :</b></h6>
        <form action='' method='get'>
        <table cellpading='4' cellspacing='4' align='center'  > ";

        $m[][] = 0;

        for($ligne = 0; $ligne<$TailleM; $ligne++){
            echo"<tr>";
            for($col = 0; $col<$nbCol; $col++){
                echo"<td><input type='number' name=m[$col][$ligne] min='0' max='1' size = '1' required></td>";
            }
            echo"</tr>";
        }
        
        echo"
        <input type='hidden' name='Message' value='$Message'/>
        <input type='hidden' name='nbCol' value='$nbCol'/>
        </table><input name='ValidMatrice' type='submit' class='btn btn-success btn-sm' value='Valider'>
        </form>";

    }

    if(isset($_GET['Message']) and isset($_GET['ValidMatrice']))
    {
        $nbCol = $_GET['nbCol'];
        $Message = $_GET['Message'];
        $m = $_GET['m'];

        echo"<h6><b>Le Message est : </b></h6> <p>$Message</p>";

        echo"<h6><b>La Matrice est : </b></h6>
        <table border='1px' cellpading='4' cellspacing='4' align='center'  >";

        for($ligne = 0; $ligne<$TailleM; $ligne++){
            echo"<tr>";
            for($col = 0; $col<$nbCol; $col++){
                echo"<td>{$m[$col][$ligne]}</td>";
            }
            echo"</tr>";
        }

        echo"
        </table></h6><br/>
        ";


        echo"<h6><b>Le CRC est : </b></h6>
        <table border='1px' cellpading='4' cellspacing='4' align='center'  >
        <tr>";
        $CRC =0;

        

        for($ligne = 0; $ligne<$nbCol; $ligne++){
            for($col = 0; $col<$nbCol; $col++){
                if ($CRC xor ($Message[$ligne] and $m[$col][$ligne]))
                $CRC = 1;
                else $CRC = 0;
                
            }
            echo "<td><p color='red'> $CRC</p></td>";
        }
        echo"</tr></table>";
    }

?>

<HR width=750>

<form action='' method='get'>
<table cellpading='4' cellspacing='4' align= center>


<tr><h5><b>CRC Polynomial :</b></h5></tr>
<tr><h6>Saisir le message ainsi que le polynome générateur :</h6></tr>
<tr>
<td>Message :</td> 
<td><input class='champ' name='Message2' type='text' required></td></tr>
<tr>
<td>Zero en plus a la fin du message :</td> 
<td><input class='champ' name='nbZero' type='number' min=0 max=5 required></td></tr>
<tr>
<td>Polynome :</td> 
<td><input class='champ' name='polynome' type='text' required></td></tr>


<tr><td align='center' colspan='7'><input name='ConfirmationMessage' type='submit' class='btn btn-success btn-sm' value='Valider'></td></tr>
</table>
</form>
<?php
    if(isset($_GET['id'])){
        if($_GET['id']=='2'){
            echo"<p style='color:red'>message incorrect (que du binaire !) </p>";
        }
        if($_GET['id']=='3'){
            echo"<p style='color:red'>Polynome incorrect (que du binaire !) </p>";
        }
        if($_GET['id']=='4'){
            echo"<p style='color:red'>taille polynome generateur plus grand que le message ! </p>";
        }
        if($_GET['id']=='4'){
            echo"<p style='color:red'>message trop grand (10 bit max !)</p>";
        }
    }

    if(isset($_GET['Message2']) and isset($_GET['polynome']) and isset($_GET['nbZero'])){

        $nbZero =$_GET['nbZero'];
        
        echo"<h6><b>Le message est : $message2</b></h6>";

        $zero ="";
        for ($i=0; $i<$nbZero; $i++){
            $zero.="0";
        }

        $message2 .= $zero;

        echo"<h6><b>Le message avec $nbZero zero est : $message2</b></h6>";

        echo"<h6><b>Le Polynome générateur est : $polynome</b></h6>";

        $tailleM2 = strlen($message2);
        
        while($tailleM2=>$taillePol){

            echo "<h6>$message2 => ";

            $debutmessage=substr($message2,0,$taillePol);
            $finmessage=substr($message2,$taillePol);

            echo "$debutmessage $finmessage => ";

            for($i =0;$i<$taillePol;$i++){
                if(boolval($debutmessage[$i]) xor boolval($polArray[$i])) $debutmessage[$i]="1";
                else $debutmessage[$i]="0";
            }

            echo "$debutmessage $finmessage => ";

            $message2=$debutmessage;
            $message2.=$finmessage;

            $i=0;
            while($message2[$i]=="0"){
                $message2 = substr($message2,1);
            }
            
            $tailleM2= strlen($message2);

            echo "$message2</h6>";
        }

        

        echo"<h6><b>Le CRC générateur est : $message2</b></h6>";
        
        
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
