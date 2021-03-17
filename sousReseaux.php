<?php
require("barreDeMenu.php");
?>
<script>
function adresseIPValide(choix, affiche)
{
        var adr = document.getElementById(choix).value; //le noeud parent

    var partieIP = adr.split('.');
    if(partieIP.length == 4){
        for(var val in partieIP) {
            if (isNaN(partieIP[val]) == true || partieIP[val] < 0 || partieIP[val] > 255) {
                document.getElementById(affiche).innerHTML="Veuillez entrez une adresse réseau valide";
                //alert("FAUTE!");
                return false;
            }
            else
                document.getElementById(affiche).innerHTML="";
        
        }
    }
    else
        document.getElementById(affiche).innerHTML="Veuillez entrez une adresse réseau valide";

    return true;
}

function masqueValide(choix, affiche)
{
    var masque = document.getElementById(choix).value; //le noeud parent

    var lenMasque = masque.length;
    var partieMasque = masque.split('.');
    var precedent = 255;

    if(partieMasque.length == 4){
        //alert(partieMasque.length);
        for(var val in partieMasque) {
            //alert(partieMasque[val]);
            if ((isNaN(partieMasque[val]) == true) || (partieMasque[val] < 0) || (partieMasque[val] > 255) || (precedent < partieMasque[val])) {
                document.getElementById(affiche).innerHTML="Veuillez entrez un masque valide";
                //alert("FAUTE!");
                return false;
            }
            else
                document.getElementById(affiche).innerHTML="";

            precedent = partieMasque[val];
        }
    }
    else if (lenMasque <=3 && lenMasque>=2) {
        if(masque.startsWith('/')){
            masque = masque.substr(1);
        }
        else
            document.getElementById(affiche).innerHTML="Veuillez entrez un masque valide";

        if(isNaN(masque) == true || (masque < 1) || (masque > 32)){
            document.getElementById(affiche).innerHTML="Veuillez entrez un masque valide";
            return false;
        }
        else
            document.getElementById(affiche).innerHTML="";
        
    }
    else
        document.getElementById(affiche).innerHTML="";

    return true;
}

</script>
<br/>
<h5>Sur cette page vous pourrez apprendre à diviser votre réseau en different sous réseau.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h5 align='center'><p> <a href="cours/sous-res.html" onclick="open('cours/sous-res.html','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;>Cours CIDR</a> </p></h5>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>
<br>

<form action='sousReseaux.php#IP' method='get'>
<table cellpading='4' cellspacing='4' align= center>

<tr><h5 id = 'IP'>Entrez une adresse machine pour trouver son adresse réseau.</h5></tr>
<tr>
     <td align='right'>Adresse IP :</td> 
    <td><input class='champ' name='ipRes' id= "ipRes" type='text' placeholder="192.168.10.2" onfocusout="adresseIPValide('ipRes', 'errIP_Res')" value= "<?php if (isset($_GET['ipRes'])){echo $_GET['ipRes'];} ?>" required> 
    <td><input class='champ' name='masqueRes' id= "masqueRes" type='text' min='1' max='30' placeholder="/24 ou 255.255.0.0" onfocusout="masqueValide('masqueRes','errMasque_Res')" value="<?php if (isset($_GET['masqueRes'])){echo $_GET['masqueRes'];} ?>" required> </td>
</tr>
<tr><td align='center' colspan='7'><input name='validerIP' type="submit" class="btn btn-success btn-sm" value='Valider'></td></tr>
</table>
</form>

<p style='color:red' id='errIP_Res'></p>
<p style='color:red' id='errMasque_Res'></p>

<?php
	if(isset($_GET['ipRes'],$_GET['masqueRes']))
	{
        /******** detecte si on entre /?? ou ???.???.???.??? **********/
        $cidr = 0;
        $adrIP = explode(".", $_GET['ipRes']);
        $slash = 0;
        $erreurRes = 0;

        foreach ($adrIP as $k => $val) {// teste si l'adresse IP entrée est valide
            if (!is_numeric($val) || $val < 0 || $val > 255) {
                echo"<p style='color:red'> Adresse ip entrée invalide, Veuillez entrer seulement des chiffres</p>";
                $erreurRes = 1;
            }
        }


        if(strlen($_GET['masqueRes'])<=3){ // s'il y a la notation CIDR
            if(strlen($_GET['masqueRes'])>=2){
                if(!is_numeric(substr($_GET['masqueRes'],1)) || substr($_GET['masqueRes'],1) < 1 || substr($_GET['masqueRes'],1) > 32){
                    echo"<p style='color:red'>Masque réseau invalide</p>";
                    $erreurRes = 1;
                }
                else
                    $slash = substr($_GET['masqueRes'],1);
            }
            else{
                echo"<p style='color:red'>Masque réseau invalide</p>";
                $erreurRes = 1;
            }
        }
        else{
            $masque = explode(".", $_GET['masqueRes']);
            $precedent = 255;
            //print_r($masque);
            foreach ($masque as $k => $val) {// teste si le masque entrée est valide
                if (!is_numeric($val) || $val < 0 || $val > 255 || $precedent < $val) {
                    echo"<p style='color:red'> Masque réseau invalide</p>";
                    $erreurRes = 1;
                }
                $precedent = $val;
            }

            $cidr = 1;
            echo '<form method="get">
            <input  type="hidden" value="$masque" name="masqueEnEntier" />
            </form >';

            foreach ($masque as $val) {
                $bin = decbin($val);
                $slash+=substr_count($bin, '1');
            }   

        }
        /**************************************************************/

        /**********************************************************************/
        
        if (isset($_GET['masqueEnEntier'])) {
            $masque = $_GET['masqueEnEntier'];
            echo"masqueEnEntier";
        }
    
        if($erreurRes ==0){
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
    	    		if($compt<$slash)// on decide combien de 1 on met sur le masque du reseau
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

       	 	$adrIP[0] = $dm1 & intval($adrIP[0]);
            $adrIP[1] = $dm2 & intval($adrIP[1]);
            $adrIP[2] = $dm3 & intval($adrIP[2]);
            $adrIP[3] = $dm4 & intval($adrIP[3]);

       	 	echo "<h3>Adresse Réseau: <b>".$adrIP[0].".".$adrIP[1].".".$adrIP[2].".".$adrIP[3]."</b></h3>";
        }

    }

