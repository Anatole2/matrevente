<?php
if (isset($_SESSION) == false) {
    session_start();
}

?>

<link rel="stylesheet" href="css/navigationCompte.css">

<div class="navigationCompte">
    <h2>Mon Compte</h2>
    <ol>
        <li><a href="historiqueAchatClient.php">Historique de mes achats</a></li>
        <li><a href="informationUtilisateur.php">Informations du compte</a></li>
        <li><a href="modePaiementClient.php">Mode de paiement</a></li>
        <li><a href="mesArticlesEnVente.php">Mes articles en vente</a></li>
    </ol>
    <h3 id="bouton-deconnexion"><a href="action/actionDeconnexion.php">Se déconnecter</a></h3> 
</div>