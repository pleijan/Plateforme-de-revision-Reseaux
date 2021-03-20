
<?php
require("barreDeMenu.php");
?>

<br/>

<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de binaire à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h5 align='center'><a href='cours/crc/crc01.mp4' onclick="open('cours/crc/crc01.mp4','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">Traduction de binaire a décimale</a></h5>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='bin-dec.php' method='post'>
<table cellpading='4' cellspacing='4' align='center'>

<tr><td align='right'>Adresse IP :</td> 
    <td><input class='champ' name='ip' id= "ip" type='text' onfocusin="javascript:nospaces(this)" onfocusout="javascript:nospaces(this)" placeholder="192.168.10.2" value= "<?php if (isset($_POST['ip'])){echo $_POST['ip'];} ?>" required> </td></tr>
</table>

<table cellpading='4' cellspacing='4' align='center' >
<tr>
    <td>Décimal -> Binaire<input type='radio' name='trad' value='dectobin' checked></td>
</tr>
<tr>
    <td>Binaire -> Décimal <input type='radio' name='trad' value='bintodec'></td>
</tr>
</table>
<input name='valider' class="btn btn-success btn-sm"type='submit' value='Valider' >
</form>

<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}
if(isset($_POST['ip'])){
    $adrIp = explode(".", $_POST['ip']);

    if($_POST['trad']=='dectobin'){

        foreach ($adrIp as $val){
            if ($val<0 or $val>255)
            {
                header('Location:bin-dec.php?id=1');
            }
            if (!is_numeric($val))
            {
                header('Location:bin-dec.php?id=2');
            }
              
        }
        $point = 0;
        echo"<table cellpading='4' cellspacing='4' align='center'>
        <tr><td>Adresse IP originale: </td><td>";
        foreach($adrIp as $val){
            echo "<td><b>";
            echo $val;
            echo "</td></b>";
             if($point <=2)
                echo"<td>.</td>";
            $point++;
        }

        $point = 0;
        echo"</td></tr><tr><td>Adresse IP traduite: </td><td>";
        foreach($adrIp as $val){
            echo "<td><b>";
            echo  decbin($val);
            echo "</td></b>";
             if($point <=2)
                echo"<td>.</td>";
            $point++;
        }
        echo"</td></tr>";
    }





    else {
        echo"<table cellpading='4' cellspacing='4' align='center' >
        <tr><td>Adresse IP originale: </td><td><b>";
        $i = 0;
        $point = 0;
        foreach($adrIp as $val){
                
            $arr0 = str_split($val);
            foreach ($arr0 as $x) {
                if (!($x == 0 || $x == 1)) {
                    header('Location:bin-dec.php?id=3');
                }
                if (!is_numeric($x)) {
                    header('Location:bin-dec.php?id=4');
                }
            }
            if (strlen($val)>8){
                header('Location:bin-dec.php?id=5');
            }
            echo "<td><b>";
            echo $val;
            echo "</td></b>";
             if($point <=2)
                echo" <td>.</td>";
            $point++;
            
        }
        echo"</b></td></tr><tr><td>Adresse IP traduite: </td><td><b>";
        $point = 0;
        foreach($adrIp as $val){
            echo "<td><b>";
            echo  bindec($val);
            echo "</td></b>";
             if($point <=2)
                echo"<td>.</td>";
            $point++;
        }
        echo"</b></td></tr>";
    }

}

if (isset($_GET['id'])){
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
        }
    if($_GET['id']=='4'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='5'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
} 




?>

</body>
<footer>
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>

