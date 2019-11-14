<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Products.class.php");

    session_start();

    $dao = new UsersDAO();

    if (isset($_SESSION["user"])) {
        $dao->removeAllUserCartItem($_SESSION["user"]->getUsername());
        $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
    }

    header("Location: ../controler/main.ctrl.php?paid=true");
?>
