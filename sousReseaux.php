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
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Conversions Adresses IP
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bin-dec.php">Binaire -> Décimal</a>
        <a class="dropdown-item" href="hex-dec.php">Hexadecimal -> Décimal</a>
      </div>
    </li>

    <!-- Links -->
     <li class="nav-item">
      <a class="nav-link active" href="sousReseaux.php">Division de réseaux</a>
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
<h5>Sur cette page vous pourrez apprendre à partitionner votre réseau en different sous réseau.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<p> <iframe src="cours/sous-res.html" width="1000" height="500"></iframe> </p>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>
<br>

<form action='sousReseaux.php#IP' method='get'>
<table cellpading='4' cellspacing='4' align= center>

<tr><h5 id = 'IP'>Entrez une adresse machine pour trouver son adresse réseau.</h5></tr>
<tr>
    <td align='right'>Adresse IP :</td> 
    <td><input class='champ' name='part1IP' type='number' min='0' max='255' value= "<?php if (isset($_GET['part1IP'])){echo $_GET['part1IP'];} ?>" required> .</td>
    <td><input class='champ' name='part2IP' type='number' min='0' max='255' value="<?php if (isset($_GET['part2IP'])){echo $_GET['part2IP'];} ?>" required> .</td>
    <td><input class='champ' name='part3IP' type='number' min='0' max='255' value="<?php if (isset($_GET['part3IP'])){echo $_GET['part3IP'];} ?>" required> .</td>
    <td><input class='champ' name='part4IP' type='number' min='0' max='255' value="<?php if (isset($_GET['part4IP'])){echo $_GET['part4IP'];} ?>" required> </td>
    <td> / <input class='champ' name='part5IP' type='number' min='1' max='30' value="<?php if (isset($_GET['part5IP'])){echo $_GET['part5IP'];} ?>" required> </td>

</tr>
<tr><td align='center' colspan='7'><input name='validerIP' type="submit" class="btn btn-success btn-sm" value='Valider'></td></tr>
</table>
</form>
<?php
	if(isset($_GET['part1IP'],$_GET['part2IP'],$_GET['part3IP'],$_GET['part4IP'], $_GET['part5IP']))
	{
		foreach ($_GET as $k => $val)
    	{
	        if (!($val == "Valider" or $k == 'sousRes'))
	        {
	            if (!is_numeric($val))
	                echo"<p style='color:red'>Adresse ip entrée invalide</p>";
	            else if ($val>255 || $val<0)
	                echo"<p style='color:red'>Adresse ip entrée invalide</p>";
	        }
    	}

    	$part1IP=$_GET['part1IP'];
   	 	$part2IP=$_GET['part2IP'];
   	 	$part3IP=$_GET['part3IP'];
   	 	$part4IP=$_GET['part4IP'];

        $tab[0]=0;
	    $tab2[0]=0;
	    $m1="";// 1ere partie du masque reseau
	    $m2="";// 2eme
	    $m3="";// 3eme
	    $m4="";// 4eme
	    $compt=0;
         /********************masque Reseau entrée par l'utilisateur***********************/

	    for($i=1;$i<=4;$i++)
	    {
	    	for($j=0;$j<8;$j++)
	    	{
	    		if($compt<$_GET['part5IP'])// on decide combien de 1 on met sur le masque du reseau
	    			$tab[$j] = 1;
	    		else
	    			$tab[$j] = 0; // le reste ne sont que des 0
	    		$compt++;
	    	}
	    		if($i==1)
	    			$m1=implode('', $tab); // 1ere partie de la partie en Binaire 
	    		if($i==2)
	    			$m2=implode('', $tab); // 2eme
	    		if($i==3)
	    			$m3=implode('', $tab); // 3eme
	    		if($i==4)
	    			$m4=implode('', $tab); // 4eme
	    	
	    }
	    $dm1=bindec($m1);// 1ere partie du masque reseau
	    $dm2=bindec($m2);
	    $dm3=bindec($m3);
	    $dm4=bindec($m4);
   	 	/**********************************************************************************/

   	 	$part1IP=$dm1 & intval($part1IP);
   	 	$part2IP=$dm2 & intval($part2IP);
   	 	$part3IP=$dm3 & intval($part3IP);
   	 	$part4IP=$dm4 & intval($part4IP);

   	 	echo "<h3>Adresse Réseau: <b>".$part1IP.".".$part2IP.".".$part3IP.".".$part4IP."</b></h3>";


    }

