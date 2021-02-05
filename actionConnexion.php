<?php

if (isset($_POST['id']) and isset($_POST['mdp'])){
    if($_POST['id']=='admin' and $_POST['mdp']=='admin'){
        session_start();
        $_SESSION['id']='admin';
        header('Location: glossaire_admin.php');
        exit(0);
    }
    header('Location: connexion.php?err=0');
}
header('Location: connexion.php?err=1');
?>