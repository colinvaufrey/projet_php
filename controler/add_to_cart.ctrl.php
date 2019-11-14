<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Products.class.php");

    session_start();

    $dao = new UsersDAO();
    $pDao = new ProductsDAO();

    if (isset($_GET["ref"]) && isset($_GET["quantity"]) && isset($_SESSION["user"])) {
        $prod = $pDao->get($_GET["ref"]);

        if ($prod && $_GET["quantity"] >= 0) {
            if (isset($_GET["force_update"])) {
                $forceUpdate = $_GET["force_update"];
            } else {
                $forceUpdate = false;
            }

            $itemInCart = $dao->getCartItem($_GET["ref"], $_SESSION["user"]->getUsername());
            if ($forceUpdate) {
                if ($_GET["quantity"] == 0) {
                    $dao->removeCartItem($_GET["ref"], $_SESSION["user"]->getUsername());
                } elseif ($_GET["quantity"] <= $prod->stock) {
                    $dao->updateCartItemQuantity($_GET["ref"], $_SESSION["user"]->getUsername(), $_GET["quantity"]);
                }
            } elseif ($itemInCart) {
                if ($itemInCart->quantity + $_GET["quantity"] <= $prod->stock) {
                    $dao->updateCartItemQuantity($_GET["ref"], $_SESSION["user"]->getUsername(), $itemInCart->quantity + $_GET["quantity"]);
                }
            } elseif ($_GET["quantity"] != 0) {
                if ($_GET["quantity"] <= $prod->stock) {
                    $dao->addCartItem($_GET["ref"], $_SESSION["user"]->getUsername(), $_GET["quantity"]);
                }
            }
            $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
        }
    }

    header("Location: ../controler/cart.ctrl.php");
?>
