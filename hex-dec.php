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
<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de hexadecimal à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<p> explication de comment ça marche </p>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='hex-dec.php' method='post' >
<table cellpading='4' cellspacing='4' align='center'>

<tr><td>Adresse IP: </td>
<td><input class='champ' name='part1' type='text' value= "<?php if (isset($_POST['part1'])){echo $_POST['part1'];}?>" required> .</td>
<td><input class='champ' name='part2' type='text' value= "<?php if (isset($_POST['part2'])){echo $_POST['part2'];}?>" required> .</td>
<td><input class='champ' name='part3' type='text' value= "<?php if (isset($_POST['part3'])){echo $_POST['part3'];}?>" required> .</td>
<td><input class='champ' name='part4' type='text' value= "<?php if (isset($_POST['part4'])){echo $_POST['part4'];}?>" required> </td></tr></table>

<table cellpading='4' cellspacing='4' align='center' >
<tr><td>Hexa -> Décimal <input type='radio' name='trad' value='hextodec' checked></td><td>Décimal -> Hexa<input type='radio' name='trad' value='dectohex'></td></tr>
</table>
<input name='valider' class="btn btn-success btn-sm" type='submit' value='Valider' >

</form>

<?php
if(isset($_POST['part1'],$_POST['part2'],$_POST['part3'],$_POST['part4'])){
    if($_POST['trad']=='dectohex'){
        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "dectohex")
            {
            }
            else
            {
                if (!is_numeric($val))
                {
                    header('Location:hex-dec.php?id=0');
                }
                if ($val>255)
                {
                    header('Location:hex-dec.php?id=1');
                }
            }
        }
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider"  or $val == "dectohex")
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
            if ($val == "Valider"  or $val == "dectohex")
            {
                
            }
            else
            {
                echo"<td>";
                echo  dechex($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
    else{
        foreach ($_POST as $val){
            if ($val == "Valider" or $val == "hextodec")
            {
            }
            else
            {
                if (!ctype_xdigit($val))
                {
                    header('Location:hex-dec.php?id=2');
                }
                if (strlen($val)>2)
                {
                    header('Location:hex-dec.php?id=3');
                }
            }
        }
        echo"<table cellpading='4' cellspacing='4' align='center' border ='2'>
        <tr><td>adresse ip original:</td>";
        foreach($_POST as $val){
            if ($val == "Valider" or $val == "hextodec")
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
            if ($val == "Valider" or $val == "hextodec" )
            {
                
            }
            else
            {
                echo"<td>";
                echo  hexdec($val);
                echo"</td>";
            }
        }
        echo"</tr>";
    }
    
}
    
if (isset($_GET['id'])){
    if($_GET['id']=='0'){
        echo"<p style='color:red'>asresse ip entree invalide</p>";
    }
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide</p>";
        }
    if($_GET['id']=='3'){
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