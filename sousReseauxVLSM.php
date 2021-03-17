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
<h5>Sur cette page vous pourrez apprendre à partitionner votre réseau en different sous réseau.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h5 align='center'><p> <a href="cours/Exemple-VLSM.html" onclick="open('cours/Exemple-VLSM.html','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">Cours VLSM</a> </p></h5>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>
<br>

<form action='sousReseauxVLSM.php#IP' method='get'>
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
<form action='sousReseauxVLSM.php#Res' method='get' >
<table cellpading='4' cellspacing='4' align= center>
<tr><h5 id = 'Res'>Entrez une adresse réseau pour la diviser en sous-réseaux.</h5></tr>
<tr>
    <td align='right'>Adresse réseau :</td> 
    <td><input class='champ' name='ip' id= "ip" type='text' placeholder="192.168.0.0" onfocusout="adresseIPValide('ip', 'errIP')" value= "<?php if (isset($_GET['ip'])){echo $_GET['ip'];} ?>" required> 
    <td><input class='champ' name='masque' id= "masque" type='text' min='1' max='30' placeholder="/24 ou 255.255.0.0" onfocusout="masqueValide('masque', 'errMasque')" value="<?php if (isset($_GET['masque'])){echo $_GET['masque'];} ?>" required> </td>
</tr>
</table>


<p style='color:red' id='errIP'></p>
<p style='color:red' id='errMasque'></p>



<?php
// Recupere les valeurs inscrit dans les champs ajoutés pour les garder apres l'actualisation
// de la page

	$valHotesPas_trie=0;
	$valHotes=0;
	if (isset($_GET['cmp'], $_GET['hote'])){
		$valHotes=$_GET['hote'];
	}

	
?>

<script type="text/javascript">

$(document).ready(function(){
    var maxField = 30; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper

	var x = 1; //Initial field counter is 1
	document.getElementById("cmp").value=x;
	var valeurHotes = <?php echo json_encode($valHotes); ?>;
	//alert(valeurHotes);
    if(typeof valeurHotes[x-1] === "undefined"){
    	var fieldHTML = '<div><input style="margin-left:20px" type="number" name="hote[]" value="" min="1" required/><a href="javascript:void(0);" class="remove_button"><img src="img/red-cross.png"/></a></div>'; //New input field html
    }
    else{
    	
    	// sert a sauvegarder les valeurs quand on actualise quand on actualise
    	document.getElementById("premierChamp").value=valeurHotes[x-1];
    	//
    	for (var i=0;i<valeurHotes.length-1;i++) {
    		x++; //Increment field counter
            $(wrapper).append('<div><input style="margin-left:20px" type="number" name="hote[]" value="'+valeurHotes[x-1]+'" min="1" required/><a href="javascript:void(0);" class="remove_button"><img src="img/red-cross.png"/></a></div>'); //Add field html
            document.getElementById("cmp").value=x;
    	}

    }
    
    //Once add button is clicked
    $(addButton).click(function (e){
        //Check maximum number of input fields
        e.preventDefault();
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div><input style="margin-left:20px" type="number" name="hote[]" value="" min="1" required/><a href="javascript:void(0);" class="remove_button"><img src="img/red-cross.png"/></a></div>'); //Add field html
            document.getElementById("cmp").value=x;
            document.getElementById('compteurNbrRes').innerHTML = ""+x;
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
         x--;//Decrement field counter
        document.getElementById("cmp").value=x;
        document.getElementById('compteurNbrRes').innerHTML = ""+x;
    });
});
</script>




	 Nombre de sous-réseaux : <span id="compteurNbrRes"><?php if (isset($_GET['cmp'])){echo $_GET['cmp'];} ?> </span>
    <a href="javascript:void(0);" class="add_button" title="Add field"><input type='button' class='btn btn-success btn-sm' id='ajIn' value=' + ' /></a>

    <br><div><input type="number" name="hote[]" id ="premierChamp" value="" min="1" required/></div>
    <input  type="hidden" value="javascript:x;" name="cmp" id="cmp" />
    <input  type="hidden" value="$valHotes" name="valhotes" id="hotes" />
    <div id="frm" class="field_wrapper"></div>

    <input name='valider' type="submit" class="btn btn-success btn-sm" value='Valider'>
 
