<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");

    include_once("../model/Users.class.php");
    session_start();

    // Creation de l'unique objet DAO
    $dao = new ProductsDAO();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    $produits = $dao->getAll();

    // Passe les paramètres à la vue

    // Charge la vue
    $view->display("account.view.php");
?>
