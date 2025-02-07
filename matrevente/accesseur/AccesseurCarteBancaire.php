<?php

namespace App\Accesseur;

require_once(ROOT . "modele/CarteBancaire.php");
require_once(ROOT . "accesseur/Connexion.php");
require_once(ROOT . "CarteBancaireSQL.php");


use PDO;
use CarteBancaireSQL;
use App\Accesseur\Connexion;
use App\Modele\CarteBancaire;

class AccesseurCarteBancaire implements CarteBancaireSQL
{
    public function getCarteBancaire($idUtilisateur){
        $connexion = new Connexion();
        $db = $connexion->dbConnect();
        $requette = $db->prepare(AccesseurCarteBancaire::SQL_INFO_CARTE_BANCAIRE);
        $requette->bindValue(':par_id_Utilisateur', $idUtilisateur, PDO::PARAM_INT);
        $requette->execute();
        $carteBancaireSelectionnee = $requette->fetch();
        $array = json_decode(json_encode($carteBancaireSelectionnee), true);
        $carteBancaire = new CarteBancaire(
            $array
            );
        return $carteBancaire;
    }
}
//

