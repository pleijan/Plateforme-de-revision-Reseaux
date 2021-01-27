<head>  <!-- cette section "head" contient tout ce qui s'occupe des feuilles de style  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
  <title>Technologie</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body> <!-- cette section "body" contient la barre de navigation en haut de la page ainsi que tout contenu de la page avec d'abord un entete et en suite le reel contenu -->


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
   <a class="navbar-brand" href="index.php"><img src='img\logo.jpg' width='260px'/></a>

  
  <ul class="navbar-nav">
   
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
        Conversions Adresses IP
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bin-dec.php">Binaire -> Décimal</a>
        <a class="dropdown-item" href="hex-dec.php">Hexadecimal -> Décimal</a>
      </div>
    </li>

    <!-- Links -->
     <li class="nav-item">
      <a class="nav-link" href="sousReseaux.php">Division de réseaux</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Calculer un CRC<br>de type Ethernet</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Proposer un sniffer<br>nmap</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Trouver l’adresse IP d’une<br>machine extérieure</a>
    </li>

  </ul>
</nav>



<br/>



<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de binaire à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<p> explication de comment ça marche </p>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='bin-dec.php' method='post'>
<table cellpading='4' cellspacing='4' align='center'>

<tr><td>Adresse IP: </td>
<td><input class='champ2' name='part1' type='text' value= "<?php if (isset($_POST['part1'])){echo $_POST['part1'];}?>" required> .</td>
<td><input class='champ2' name='part2' type='text' value= "<?php if (isset($_POST['part2'])){echo $_POST['part2'];}?>" required> .</td>
<td><input class='champ2' name='part3' type='text' value= "<?php if (isset($_POST['part3'])){echo $_POST['part3'];}?>" required> .</td>
<td><input class='champ2' name='part4' type='text' value= "<?php if (isset($_POST['part4'])){echo $_POST['part4'];}?>" required> </td></tr></table>

<table cellpading='4' cellspacing='4' align='center' >
<tr><td>Binaire -> Décimal <input type='radio' name='trad' value='bintodec' checked></td><td>Décimal -> Binaire<input type='radio' name='trad' value='dectobin'></td></tr>
<tr></tr>
</table>
<input name='valider' class="btn btn-success btn-sm"type='submit' value='Valider' >
</form>

<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}
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
        
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
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
                if (strlen($val)>8){
                    header('Location:bin-dec.php?id=3');
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
<footer>
  <HR width=1240>
   </br>
   </br>
  <p id = "copyright"><span id="Copyright symbol">&copy Copyright 2021. IUT de Vélizy - PIERRE TOM - GIANNICO Raffaele - MANOHARAN Anushan - PARISOT Théo. Tous droits r&eacute;serv&eacute;s.</span></p>
   </br>
   </br>
  <HR width=1240>
</footer>