</form >




<?php

function display($a){
    echo"<pre>";
    print_r($a);
    echo"</pre>";
}

function estUnePuissance2($n){
    return $n != 0 && ($n & ($n-1)) == 0;
}




if(isset($_GET['ip'],$_GET['masque']))
{
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
    
    
   
   
   
   /*************************************** MASQUE RESEAU *********************************************/
    $tab[0]=0;
    $tab2[0]=0;
    $m1="";// 1ere partie du masque reseau
    $m2="";// 2eme
    $m3="";// 3eme
    $m4="";// 4eme
    $compt=0;


    /******* fonction qui calcule le nombre de 1 a mettre pour le masque **************/ 
    function NvMasque($nbrHote, $slash)
    {
	    $p=0;
	    $puiss = pow(2,$p);
	    while($puiss <= $nbrHote)
	    {
	    	$puiss = pow(2,$p);
	    	if($puiss <= $nbrHote)
	    		$p++;
	    }

		$newSlash = 32 - $p;
	    //echo "voici les puissances : $puiss <br/> et /$newSlash";
	    return $newSlash;
    }
    
    /*********************************************************************************/

    /********************masque Reseau entrée par l'utilisateur***********************/

    $dm1=0;// 1ere partie du masque reseau
    $dm2=0;
    $dm3=0;
    $dm4=0;

    $newDm1=0;// 1ere partie du NOUVEAU masque reseau
    $newDm2=0;
    $newDm3=0;
    $newDm4=0;

    $nbrHote[0]=0;
    $NewMasquesVLSM[0]=0;
    $MasqueVLSM[0]=0;
    $newSlash[0]=0;
	$nbrHote = 0;

    if(isset($_GET['hote'])){
    	$nbrHote = $_GET['hote'];
    	rsort($nbrHote);
    }
    for ($k=0; $k < $_GET['cmp']; $k++) { 
    	if(isset($_GET['hote'])){
		    if($cidr == 0){

		    	$newSlash[$k] = NvMasque($nbrHote[$k], $slash);
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
			    		if($compt<$newSlash[$k])
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

			    $Masque = array($dm1,$dm2,$dm3,$dm4);
			    $MasqueVLSM[$k] = $Masque; 

			    $newDm1=bindec($newM1);// 1ere partie du NOUVEAU masque reseau
			    $newDm2=bindec($newM2);
			    $newDm3=bindec($newM3);
			    $newDm4=bindec($newM4);

			    $NewMasque = array($newDm1,$newDm2,$newDm3,$newDm4);
			    $NewMasquesVLSM[$k]= $NewMasque;
			    //print_r($NewMasquesVLSM);
			    //print_r($MasqueVLSM);

			    //echo("CIDR $k");
			    $compt=0;
			}
			else{
				$dm1=$masque[0];// 1ere partie du masque reseau
			    $dm2=$masque[1];
			    $dm3=$masque[2];
			    $dm4=$masque[3];

			    $MasqueVLSM[$k] = $masque; 

			    $compt=0;
			    $newSlash[$k] = NvMasque($nbrHote[$k], $slash);
			    for($i=1;$i<=4;$i++)
			    {
			    	for($j=0;$j<8;$j++)
			    	{
			    		if($compt<$newSlash[$k])
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
			    $newDm1=bindec($newM1);// 1ere partie du NOUVEAU masque reseau
			    $newDm2=bindec($newM2);
			    $newDm3=bindec($newM3);
			    $newDm4=bindec($newM4);
			    $NewMasque = array($newDm1,$newDm2,$newDm3,$newDm4);
			    $NewMasquesVLSM[$k]= $NewMasque;
			    //echo("ENTIER");
			}
		}
	}


    /**************************************************************/
    //echo "<tr><td>Adresse réseau: <b>".$adrIP[0].".".$adrIP[1].".".$adrIP[2].".".$adrIP[3]."</b></td></tr>";
   // echo "<tr><td>Masque de Sous réseau: <b>".$dm1.".".$dm2.".".$dm3.".".$dm4." ou ". $_GET['masque']."</b></td></tr>";

    //echo "NOUVEAU masque de Sous réseau: ".$newDm1.".".$newDm2.".".$newDm3.".".$newDm4." ou /". $newSlash."<br>";

    /*****************************************************************************************************/



    $nbrZero = 32- $slash;
    $adrReseau[0]=0;
    $sousReseauDB[0]=0;
    $sousReseauFIN[0]=0;
    $broadcast[0]=0;


    /************Permet de connaitre le nombre de sous-réseaux possibles*********/
    $nbrSousRes = pow(2,$nbrZero-2);

   // echo "<tr><td>Nombre de sous-réseaux disponible : <b>". $nbrSousRes."</b></td></tr>";

    /*****************************************************************************/

	/*** Calcule le nombre max d'hotes possible et le nombre d'hotes demandé par l'utilisateur ****/
    $nbr0 = 32 - $slash;
  	//echo "vs avez entrer /".$slash;
    $nbrHotesMax = pow(2,$nbr0)-2; // le nombre d'hotes max
    echo "<tr><td>Nombre d'Hotes Disponible maximum: <b>". $nbrHotesMax."</b></td></tr>
    </table>";

    $addHoteUser = 0;
    foreach ($nbrHote as $val) {
    	 $addHoteUser += $val;
    }

    $puiss=0;
    $p=0;
    while($puiss < $addHoteUser)
    {
    	$puiss = pow(2,$p)-2;
    	$p++;
    	
    }
    /********************************************************************************/

    if($nbrSousRes < $_GET['cmp']){
     echo"<p style='color:red'>Le nombre de sous-réseaux demandé est supérieur au nombre maximum de sous-réseaux. (".$nbrSousRes." Max)</p>";
    }
    elseif ($nbrHotesMax < $puiss) {//teste si le nombre d'hotes demandé est inferieur au nombre d'hotes max
     	echo"<p style='color:red'>Le nombre d'hôtes demandé (".$puiss.") est supérieur au nombre maximum d'hôtes (".$nbrHotesMax.")</p>";
    }
    elseif ($erreur != 0) {//teste si le nombre d'hotes demandé est inferieur au nombre d'hotes max
     	echo"<p style='color:red'>ERREUR</p>";
    }  
    else{
    	$multiplReseau[0] = 256;
    	for ($i=0; $i < $_GET['cmp']; $i++) { 
    		$multiplReseau[$i] = 256;
    	}
	    $pas[0]=0;
      	/******************************************************************************************/

      

      	for ($i=0; $i < $_GET['cmp']; $i++) { 

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

	      	

	      	/*Si la 1ere partie du masque Réseau est different de 255 on le soustrait a 256
	      	ce qui nous permet de savoir combien on incrémente pour chaque sous réseaux*/
	    	$part1=$MasqueVLSM[$i][0] & intval($part1);
	    	if($NewMasquesVLSM[$i][0] !=0 && $NewMasquesVLSM[$i][0] !=255)
	    	{
	    		$multiplReseau[$i]-=$NewMasquesVLSM[$i][0];
	    		$pas[$i]=1;
	    	}
	        
	       /*De meme pour la 2eme partie du masque Réseau Voir plus haut*/
	        
	    	$part2=$MasqueVLSM[$i][1] & intval($part2);
	    	if($NewMasquesVLSM[$i][1] !=0 && $NewMasquesVLSM[$i][1] !=255)
	    	{
	    		$multiplReseau[$i]-=$NewMasquesVLSM[$i][1];
	    		$pas[$i]=2;
	    	}
	        
	       
	       	/*De meme pour la 3eme partie du masque Réseau Voir plus haut*/
	        
	    	$part3=$MasqueVLSM[$i][2] & intval($part3);
	    	if($NewMasquesVLSM[$i][2] !=0 && $NewMasquesVLSM[$i][2] !=255)
	    	{
	    		$multiplReseau[$i]-=$NewMasquesVLSM[$i][2];
	    		$pas[$i]=3;
	    	}
	    

	        /*De meme pour la 4eme partie du masque Réseau Voir plus haut*/
	        
	    	$part4=$MasqueVLSM[$i][3] & intval($part4);
	    	if($NewMasquesVLSM[$i][3] !=0 && $NewMasquesVLSM[$i][3] !=255)
	    	{
	    		$multiplReseau[$i]-=$NewMasquesVLSM[$i][3];
	    		$pas[$i]=4;
	    	}
	    
	        
	        
	     	$num=0;
	     	foreach ($NewMasquesVLSM[$i] as $value) {
	     		if($value ==255)
	    	    {
	    	    	$num++;
	    	    }
	    	   
	     	}
	     	// ici on test si les parties du masque sont égale soit a 255 soit a 0 car il n'y a pas besoin de faire
	     	//ce qu'il y a en haut
	    	if(($NewMasquesVLSM[$i][0] ==255 || $NewMasquesVLSM[$i][0] ==0)&&($NewMasquesVLSM[$i][1] ==255 || $NewMasquesVLSM[$i][1] ==0) && ($NewMasquesVLSM[$i][2] ==255 || $NewMasquesVLSM[$i][2] ==0) && ($NewMasquesVLSM[$i][3] ==255 || $NewMasquesVLSM[$i][3] ==0))
	        {
	    	   	$pas[$i]=$num;
	            $multiplReseau[$i]=1;
	    	   	//echo " pas: ".$pas;
	    	}	
    	}
        //echo "<br> <br>Multiple: ".$multiplReseau;
        /*********************************************************************************************************************/

        //echo"pas = $pas";
        //les parties des Fins des sous-réseaux

        // $part1,2,3,4 est l'adresse réseau calculer avec un ET logique entre l'adresse IP et le masque.
        // $partRes1,2,3,4 adresse IP entrer par l'utilisateur.

        //print_r($multiplReseau);
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
	            <th>Nombre d'hotes</th>
	        </tr>
	        </thead>

	        ";
	        //Cette boucle parcours les différents sous-reseaux
	        for($j=0;$j<$_GET['cmp'];$j++)
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


	            /******** Donne l'adresse Broadcast *********/
	            $m=$NewMasquesVLSM[$j][0];
	            $bdPart1 = $part1 | ($m^255);

	            $m=$NewMasquesVLSM[$j][1];
	            $bdPart2 = $part2 | ($m^255);

	            $m=$NewMasquesVLSM[$j][2];
	            $bdPart3 = $part3 | ($m^255);

	            $m=$NewMasquesVLSM[$j][3];
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
	            if($pas[$j]==1){
	                if($part1+$multiplReseau[$j] <= 254)
	            	   $part1+=$multiplReseau[$j];
	            }
	            if($pas[$j]==2){
	                if($part2+$multiplReseau[$j] <= 254)
	            	   $part2+=$multiplReseau[$j];
	                else{
	                    $part1+=1;
	                    $part2=0; 
	                }
	            }
	            if($pas[$j]==3){
	                if($part3+$multiplReseau[$j] <= 254)
	            	   $part3+=$multiplReseau[$j];
	                else{
	                    $part2+=1;
	                    $part3=0;       
	                }
	            }
	            if($pas[$j]==4){
	                if(($part4+$multiplReseau[$j]) <= 254)
	            	   $part4+=$multiplReseau[$j];
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
	            echo($NewMasquesVLSM[$j][0].".".$NewMasquesVLSM[$j][1].".".$NewMasquesVLSM[$j][2].".".$NewMasquesVLSM[$j][3]);
	            echo"</td>";

	            echo"<td>";
	            echo("/".$newSlash[$j]);
	            echo"</td>";

	            echo"<td>";
	            echo($nbrHote[$j]);
	            echo"</td>";
	            
	        }
	        echo"</tr>
	        </table>";

	    }
	    else{
	    	if(!(isset($_GET['id'])))
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
    if($_GET['id']=='5'){
        echo"<p style='color:red'>Masque entrée invalide</p>";
    }
    if($_GET['id']=='5'){
    	if(isset($_GET['hoteDemande'], $_GET['hoteMax'])){
    		echo"<p style='color:red'>Le nombre d'hôtes demandé (".$_GET['hoteDemande'].") est supérieur au nombre maximum d'hôtes (".$_GET['hoteMax']." )</p>";
    	}
        
    }
} 


?>
