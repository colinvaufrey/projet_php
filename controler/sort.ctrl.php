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

    if (isset($_GET["color"])) {
        $color = $_GET["color"];
    } else {
        $color = false;
    }

    if (isset($_GET["origin"])) {
        $origin = $_GET["origin"];
    } else {
        $origin = false;
    }

    if ($origin) {
        $produits = $dao->getProductsByOrigin($origin);
    } elseif ($color) {
        $produits = $dao->getProductsByColor($color);
    } else {
        $produits = $dao->getProductsInStock();
    }

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // Passe les paramètres à la vue

    // Les articles
    $view->assign('produits', $produits);

    // Charge la vue
    $view->display("sort.view.php");
?>
