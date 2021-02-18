<?php

function ajout_glossaire($tuple){
	$fp1=fopen("cours/glossaire.csv", "r");
	$fp2=fopen("cours/temp.csv","w");
	if($fp1!==FALSE){	
		$line=fgetcsv($fp1, 1024,";");
		$i=1;
		while (!feof($fp1)&&$i==1) {
			
			$comparaison=strnatcmp(ucfirst($tuple[0]),ucfirst($line[0]));
			if ($comparaison>0){
				fputcsv($fp2,array($line[0],$line[1]),";");
			}
			else if ($comparaison<0){
				fputcsv($fp2,array($tuple[0],$tuple[1]),";");
				fputcsv($fp2,array($line[0],$line[1]),";");
				$i=0;
			}
			else return;
			
			$line=fgetcsv($fp1, 1024,";");
		
		}
		while (!feof($fp1)) {
			fputcsv($fp2,array($line[0],$line[1]),";");
			$line=fgetcsv($fp1, 1024,";");
		}
		fclose($fp1);
		fclose($fp2);
		unlink("cours/glossaire.csv");
		rename("cours/temp.csv","cours/glossaire.csv");
	}
}

session_start();
    if(isset($_SESSION['id']) and isset($_POST['mot']) and isset($_POST['def']) and $_POST['mot']!="" and $_POST['def']!="")
    {
		
		$a=array($_POST['mot'],$_POST['def']);
		ajout_glossaire($a);
    }header('Location: glossaire.php?err=1');
	
	
?>