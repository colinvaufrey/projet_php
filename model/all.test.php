<?php
    require_once('Products.class.php');
    require_once('ProductsDAO.class.php');
    require_once('Users.class.php');
    require_once('UsersDAO.class.php');

    // Creation des instances DAO
    $product = new ProductsDAO();
    $user = new UsersDAO();

    $p = $product->get(1);
    var_dump($p);
    $u = $user->get("username");
    var_dump($u);
?>