?>
<br>
<br>
<br>
<HR width=700>
<br>
<br>
<br>
<form action='sousReseaux.php#Res' method='get'>
<table cellpading='4' cellspacing='4' align= center>
<tr><h5 id = 'Res'>Entrez une adresse réseau pour la diviser en sous-réseaux.</h5></tr>
<tr>
    <td align='right'>Adresse réseau :</td> 
    <td><input class='champ' name='part1' type='number' min='0' max='255' value= "<?php if (isset($_GET['part1'])){echo $_GET['part1'];} ?>" required> .</td>
    <td><input class='champ' name='part2' type='number' min='0' max='255' value="<?php if (isset($_GET['part2'])){echo $_GET['part2'];} ?>" required> .</td>
    <td><input class='champ' name='part3' type='number' min='0' max='255' value="<?php if (isset($_GET['part3'])){echo $_GET['part3'];} ?>" required> .</td>
    <td><input class='champ' name='part4' type='number' min='0' max='255' value="<?php if (isset($_GET['part4'])){echo $_GET['part4'];} ?>" required> </td>
    <td> / <input class='champ' name='part5' type='number' min='1' max='30' value="<?php if (isset($_GET['part5'])){echo $_GET['part5'];} ?>" required> </td>
</tr>
</table>
Nombre de sous-réseaux : <input class='champ' name='sousRes' type='number' min='1' value="<?php if (isset($_GET['sousRes'])){echo $_GET['sousRes'];} ?>" required><br>
<input name='valider' type="submit" class="btn btn-success btn-sm" value='Valider'>

</form>

<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}

function estUnePuissance2($n){
    return $n != 0 && ($n & ($n-1)) == 0;
}




