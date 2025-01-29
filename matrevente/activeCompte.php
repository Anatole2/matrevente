<?php
use App\Accesseur\AccesseurConnexion;
use App\Modele\Utilisateur;

require "configuration.php";
require CHEMIN_ACCESSEUR . "AccesseurConnexion.php";

$unUtilisateur = new Utilisateur($_GET);

$unUtilisateurAccesseur = new AccesseurConnexion();
$nb = $unUtilisateurAccesseur->verifToken($unUtilisateur);
if ($nb["nb"] != "1") {
    die("token non valide");
}
$unUtilisateurAccesseur->activerCompte($unUtilisateur);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Compte Activer</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Compte Activer</h1>

    <p>Compte activé avec succès. Vous pouvez maintenant
       <a href="index.php">Accueil</a>.</p>

</body>
</html>