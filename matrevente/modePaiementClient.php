<?php

use App\Accesseur\AccesseurCarteBancaire;

require "configuration.php";/*
require CHEMIN_ACCESSEUR."AccesseurCarteBancaire.php";

if (isset($_SESSION) == false) {
    session_start();
}

$accesseur =  new AccesseurCarteBancaire();

$carteBancaire =  $accesseur->getCarteBancaire($_SESSION["id_Utilisateur"]);
$titre = "modePaiementClient";*/
$lien = "modePaiementClient";

require "header.php";

?>
    <main>
        <aside>
            <?php require "navigationCompte.php"; ?>
        </aside>
        <div class="section-droite">
            <h2 id="titre">MES ARTICLES EN VENTE</h2>

            <div class="modePaiement">
                <div class="item">
                    <div class="item-content">
                        <img src='image/logoPaypal.png' alt="Image du produit">
                        <div class="item-details">
                            <p>Paypal</p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="bouton-changer-paiement">Changer le mode de paiement</button>
        </div>
    </main>