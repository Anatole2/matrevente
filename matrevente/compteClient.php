<?php
require "configuration.php";

    $titre = "Compte";
    $lien = "Compte";
    if (isset($_SESSION) == false) {
        session_start();
    }
    require "header.php";

?>

    <h2>Votre compte</h2>

    <div class="row">
        <div class="bloc">
            <a href="historiqueAchatClient.php"><img src="image/imagePageProfilClient/historiqueClient.png" alt="Image 1"></a>
            <div class="text-container">
                <a href="historiqueAchatClient.php"><h3>Mes commandes</h3></a>
                <p>Consulter les transactions.</p>
            </div>
        </div>
        <div class="bloc">
            <a href="informationUtilisateur.php"><img src="image/imagePageProfilClient/informationUtilisateur.png" alt="Image 2"></a>
            <div class="text-container">
                <a href="informationUtilisateur.php"><h3>Mes informations</h3></a>
                <p>Gerer le mot de passe, le courriel et le numero de telephone cellulaire.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bloc">
            <!--<a href="modePaiementClient.php">--><img src="image/imagePageProfilClient/modePaiementClient.png" alt="Image 3"></a>
            <div class="text-container">
                <!-- <a href="modePaiementClient.php"--><h3>Mes paiements</h3></a>
                <p>Gerer les modes de paiement.</p>
            </div>
        </div>
        <div class="bloc">
            <a href="mesArticlesEnVente.php"><img src="image/imagePageProfilClient/mesArticlesEnVente.png" alt="Image 4"></a>
            <div class="text-container">
                <a href="mesArticlesEnVente.php"><h3>Mes articles en vente</h3></a>
                <p>Consulter, supprimer ou modifier des articles.</p>
            </div>
        </div>
    </div>