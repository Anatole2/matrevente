<?php
  use App\Accesseur\AccesseurCategorieProduit;


  if (!isset($action)) {
    require "configuration.php";
    require CHEMIN_ACCESSEUR . "AccesseurCategorieProduit.php";
  }
  require_once ROOT . "modele/Autorisation.php";
  if (isset($_SESSION) == false) {
    session_start();
  }
  use App\Modele\Autorisation;
  $session=new Autorisation();
  $session->autoriserAcces(isset($_SESSION['id_Utilisateur']));
  $accesseur =  new AccesseurCategorieProduit();
  $lesCategoriesProduit = $accesseur->getLesCategoriesProduits();
  $titre = "Ajouter un produit";
  $lien = "AjoutProduit";

  require "header.php";
?>
  <div>
    <main>
      <h2><em>Créez votre annonce</em></h2>
        <form class="annonce-form" action="/matrevente/action/actionAjoutProduit.php" method="post" enctype="multipart/form-data">
          <div class="left-section">
            <div class="form-group">
              <label for="titre-annonce">Titre de votre annonce</label>
              <label class="erreurs"><?php if (isset($erreurs["titre"])) echo  $erreurs["titre"] ?></label>
              <input type="text" id="titre-annonce" value="<?php if (isset($_POST["titre"]))  echo $_POST["titre"]; ?>" name="titre" placeholder="Titre du produit">
            </div>

            <div class="form-group">
              <label for="prix">Prix</label>
              <label class="erreurs"><?php if (isset($erreurs["prix"])) echo  $erreurs["prix"] ?></label>
              <input type="text" id="prix" value="<?php if (isset($_POST["prix"]))  echo $_POST["prix"]; ?>" name="prix" placeholder="prix">
            </div>

            
            <div class="form-group">
              <label for="categorie-produit">Catégorie du produit</label>
              <select id="categorie-produit" name="Id_Categorie_Produit">
                <?php foreach ($lesCategoriesProduit as $uneCategorie){ ?>
                  <option value ="<?php echo $uneCategorie->getId()?>"> <?php echo $uneCategorie->GetLibelle()?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
            <label class="erreurs"><?php if (isset($erreurs["libelle"])) echo  $erreurs["libelle"] ?></label>
              <label for="image-upload">Importer une image</label>
              <div class="image-upload">
                <input type="file" id="image-upload" name="libelle"  hidden><!-- multiple required -->
                <label for="image-upload" class="image-placeholder">
                  <img src="upload-icon.png" alt="Importer une image"><!-- RESTE IMAGE A FAIRE -->
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label>Aperçu de l'image</label>
              <img id="image-preview" src="" alt="Aperçu de l'image" style="display:none; max-width: 200px; max-height: 200px;" />
          </div>

          <div class="right-section">
            <div class="form-group">
              <label for="description-annonce">Description de votre annonce</label>
              <label class="erreurs"><?php if (isset($erreurs["description"])) echo  $erreurs["description"]  ?></label>
              <textarea id="description-annonce" value="<?php if (isset($_POST["description"]))  echo $_POST["description"]; ?>" name="description" placeholder=""></textarea>
            </div>

            <button class="submit-btn" type = "submit">Deposer l'annonce</button> <!-- Bouton ajouté ici -->
          </div>
      </form>
    </main>
  </div>
