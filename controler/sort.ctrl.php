<?php
    include_once("../framework/View.class.php");
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Users.class.php");

    session_start();

    $dao = new ProductsDAO();

    // On vérifie si color est passé en paramètre
    if (isset($_GET["color"])) {
        $color = $_GET["color"];
    } else {
        $color = false;
    }

    // On vérifie si origin est passé en paramètre
    if (isset($_GET["origin"])) {
        $origin = $_GET["origin"];
    } else {
        $origin = false;
    }

    // On charge les produits correspondant au paramètre passé
    // Le paramètre origin a la priorité sur color si quelqu'un s'amuse avec les URL
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
    $view->assign('produits', $produits);

    // Charge la vue
    $view->display("sort.view.php");
?>