if(isset($_GET['part1'],$_GET['part2'],$_GET['part3'],$_GET['part4'], $_GET['part5'],$_GET['sousRes']))
{

    foreach ($_GET as $k => $val)
    {
        if (!($val == "Valider" or $k == 'sousRes'))
        {
            if (!is_numeric($val))
                echo"<p style='color:red'>Adresse ip entrée invalide</p>";
            else if ($val>255 || $val<0)
                echo"<p style='color:red'>Adresse ip entrée invalide</p>";
        }
        echo"<table cellpadding='4' cellspacing='4' align='center' >";
    }
    echo "<tr><td>Adresse réseau: <b>".$_GET['part1'].".".$_GET['part2'].".".$_GET['part3'].".".$_GET['part4']."/".$_GET['part5']."</b></td></tr>";
   
   
   
   /*************************************** MASQUE RESEAU*********************************************/
    $tab[0]=0;
    $tab2[0]=0;
    $m1="";// 1ere partie du masque reseau
    $m2="";// 2eme
    $m3="";// 3eme
    $m4="";// 4eme
    $compt=0;


    /*******si le nombre de sous réseau n'est pas un multiple de 2 
    		********on le change en multiple de 2*******/

    $slash= $_GET['sousRes'];
    $p=0;
    $puiss = pow(2,$p);
    while($puiss < $slash)
    {
    	$puiss = pow(2,$p);
    	if($puiss < $slash)
    		$p++;
    }
   		 
    $newSlash = $_GET['part5'] + $p;
    if($newSlash > 30)
        $newSlash =30;
    /*************************************************************/

    /********************masque Reseau entrée par l'utilisateur***********************/

    for($i=1;$i<=4;$i++)
    {
    	for($j=0;$j<8;$j++)
    	{
    		if($compt<$_GET['part5'])// on decide combien de 1 on met sur le masque du reseau
    			$tab[$j] = 1;
    		else
    			$tab[$j] = 0; // le reste ne sont que des 0
    		$compt++;
    	}
    		if($i==1)
    			$m1=implode('', $tab); // 1ere partie de la partie en Binaire 
    		if($i==2)
    			$m2=implode('', $tab); // 2eme
    		if($i==3)
    			$m3=implode('', $tab); // 3eme
    		if($i==4)
    			$m4=implode('', $tab); // 4eme
    	
    }
    /**********************************************************************************/

    /**********************Nouveau Masque Reseau**********************/
    $compt=0;
    for($i=1;$i<=4;$i++)
    {
    	for($j=0;$j<8;$j++)
    	{
    		if($compt<$newSlash)
    			$tab2[$j] = 1;
    		else
    			$tab2[$j] = 0;
    		$compt++;
    	}
    		if($i==1)
    			$newM1=implode('', $tab2); // 1ere partie de la partie en Binaire du nouveau masque
    		if($i==2)
    			$newM2=implode('', $tab2);
    		if($i==3)
    			$newM3=implode('', $tab2);
    		if($i==4)
    			$newM4=implode('', $tab2);
  
    }
    /******************************************************************/


    /*************Traduction de binaire en décimal*****************/ 

    $dm1=bindec($m1);// 1ere partie du masque reseau
    $dm2=bindec($m2);
    $dm3=bindec($m3);
    $dm4=bindec($m4);

    $newDm1=bindec($newM1);// 1ere partie du NOUVEAU masque reseau
    $newDm2=bindec($newM2);
    $newDm3=bindec($newM3);
    $newDm4=bindec($newM4);


    /**************************************************************/
    echo "<tr><td>Masque de Sous réseau: <b>".$dm1.".".$dm2.".".$dm3.".".$dm4." ou /". $_GET['part5']."</b></td></tr>";
    //echo "NOUVEAU masque de Sous réseau: ".$newDm1.".".$newDm2.".".$newDm3.".".$newDm4." ou /". $newSlash."<br>";

    /*****************************************************************************************************/



    $nbrZero = 32- $_GET['part5'];
    $adrReseau[0]=0;
    $sousReseauDB[0]=0;
    $sousReseauFIN[0]=0;
    $broadcast[0]=0;


    /************Permet de connaitre le nombre de sous-réseaux possibles*********/
    $nbrSousRes = pow(2,$nbrZero-2);

    echo "<tr><td>Nombre de sous-réseaux disponible : <b>". $nbrSousRes."</b></td></tr>";

    /*****************************************************************************/


    if($nbrSousRes < $_GET['sousRes']){
     echo"<p style='color:red'>Le nombre de sous-réseaux demandé est supérieur au nombre maximum de sous-réseaux. (".$nbrSousRes." Max)</p>";
    }
    else{

      	/******************************************************************************************/
        $nbr0 = 32 - $newSlash;

        $nbrHotes = pow(2,$nbr0)-2; // le nombre d'hotes par réseaux
        echo "<tr><td>Nombre d'Hotes Disponible pour chaque sous-réseaux : <b>". $nbrHotes."</b></td></tr>
        </table>";
        $compt = 0;

        $part1 = $_GET['part1'];
        $part2 = $_GET['part2'];
        $part3 = $_GET['part3'];
        $part4 = $_GET['part4'];

      	$partRes1 = $_GET['part1'];
        $partRes2 = $_GET['part2'];
        $partRes3 = $_GET['part3'];
        $partRes4 = $_GET['part4'];
      	


      	/******************ET Binaire entre l'adresse IP et le masque Reseau (avoir l'adresse Reseau)******************/

      	$multiplReseau = 256;
      	$multiple=0;
      	$pas=0;

      	/*Si la 1ere partie du masque Réseau est different de 255 on le soustrait a 256
      	ce qui nous permet de savoir combien on incrémente pour chaque sous réseaux*/
    	$part1=$dm1 & intval($part1);
    	if($newDm1 !=0 && $newDm1 !=255)
    	{
    		$multiplReseau-=$newDm1;
    		$pas=1;
    	}
        
       /*De meme pour la 2eme partie du masque Réseau Voir plus haut*/
        
    	$part2=$dm2 & intval($part2);
    	if($newDm2 !=0 && $newDm2 !=255)
    	{
    		$multiplReseau-=$newDm2;
    		$pas=2;
    	}
        
       
       	/*De meme pour la 3eme partie du masque Réseau Voir plus haut*/
        
    	$part3=$dm3 & intval($part3);
    	if($newDm3 !=0 && $newDm3 !=255)
    	{
    		$multiplReseau-=$newDm3;
    		$pas=3;
    	}
    

        /*De meme pour la 4eme partie du masque Réseau Voir plus haut*/
        
    	$part4=$dm4 & intval($part4);
    	if($newDm4 !=0 && $newDm4 !=255)
    	{
    		$multiplReseau-=$newDm4;
    		$pas=4;
    	}
    
        
        
        $NewMasque = array($newDm1,$newDm2,$newDm3,$newDm4);
        //display($NewMasque);
     	$num=0;
     	foreach ($NewMasque as $value) {
     		if($value ==255)
    	    {
    	    	$num++;
    	    }
    	   
     	}
     	// ici on test si les parties du masque sont égale soit a 255 soit a 0 car il n'y a pas besoin de faire
     	//ce qu'il y a en haut
    	if(($newDm1 ==255 || $newDm1 ==0)&&($newDm2 ==255 || $newDm2 ==0) && ($newDm3 ==255 || $newDm3 ==0) && ($newDm4 ==255 || $newDm4 ==0))
        {
    	   	$pas=$num;
            $multiplReseau=1;
    	   	//echo " pas: ".$pas;
    	}	
    	 
        //echo "<br> <br>Multiple: ".$multiplReseau;
        /*********************************************************************************************************************/

        //echo"pas = $pas";
        //les parties des Fins des sous-réseaux

        // $part1,2,3,4 est l'adresse réseau calculer avec un ET logique entre l'adresse IP et le masque.
        // $partRes1,2,3,4 adresse IP entrer par l'utilisateur.
        if(($part1 == $partRes1) && ($part2 == $partRes2) && ($part3 == $partRes3) && ($part4 == $partRes4)){
        

	        echo"<table cellpadding='4' cellspacing='4' align='center' border ='2'>
	        <thead>
	        <tr>
	            <th>Adresse de Sous-Réseau</th>
	            <th>1ère adresse utilisable</th>
	            <th>Dernière adresse utilisable</th>
	            <th>BroadCast</th>
	            <th>Masque</th>
	            <th>Masque en CIDR</th>
	        </tr>
	        </thead>

	        ";
	        //Cette boucle parcours les différents sous-reseaux
	        for($j=1;$j<=$_GET['sousRes'];$j++)
	        {
	            $Fpart1 = $part1;
	            $Fpart2 = $part2;
	            $Fpart3 = $part3;
	            $Fpart4 = $part4;
	        	echo"<tr>";

	                

	            /********************Permet de calculer la fin des sous-réseaux**********************/

	            //ex: ip: 192.160.0.0/12 => 192.163.255.255

	            /*cette partie permet de connaitre la limite du sous-réseau*/
	            // pas = partie qui est different de 255 dans le masque de sous reseau


	            /******** Donne l'adresse Brodcast *********/
	            $m=$newDm1;
	            $bdPart1 = $part1 | ($m^255);

	            $m=$newDm2;
	            $bdPart2 = $part2 | ($m^255);

	            $m=$newDm3;
	            $bdPart3 = $part3 | ($m^255);

	            $m=$newDm4;
	            $bdPart4 = $part4 | ($m^255);
	            /******************************************/

	            $Fpart1 = $bdPart1;
	            $Fpart2 = $bdPart2;
	            $Fpart3 = $bdPart3;
	            $Fpart4 = $bdPart4-1;


	           	/*************************************************************************************/




	            $adrReseau[$j]= $part1." . ".$part2." . ".$part3." . ".$part4;
	           	$sousReseauDB[$j]= $part1." . ".$part2." . ".$part3." . ".($part4+1); 
	            $sousReseauFIN[$j]= $Fpart1." . ".$Fpart2." . ".$Fpart3." . ".$Fpart4; 
	            $broadcast[$j]= $bdPart1." . ".$bdPart2." . ".$bdPart3." . ".$bdPart4;

	           	/**********permet de calculer le début du prochain sous réseau grace au multiple***********/
	            if($pas==1){
	                if($part1+$multiplReseau <= 254)
	            	   $part1+=$multiplReseau;
	            }
	            if($pas==2){
	                if($part2+$multiplReseau <= 254)
	            	   $part2+=$multiplReseau;
	                else{
	                    $part1+=1;
	                    $part2=0; 
	                }
	            }
	            if($pas==3){
	                if($part3+$multiplReseau <= 254)
	            	   $part3+=$multiplReseau;
	                else{
	                    $part2+=1;
	                    $part3=0;       
	                }
	            }
	            if($pas==4){
	                if(($part4+$multiplReseau) <= 254)
	            	   $part4+=$multiplReseau;
	                else {
	                    $part3+=1;
	                    $part4=0;
	                }
	               

	            }


	            /**********************************************************************************************/
	            echo"<td>";
	            echo($adrReseau[$j]);
	            echo"</td>";

	            echo"<td>";
	            echo($sousReseauDB[$j]);
	            echo"</td>";

	            echo"<td>";
	            echo($sousReseauFIN[$j]);
	            echo"</td>";

	            echo"<td>";
	            echo($broadcast[$j]);
	            echo"</td>";

	            echo"<td align='center'>";
	            echo($newDm1.".".$newDm2.".".$newDm3.".".$newDm4);
	            echo"</td>";

	            echo"<td>";
	            echo("/".$newSlash);
	            echo"</td>";
	            
	        }
	        echo"</tr>
	        </table>";

	    }
	    else{
        	echo"<p style='color:red'>Vous avez entrer une adresse IP machine. </br> Veuillez entrer une adresse réseau svp.</p>";
	    }

    }



}
if (isset($_GET['id'])){
    if($_GET['id']=='1'){
        echo"<p style='color:red'>Vous n'avez pas saisie toute les informations nécéssaires</p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>Adresse ip entrée invalide</p>";
    }
    if($_GET['id']=='3'){
        if(isset($_GET['tot']))
            echo"<p style='color:red'>Le nombre de sous-réseaux demandé est supérieur au nombre maximum de sous-réseaux. (".$_GET['tot']." Max)</p>";
    }
    if($_GET['id']=='4'){
        echo"<p style='color:red'>Vous avez entrer une adresse IP machine. </br> Veuillez entrer une adresse réseau svp.</p>";
    }
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