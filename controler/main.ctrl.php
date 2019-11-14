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

    $produits = array();
    $produits[] = $dao->get(5);
    $produits[] = $dao->get(7);
    $produits[] = $dao->get(9);

    // Passe les paramètres à la vue
    $view->assign('produits', $produits);

    // Charge la vue
    $view->display("main.view.php");
?>
