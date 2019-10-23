<?php
    require_once('Products.class.php');
    require_once('ProductsDAO.class.php');
    require_once('Users.class.php');
    require_once('UsersDAO.class.php');
    require_once('CartItem.class.php');
    require_once('CartItemDAO.class.php');

    // Creation des instances DAO
    $product = new ProductsDAO();
    $user = new UsersDAO();
    $cartItem = new CartItemDAO();

    $p = $product->get(1);
    var_dump($p);
    $u = $user->get(1);
    var_dump($u);
    $c = $cartItem->get(1);
    var_dump($c);
?>