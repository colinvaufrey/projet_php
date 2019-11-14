<?php
    include_once("../framework/View.class.php");
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/CartItem.class.php");

    session_start();

    $uDao = new UsersDAO();
    $pDao = new ProductsDAO();

    $products = array();
    $quantities = array();

    // On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        $cart = $user->getCart();
        if ($cart) {
            // On crée deux tableaux à passer en paramètres à la vue contenant
            // chaque objet et sa quantité (associés par leur indice dans le tableau)
            for ($i = 0; $i < count($cart); $i++) {
                $products[] = $pDao->get($cart[$i]->refProduct);
                $quantities[] = $cart[$i]->quantity;
            }
        } else {
            $quantities = false;
            $products = false;
        }
    } else {
        $quantities = false;
        $products = false;
    }

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // Passe les paramètres à la vue
    $view->assign('quantities', $quantities);
    $view->assign('products', $products);

    // Charge la vue
    $view->display("cart.view.php");
?>
