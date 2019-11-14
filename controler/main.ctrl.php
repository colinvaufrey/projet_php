<?php
    include_once("../framework/View.class.php");
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Users.class.php");

    session_start();

    $dao = new ProductsDAO();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // Paramètres : les produits phares
    $produits = array();
    $produits[] = $dao->get(5);
    $produits[] = $dao->get(7);
    $produits[] = $dao->get(9);

    // Si le paramètre paid est défini on va afficher un message de confirmation
    // de paiement (Panier -> Valider et payer)
    $paid = isset($_GET["paid"]);

    // Passe les paramètres à la vue
    $view->assign('produits', $produits);
    $view->assign('paid', $paid);

    // Charge la vue
    $view->display("main.view.php");
?>
