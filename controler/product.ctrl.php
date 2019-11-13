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
<<<<<<< HEAD
    if($produit == false){
        $produit = "erreur";
    }
=======
>>>>>>> 3c676812e80d66db122a16c0f5fcbad267098ef0

    // Passe les paramètres à la vue
    $view->assign('produit', $produit);

    // Charge la vue
    $view->display("../view/product.view.php");
?>
