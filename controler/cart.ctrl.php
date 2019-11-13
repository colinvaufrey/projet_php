<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/Products.class.php");
    include_once("../model/ProductsDAO.class.php");

    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    session_start();

    // Creation de l'unique objet DAO
    $dao = new UsersDAO();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        $cart = $user->getCart();
        for($i=0; $i<count($cart); $i++){
            $items[] = $dao.getCartItem($cart[i]->$refProduct, $cart[i]->$username);
            $quantitys[] = $cart[i]->$quantity;
        }
    } else {
        $quantitys = false;
        $items = false;
    }

    // Passe les paramètres à la vue
    $view->assign('cart', $quantitys);
    $view->assign('items', $items);

    // Charge la vue
    $view->display("cart.view.php");
?>
