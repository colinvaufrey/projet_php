<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");

    // Creation de l'unique objet DAO
    $dao = new ProductsDAO();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // récupérer $ref
    $ref = $_GET["ref"];
    $produit = $dao->get($ref);
    if($produit == false){
        $produit = "erreur";
    }

    // Passe les paramètres à la vue
    $view->assign('produit', $produit);

    // Charge la vue
    $view->display("../view/product.view.php");
?>
