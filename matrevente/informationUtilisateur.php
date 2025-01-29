<?php

use App\Accesseur\AccesseurUtilisateur;
require "configuration.php";

require CHEMIN_ACCESSEUR . "AccesseurUtilisateur.php";

if (isset($_SESSION) == false) {
    session_start();
}
$accesseur =  new AccesseurUtilisateur();
$informationsUtilisateur = $accesseur->getInformationsUtilisateur($_SESSION["id_Utilisateur"]);
$titre = "informationsUtilisateur";
$lien = "InformationsUtilisateur";


require "header.php";

?>

<form id="user-info-form" method="POST" action="action/actionModifierInformationsUtilisateur.php">
    <main>
        <aside>
            <?php require "navigationCompte.php"; ?>
        </aside>  

        <div class="section-droite">
            <h2 id="titre">INFORMATIONS UTILISATEUR</h2>
            <div class="user-info">
                <div class="avatar-section">
                    <img src="image/imagePageProfilClient/iconeProfil.png" alt="Avatar de l'utilisateur" class="avatar">
                    <div class="name-inputs">
                        <label><?php if (isset($erreurs["nom"])) echo $erreurs["nom"] ?></label> 
                        <input type="text" name="nom" value="<?= $informationsUtilisateur->getNom() ?>" class="editable" readonly>
                        <label><?php if (isset($erreurs["prenom"])) echo $erreurs["prenom"] ?></label>
                        <input type="text" name="prenom" value="<?= $informationsUtilisateur->getPrenom() ?>" class="editable" readonly>
                    </div>
                </div>

                <div class="centered-info">
                    <ul class="user-details">
                        <li><i class="fas fa-envelope"></i>
                            <label><?php if (isset($erreurs["email"])) echo $erreurs["email"] ?></label>
                            <input type="email" name="email" value="<?= $informationsUtilisateur->getEmail() ?>" class="editable" readonly>
                        </li>
                        <li><i class="fas fa-phone"></i>
                            <label><?php if (isset($erreurs["telephone"])) echo $erreurs["telephone"] ?></label>
                            <input type="tel" name="telephone" value="<?= $informationsUtilisateur->getTelephone() ?>" class="editable" readonly>
                        </li>
                        <li><i class="fas fa-map-marker-alt"></i>
                            <label><?php if (isset($erreurs["adresse"])) echo $erreurs["adresse"] ?></label>
                            <input type="text" name="adresse" value="<?= $informationsUtilisateur->getAdresse() ?>" class="editable" readonly>
                        </li>
                        
                    </ul>
                    <button id="modify-btn" type="button" onclick="toggleEdit(this)">Modifier les informations</button>
                    <button id="confirm-btn" type="submit" style="display: none;">Confirmer les modifications</button>
                    <button id="cancel-btn" type="button" onclick="location.reload()" style="display: none;">Annuler les modifications</button>
                </div>
            </div>
        </div>
    </main>
</form>

<script>
    document.getElementById("user-info-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche la soumission classique du formulaire

    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const email = document.getElementById("email").value;
    const telephone = document.getElementById("telephone").value;
    const adresse = document.getElementById("adresse").value;

    const xmlthHttpsRequest = new XMLHttpRequest();
    xmlthHttpsRequest.open("POST", "modification_utilisateur.php", true);
    xmlthHttpsRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xmlthHttpsRequest.onreadystatechange = function() {
        if (xmlthHttpsRequest.readyState === 4 && xmlthHttpsRequest.status === 200) {
            document.getElementById("response").innerText = xmlthHttpsRequest.responseText;

        }
    };

    xmlthHttpsRequest.send(`nom=${encodeURIComponent(nom)}&prenom=${encodeURIComponent(prenom)}&email=${encodeURIComponent(email)}&telephone=${encodeURIComponent(telephone)}&adresse=${encodeURIComponent(adresse)}`);
});

</script>

