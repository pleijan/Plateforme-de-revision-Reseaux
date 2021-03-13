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
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
      Division de réseaux
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="sousReseaux.php">Notation CIDR</a>
        <a class="dropdown-item" href="sousReseauxVLSM.php">Notation VLSM</a>
    </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="crc.php">Calculer un CRC<br>de type Ethernet</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">
      Execution Commande Réseaux
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="nmap.php">Nmap</a>
        <a class="dropdown-item" href="nslookup.php">Nslookup</a>
        <a class="dropdown-item" href="tcpdump.php">tcpdump</a>
        <a class="dropdown-item" href="ping.php">ping</a>
    </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="glossaire.php">Glossaire</a>
    </li>
  </ul>
</nav>