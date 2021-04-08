<head>  <!-- cette section "head" contient tout ce qui s'occupe des feuilles de style  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
  <title>Projet Réseau</title>
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
        Conversions<br>Adresses IP 
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="bin-dec.php">Binaire vers Décimal</a>
        <a class="dropdown-item" href="hex-dec.php">Hexadecimal vers Décimal</a>
      </div>
    </li>

    <!-- Links -->
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
      Division<br>de réseaux
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="sousReseaux.php">Notation CIDR</a>
        <a class="dropdown-item" href="sousReseauxVLSM.php">Notation VLSM</a>
    </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="crc.php" style="margin-top: 10%">Calculs de CRC</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
      Execution<br>Commande<br>Réseaux
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="nmap.php">nmap</a>
        <a class="dropdown-item" href="nslookup.php">nslookup</a>
        <a class="dropdown-item" href="tcpdump.php">tcpdump</a>
        <a class="dropdown-item" href="ping.php">ping</a>
        <a class="dropdown-item" href="man.php">man</a>
    </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="glossaire.php" style="margin-top: 14%">Glossaire</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href='sujet_rapport/Manuel_Utilisateur/manuel_utilisateur.html' onclick="open('sujet_rapport/Manuel_Utilisateur/manuel_utilisateur.html','Popup','scrollbars=1,resizabl=1,height=750,width=750');return false;">Manuel<br/>d'utilisation</a>
    </li>
  </ul>
</nav>
