<?php
interface CarteBancaireSQL
{
	
		public const SQL_INFO_CARTE_BANCAIRE = "SELECT carte_bancaire.Id_carte_bancaire as Id_carte_bancaire, nom, numero, date_fin, code, type_paiement, utilisateur.Id_Utilisateur FROM carte_bancaire LEFT JOIN utilisateur ON carte_bancaire.Id_carte_bancaire = utilisateur.Id_Utilisateur WHERE utilisateur.Id_utilisateur = :par_id_Utilisateur";
}
?>