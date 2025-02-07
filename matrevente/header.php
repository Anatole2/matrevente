<?php 

use App\Modele\Utilisateur;
require_once ROOT . "modele/Autorisation.php";
require_once ROOT . "modele/Utilisateur.php";

use App\Modele\Autorisation;

$autorisation=new Autorisation();
if (empty($_SESSION)) {
    $Utilisateur = new Utilisateur(['Id_Utilisateur'=>""]);
    $_SESSION['erreur']= $Utilisateur->getErreurs();
}
$accesAProduit=$autorisation->autoriserAccesAjouterProduit();
$accesCompte=$autorisation->autoriserAccesCompte();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome-free-6.6.0-web/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&family=Ribeye&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <?php
        require "lienCSSetJSAcces.php";
    ?>
    <script defer src="js/header.js"></script>

    <title><?php $titre ?></title>
</head>
<body>
    

<header>
  <nav>
        <a href="/matrevente"><h1>MatRevente</h1></a>
        <?php if ($accesAProduit) {
            ?> 
            <div id="connexion"></div>
            <a href='ajouterProduit.php' ><?php
        } else { ?>
            <a id='connexion'>  <?php
        }?><button class='annonce'>Déposer une annonce</button></a>
        <div class="rechercher">
            <input class="rechercher-text" type="text" placeholder="Rechercher">
            <button class="fa-solid fa-magnifying-glass"></button>
        </div>
        <a href="mission.php"><button class="annonce">Mission du site</button></a>
        <?php if ($accesCompte) {
            ?>
            <div class="dropdown">
                <button class="dropdown-button">Votre compte : <?php echo($_SESSION['nom']." ".$_SESSION["prenom"])?> </button>
                <div class="dropdown-content">
                    <div class="dropdown-section">
                        <a href="compteClient.php">Votre compte</a>
                        <a href="mesArticlesEnVente.php">Mes articles en vente</a>
                        <a href="historiqueAchatClient.php">Vos achat</a>
                    </div>
                    <?php if ($autorisation->autoriserAccesCompteAdministrateur()) {?>
                        <div class="dropdown-section">
                        <a href="historiqueAchatAdmin.php">Les achats effectués sur le site</a>
                        </div>
                    <?php }?>
                    <a href="action/actionDeconnexion.php">Fermer la session</a>
                </div>
            </div>
            <?php
        } else { ?>
            <a href='connexion.php'><button class='connecter'>Se connecter</button></a><?php
        }?>
        
        <button id="menuToggle" class="fa-solid fa-bars"></button>
    </nav>

    <!-- Menu déroulant pour mobile -->
    <section id="menuMobile" class="menu-deroulant">

        <?php 
        if ($accesCompte) { //SI CONNECTE, afficher le bouton VOTRE COMPTE
        ?>
            <a href='/compteClient.html'><button class="menu-item">Mon compte</button></a>
        <?php
        } 
        else 
        { 
        ?> 
            <a href='/connexion.php'><button class="menu-item">Se connecter</button></a><?php //Sinon afficher bouton SE CONNECTER
        }?>
        <a class="menu-item" href="ajouterProduit.php">Publier une annonce</a>
        <a class="menu-item" href="mission.php">Mission du site</a>
        <button class="menu-item">Rechercher</button>
    </section>
</header>
