<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");

    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    include_once("../model/CartItem.class.php");

    session_start();

    // Creation de l'unique objet DAO
    $dao = new ProductsDAO();
    $uDao = new UsersDAO();

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

    if (isset($_SESSION["user"])) {
        $itemInCart = $uDao->getCartItem($ref, $_SESSION["user"]->getUsername());
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