?>
<br>
<br>
<br>
<HR width=700>
<br>
<br>
<br>
<form action='sousReseaux.php#Res' method='get' >
<table cellpading='4' cellspacing='4' align= center>
<tr><h5 id = 'Res'>Entrez une adresse réseau pour la diviser en sous-réseaux.</h5></tr>
<tr>
     <td align='right'>Adresse réseau :</td> 
    <td><input class='champ' name='ip' id= "ip" type='text' placeholder="192.168.0.0" onfocusout="adresseIPValide('ip', 'errIP')" value= "<?php if (isset($_GET['ip'])){echo $_GET['ip'];} ?>" required> 
    <td><input class='champ' name='masque' id= "masque" type='text' min='1' max='30' placeholder="/24 ou 255.255.0.0" onfocusout="masqueValide('masque', 'errMasque')" value="<?php if (isset($_GET['masque'])){echo $_GET['masque'];} ?>" required> </td>
</tr>
</table>
Nombre de sous-réseaux : <input class='champ' name='sousRes' type='number' min='1' value="<?php if (isset($_GET['sousRes'])){echo $_GET['sousRes'];} ?>" required><br>
<input name='valider' type="submit" class="btn btn-success btn-sm" value='Valider'>

</form>
<p style='color:red' id='errIP'></p>
<p style='color:red' id='errMasque'></p>
<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}

function estUnePuissance2($n){
    return $n != 0 && ($n & ($n-1)) == 0;
}




if(isset($_GET['ip'],$_GET['masque'])){

   /******** detecte si on entre /?? ou ???.???.???.??? **********/
    $cidr = 0;
    $adrIP = explode(".", $_GET['ip']);
    $slash = 0;
    $erreur = 0;

    foreach ($adrIP as $k => $val) {// teste si l'adresse IP entrée est valide
        if (!is_numeric($val) || $val < 0 || $val > 255) {
            echo"<p style='color:red'> Adresse ip entrée invalide, Veuillez entrer seulement des chiffres</p>";
            $erreur = 1;
            break;
        }
    }


    if(strlen($_GET['masque'])<=3){ // s'il y a la notation CIDR
        if(!is_numeric(substr($_GET['masque'],1)) || substr($_GET['masque'],1) < 1 || substr($_GET['masque'],1) > 32){
            echo"<p style='color:red'>Masque réseau invalide</p>";
            $erreur = 1;
        }
        else
            $slash = substr($_GET['masque'],1);
    }
    else{
        $masque = explode(".", $_GET['masque']);
        $precedent = 255;
        foreach ($masque as $k => $val) {// teste si le masque entrée est valide
            if (!is_numeric($val) || $val < 0 || $val > 255 || $precedent < $val) {
                echo"<p style='color:red'> Masque réseau invalide</p>";
                $erreur = 1;
            }
            $precedent = $val;
        }

        $cidr = 1;
        echo '<form method="get">
        <input  type="hidden" value="$masque" name="masqueEnEntier" />
        </form >';

        foreach ($masque as $val) {
            $bin = decbin($val);
            $slash+=substr_count($bin, '1');
        }   

    }
    /**************************************************************/

    /**********************************************************************/
    
    if (isset($_GET['masqueEnEntier'])) {
        $masque = $_GET['masqueEnEntier'];
        echo"masqueEnEntier";
    }
    
    echo"<table cellpadding='4' cellspacing='4' align='center' >";

    echo "<tr><td>Adresse Réseau: <b>".$adrIP[0].".".$adrIP[1].".".$adrIP[2].".".$adrIP[3]."</b></td></tr>";
   
   
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

    $sousRes= $_GET['sousRes'];
    $p=0;
    $puiss = pow(2,$p);
    while($puiss < $sousRes)
    {
    	$puiss = pow(2,$p);
    	if($puiss < $sousRes)
    		$p++;
    }
   		 
    $newSlash = $slash + $p;
    if($newSlash > 30)
        $newSlash =30;
    /*************************************************************/

    /********************masque Reseau entrée par l'utilisateur***********************/

    for($i=1;$i<=4;$i++)
    {
    	for($j=0;$j<8;$j++)
    	{
    		if($compt<$slash)// on decide combien de 1 on met sur le masque du reseau
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
    echo "<tr><td>Masque de Sous réseau: <b>".$dm1.".".$dm2.".".$dm3.".".$dm4." ou /". $slash."</b></td></tr>";
    //echo "NOUVEAU masque de Sous réseau: ".$newDm1.".".$newDm2.".".$newDm3.".".$newDm4." ou /". $newSlash."<br>";

    /*****************************************************************************************************/



    $nbrZero = 32- $slash;
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

        $part1 = $adrIP[0];
        $part2 = $adrIP[1];
        $part3 = $adrIP[2];
        $part4 = $adrIP[3];

        $partRes1 = $adrIP[0];
        $partRes2 = $adrIP[1];
        $partRes3 = $adrIP[2];
        $partRes4 = $adrIP[3];
      	


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
