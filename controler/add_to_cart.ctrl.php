<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    session_start();

    $dao = new UsersDAO();

    if (isset($_GET["ref"]) && isset($_GET["quantity"]) && isset($_SESSION["user"])) {
        $dao->addCartItem($_GET["ref"], $_SESSION["user"]->getUsername(), $_GET["quantity"]);
        $newCartItem = new CartItem;
        $newCartItem->refProduct = $_GET["ref"];
        $newCartItem->quantity = $_GET["quantity"];
        $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
    }

    header("Location: ../controler/cart.ctrl.php");
?>
