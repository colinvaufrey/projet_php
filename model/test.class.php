<?php
    require_once('Products.class.php');
    require_once('ProductsDAO.class.php');
    require_once('Users.class.php');
    require_once('UsersDAO.class.php');
    require_once('Cart.class.php');
    require_once('CartDAO.class.php');

    // Creation des instances DAO
    $product = new ProductsDAO();
    $user = new UsersDAO();
    $cart = new CartDAO();

    $p = $product->get(1);
    var_dump($p);
    $u = $user->get(1);
    var_dump($u);
    $c = $cart->get(1);
    var_dump($c);
?>