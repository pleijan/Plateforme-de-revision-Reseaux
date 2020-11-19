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

<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}

function estUnePuissance2($n){
    return $n != 0 && ($n & ($n-1)) == 0;
}

echo "Une page PHP composé d’une zone pour indiquer son adresse IP et le nombre de sous réseau à créer et un bouton qui aura pour action d’appeler cette même page en récupérant les information des zones de texte par méthode GET permettant a la page appelée de faire de l’adressage de sous réseau avec notation VLSM et CIDR.
<br>
<br>
";
echo"
<form action='sousReseaux.php' method='get'>
<table cellpading='4' cellspacing='4'>

<tr>Adresse ip: <td><input name='part1' type='text'> .</td>
<td><input name='part2' type='text'> .</td>
<td><input name='part3' type='text'> .</td>
<td><input name='part4' type='text'> </td>
<td> / <input name='part5' type='text'> </td></tr></table>
<tr>Nombre de sous-réseaux <td><input name='sousRes' type='number'> </td>
<br>
<input name='rst' type='reset' value='Annuler'> <input name='valider' type='submit' value='Valider'> 

</form>";

if(isset($_GET['part1'],$_GET['part2'],$_GET['part3'],$_GET['part4'], $_GET['part5'],$_GET['sousRes']))
{
    foreach ($_GET as $k => $val)
    {
        if (!($val == "Valider" or $val == "Annuler" or $k == 'sousRes'))
        {
            if (!is_numeric($val))
                header('Location:sousReseaux.php?id=0');
            else if ($val>255)
                header('Location:sousReseaux.php?id=1');
        }
        echo"<table cellpadding='4' cellspacing='4'>";
    }
    echo "<tr><td>Adresse IP:</td>";

    foreach($_GET as $k => $val)
    {
        if (!($val == "Valider"  or $val == "rst" or $k == 'sousRes'))
        {
            echo"<td>";
            echo $val." .";
            echo"</td>";
        }
    }
   
    echo"</tr>
    </table>";

    echo"<table cellpadding='4' cellspacing='4'>";
   
   
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
    echo "Le masque de Sous réseau: ".$dm1.".".$dm2.".".$dm3.".".$dm4." ou /". $_GET['part5']."<br>";
    echo "Le NOUVEAU masque de Sous réseau: ".$newDm1.".".$newDm2.".".$newDm3.".".$newDm4." ou /". $newSlash."<br>";

    /*****************************************************************************************************/



    $nbrZero = 32- $_GET['part5'];
    
    $sousReseau[0]=0;
    echo"</tr><tr><td>Sous réseaux :</td>";

    $nbrSousRes = $_GET['sousRes'];



	/* Si le nombre de sous-réseaux n'est pas une puissance de 2 on la met a cette puissance */

    while(!(estUnePuissance2($nbrSousRes)))	
    	$nbrSousRes++;

    echo "Nombre de sous-réseaux disponible : ". $nbrSousRes;

  	/******************************************************************************************/


    $nbrHotes = pow(2,$nbrZero) / $nbrSousRes; // le nombre d'hotes par réseaux
    echo "<br>Nombre d'Hotes Disponible pour chaque sous-réseaux : ". ($nbrHotes-2);
    $compt = 0;

    $part1 = $_GET['part1'];
    $part2 = $_GET['part2'];
    $part3 = $_GET['part3'];
    $part4 = $_GET['part4'];

  
  	


  	/******************ET Binaire entre l'adresse IP et le masque Reseau (avoir l'adresse Reseau)******************/

  	$multiplReseau = 256;
  	$multiple=0;
  	$pas=0;

  	/*Si la 1ere partie du masque Réseau est different de 255 on le soustrait a 256
  	ce qui nous permet de savoir combien on incrémente pour chaque sous réseaux*/
    if($dm1 !=255)
    {
    	$b1=$m1 & decbin($part1);
    	$part1=bindec($b1);
    	if($newDm1 !=0)
    	{
    		$multiplReseau-=$newDm1;
    		$pas=1;
    	}
    }
   /*De meme pour la 2eme partie du masque Réseau Voir plus haut*/
    if($dm2 !=255)
    {
    	$b2=$m2 & decbin($part2);
    	$part2=bindec($b2);
    	if($newDm2 !=0)
    	{
    		$multiplReseau-=$newDm2;
    		$pas=2;
    	}
    }
   
   	/*De meme pour la 3eme partie du masque Réseau Voir plus haut*/
    if($dm3 !=255)
    {
    	$b3=$m3 & decbin($part3);
    	$part3=bindec($b3);
    	if($newDm3 !=0)
    	{
    		$multiplReseau-=$newDm3;
    		$pas=3;
    	}
    } 

    /*De meme pour la 4eme partie du masque Réseau Voir plus haut*/
    if($dm4 !=255)
    {
    	$b4=$m4 & decbin($part4);
    	$part4=bindec($b4);
    	if($newDm4 !=0)
    	{
    		$multiplReseau-=$newDm4;
    		$pas=4;
    	}
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
 	// ici on test si les parties l'adresse îp sont égale soit a 255 soit a 0 car il n'y a pas besoin de faire
 	//ce qu'il y a en haut
	if(($newDm1 ==255 || $newDm1 ==0)&&($newDm2 ==255 || $newDm2 ==0) && ($newDm3 ==255 || $newDm3 ==0) && ($newDm4 ==255 || $newDm4 ==0))
    {
	   	$pas=$num;
	   	echo "pas: ".$pas;
	   	$multiplReseau=1;
	}	
	 
    echo "<br> <br>Multiple: ".$multiplReseau;
    /*********************************************************************************************************************/



    //les parties des Fins des sous-réseaux
    $Fpart1 = $part1;
    $Fpart2 = $part2;
    $Fpart3 = $part3;
    $Fpart4 = $part4;

    $compt2=0;

    //Cette boucle parcours les différents sous-reseaux
    for($j=1;$j<=$_GET['sousRes'];$j++)
    {

    	echo"</tr><tr><td>Sous réseau ".$j. ":</td>";
        
        echo"<td>";

        /********************Permet de calculer la fin des sous-réseaux**********************/

        //ex: ip: 192.160.0.0/12 => 192.163.255.255

        /*cette partie permet de connaitre la limite du sous-réseau*/

        if($pas==1)
        	$Fpart1 = ($part1+$multiplReseau)-1;
        if($pas==2)
        	$Fpart2 = ($part2+$multiplReseau)-1;
        if($pas==3)
        	$Fpart3 = ($part3+$multiplReseau)-1;
        if($pas==4)
        	$Fpart4 = ($part4+$multiplReseau)-1;

        /***********************************************************/


        /********cette partie met les 0 a 255 quand il le faut**********/

        //ex: ip: 97.0.0.0 /16 => il faut mettre a 255 seulement 
        //les 2 dernieres parties 
       
        if($Fpart1 == 0 && $pas!=1)
        	$Fpart1=255;

        if($Fpart2 == 0 && $pas!=2)
        	$Fpart2=255;

        if($Fpart3 == 0 && $pas!=3)
        	$Fpart3=255;

        if($Fpart4 == 0 && $pas!=4)
       		$Fpart4=255;

       	/***************************************************************/

       	/*************************************************************************************/


       	$sousReseau[$j]= $part1." . ".$part2." . ".$part3." . ".$part4. " à ". $Fpart1." . ".$Fpart2." . ".$Fpart3." . ".$Fpart4; 


       	/*permet de calculer le début du prochain sous réseau grace au multiple*/
        if($pas==1)
        	$part1+=$multiplReseau;
        if($pas==2)
        	$part2+=$multiplReseau;
        if($pas==3)
        	$part3+=$multiplReseau;       
        if($pas==4)
        	$part4+=$multiplReseau;
        /***********************************************************************/


        echo($sousReseau[$j]);
        echo"</td>";

        
    }
    echo"</tr>";

    

    if (isset($_GET['id']))
    {
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
}
?>
