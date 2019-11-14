<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Products.class.php");

    session_start();

    $dao = new UsersDAO();
    $pDao = new ProductsDAO();

    if (isset($_POST["ref"]) && isset($_POST["quantity"]) && isset($_SESSION["user"])) {
        $prod = $pDao->get($_POST["ref"]);

        if ($prod && $_POST["quantity"] >= 0) {
            if (isset($_POST["force_update"])) {
                $forceUpdate = $_POST["force_update"];
            } else {
                $forceUpdate = false;
            }

            $itemInCart = $dao->getCartItem($_POST["ref"], $_SESSION["user"]->getUsername());
            if ($forceUpdate) {
                if ($_POST["quantity"] == 0) {
                    $dao->removeCartItem($_POST["ref"], $_SESSION["user"]->getUsername());
                } elseif ($_POST["quantity"] <= $prod->stock) {
                    $dao->updateCartItemQuantity($_POST["ref"], $_SESSION["user"]->getUsername(), $_POST["quantity"]);
                }
            } elseif ($itemInCart) {
                if ($itemInCart->quantity + $_POST["quantity"] <= $prod->stock) {
                    $dao->updateCartItemQuantity($_POST["ref"], $_SESSION["user"]->getUsername(), $itemInCart->quantity + $_POST["quantity"]);
                }
            } elseif ($_POST["quantity"] != 0) {
                if ($_POST["quantity"] <= $prod->stock) {
                    $dao->addCartItem($_POST["ref"], $_SESSION["user"]->getUsername(), $_POST["quantity"]);
                }
            }
            $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
        }
    }

    header("Location: ../controler/cart.ctrl.php");
?>
