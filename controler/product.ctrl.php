<?php
    include_once("../framework/View.class.php");
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/CartItem.class.php");

    session_start();

    $pDao = new ProductsDAO();
    $uDao = new UsersDAO();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // On récupère le produit si possible depuis le paramètre ref
    if (isset($_GET["ref"])) {
        $produit = $pDao->get($_GET["ref"]);
    } else {
        $produit = false;
    }

    // Si l'utilisateur est connecté on récupère les infos sur le produit pour
    // voir si l'utilisateur en a déjà dans son panier
    if (isset($_SESSION["user"]) && isset($_GET["ref"])) {
        $itemInCart = $uDao->getCartItem($_GET["ref"], $_SESSION["user"]->getUsername());
        $isLogged = true;
    } else {
        $itemInCart = false;
        $isLogged = false;
    }

    // Passe les paramètres à la vue
    $view->assign('produit', $produit);
    $view->assign('itemInCart', $itemInCart);
    $view->assign('isLogged', $isLogged);

    // Charge la vue
    $view->display("../view/product.view.php");
?>
