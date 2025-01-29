<?php

use App\Modele\Autorisation;
use App\Accesseur\AccesseurCommande;
require "configuration.php";
require CHEMIN_ACCESSEUR."AccesseurCommande.php";
require_once ROOT . "modele/Autorisation.php";
$autorisation=new Autorisation();
$autorisation->autoriserAccesAdministrateur();
if (isset($_SESSION) == false) {
    session_start();
}
$accesseur =  new AccesseurCommande();
$lesCommandes =  $accesseur->getLesCommandes();

$titre = "Historique Achat Admin";
$lien = "HistoriqueAchatAdmin";


require "header.php";

?>
    <main>
    <aside>
        <?php require "navigationCompte.php"; ?>
    </aside>

    <div class="section-droite">
        <h2 id="titre">HISTORIQUE DE TOUTES LES TRANSACTIONS DU SITE</h2>    

        <div class="filters">
        <p>Date : <input type="text" id="datepicker"></p>
        <input type="text" id="vendeur-filter" placeholder="Filtrer par vendeur">
        <input type="text" id="acheteur-filter" placeholder="Filtrer par acheteur">
        <input type="text" id="commande-filter" placeholder="Filtrer par n° de commande">
        </div>

        <div class="formListeAchats">
            
            <?php foreach ($lesCommandes as $uneCommande) { ?>
                <div class="item">
                    <div class="item-header">
                        <span>Date de transaction: <?php echo $uneCommande->getDateAchat(); ?></span>
                        <span>Prix: <?php echo $uneCommande->getId_Produit()->getPrix(); ?>$</span>
                        <span>Vendeur: <?php echo $uneCommande->getVendeur()->getNom(); ?></span>
                        <span>Acheteur: <?php echo $uneCommande->getAcheteur()->getNom(); ?></span>
                        <span>Commande n° <?php echo $uneCommande->getPaypalNumeroTransaction(); ?></span>
                    </div>
                    <div class="item-content">
                        <img src='image/<?php echo ($uneCommande->getId_Produit()->getImage()->getId()."_".$uneCommande->getId_Produit()->getImage()->getLibelle()) ?>.png' alt="Image du produit">
                        <div class="item-details">
                            <p><?php echo $uneCommande->getId_Produit()->getTitre(); ?></p>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    </main>

    <!---<!DOCTYPE html><html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
  <script>
  $( function() {
    document.queryselector( "#datepicker" ).datepicker("option", "dateFormat", "yy-mm-dd");
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>-->
 
 
 