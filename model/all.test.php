<?php
    require_once('Products.class.php');
    require_once('ProductsDAO.class.php');
    require_once('Users.class.php');
    require_once('UsersDAO.class.php');

    // Creation des instances DAO
    $product = new ProductsDAO();
    $user = new UsersDAO();

    // Tests des méthodes de classe
    $p = $product->get(1);
    var_dump($p);
    $p = $product->getProductsInStock();
    var_dump($p);
    $p = $product->getProductsByOrigin("france");
    var_dump($p);
    $p = $product->getProductsByColor("rouge");
    var_dump($p);
    $p = $product->getProductsByPrice(0.02, 2.80);
    var_dump($p);
    $p = $product->getProductsByTitle("et");
    var_dump($p);
    $u = $user->get("user");
    var_dump($u);
    $u = $user->getCartItem(1, $u->username);
    var_dump($u);
    $u = $user->addCartItem(1, $u->username);
    var_dump($u);
    $u = $user->addCartItem(2, $u->username);
    var_dump($u);
    $u = $user->removeCartItem(3, $u->username);
    var_dump($u);
    $u = $user->removeCartItem(2, $u->username);
    var_dump($u);
?>
