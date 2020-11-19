<head>
  <meta charset="UTF-8">
  <title>Technologie</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
<div id="blocmenu"> 
      <ul id="menu"> 
        <li><a class="active" href="index.php">&#127968; Accueil</a></li>
        <li><a href="bin-dec.php">conversion adresse ip<br>binaire -> decimal</a></li>
        <li><a href="hex-dec.php">conversion adresse ip<br>hexadecimal -> decimal</a></li>
        <li><a href="sousReseaux.php">création de sous réseaux a<br>partir d'une adresse ip</a></li>
        <li><a href="index.php">Calculer un CRC<br>de type Ethernet</a></li>
        <li><a href="index.php">Proposer un sniffer<br>nmap</a></li>
        <li><a href="index.php">Trouver l’adresse IP d’une<br>machine extérieure</a></li>
      </ul>
</div>
</head>
<body>
<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}




echo"

<h2 align='center'><p>Sur cette page vous pourrez apprendre a traduire une adresse IPV4 de binaire a decimal et inversement</p></h2>
<HR width=1240>
    <h1 align='center'>Cours</h1>
<HR width=1240>

<p> explication de comment ça marche </p>

<HR width=1240>
    <h1 align='center'>Application</h1>
<HR width=1240>

<form action='' method='post'>
<table cellpading='4' cellspacing='4' align='center'>

<tr><td>adresse ip: </td><td><input name='part1' type='text'> .</td>
<td><input name='part2' type='text'> .</td>
<td><input name='part3' type='text'> .</td>
<td><input name='part4' type='text'> </td></tr></table>
binaire -> decimal <input type='radio' name='trad' value='bintodec' checked>| decimal -> binaire<input type='radio' name='trad' value='dectobin'><br>
<input name='valider' type='submit' value='Valider'> <input name='rst' type='reset' value='Annuler'>

</form>";

if(isset($_POST['part1'],$_POST['part2'],$_POST['part3'],$_POST['part4'])){
    if($_POST['trad']=='dectobin'){

        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                if ($val<0 or $val>255)
                {
                    header('Location:bin-dec.php?id=1');
                }
                if (!is_numeric($val))
                {
                    header('Location:bin-dec.php?id=2');
                }
            }   
        }
        
        echo"<table cellpading='20' cellspacing='20' align='center'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                if ($val == "Valider" or $val == "dectobin")
                {

                }
                else
                {
                    echo"<td>";
                    echo $val;
                    echo"</td>";
                }
            }
        }
        echo"</tr><tr><td>adresse ip traduite:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin")
            {
                
            }
            else
            {
                echo"<td>";
                echo  decbin($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }





    else {
        echo"<table cellpading='4' cellspacing='4' align='center'>
        <tr><td>adresse ip original:</td>";
        $i = 0;
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "dectobin" or $val == "bintodec")
            {

            }
            else {
                
                $arr0 = str_split($val);
                foreach ($arr0 as $x) {
                    if (!($x == 0 || $x == 1)) {
                        header('Location:bin-dec.php?id=3');
                    }
                    if (!is_numeric($x)) {
                        header('Location:bin-dec.php?id=4');
                    }
                }
               
            }



            if ($val == "Valider" or $val == "bintodec" or $val == "dectobin")
            {

            }
            else
            {
                echo"<td>";
                echo $val;
                echo"</td>";
            }
        }
        echo"</tr><tr><td>adresse ip traduite:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "bintodec" or $val == "dectobin")
            {
                
            }
            else
            {
                echo"<td>";
                echo  bindec($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
}


if (isset($_GET['id'])){
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
        }
    if($_GET['id']=='4'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
} 



?>

</body>
